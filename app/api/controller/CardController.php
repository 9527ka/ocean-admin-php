<?php
namespace app\api\controller;

use app\api\logic\UserLevelLogic;
use app\api\validate\PayValidate;
use app\common\enum\user\UserTerminalEnum;
use app\common\logic\PaymentLogic;
use app\common\model\user\User;
use app\common\service\pay\AliPayService;
use app\common\service\pay\WeChatPayService;
use app\common\model\OceanCard;
use app\common\model\OceanCardOrder;
use app\api\lists\OceanCardLists;
use think\facade\{Db, Lang};
/**
 * 订单与核销
 * Class PayController
 * @package app\api\controller
 */
class CardController extends BaseApiController
{
    public array $notNeedLogin = ['check'];
    
    //下单购买
    public function order(){
        $price = request()->post('price');//面值
        $pay_img = request()->post('pay_img');//支付凭证
        $pay_hash = request()->post('pay_hash');//交易哈希流水号
        
        if(empty($price)){
            return $this->fail(Lang::get('product_cannot_empty'));//商品不能为空
        }
        if(empty($pay_img)){
            return $this->fail(Lang::get('voucher_cannot_empty'));//支付凭证不能为空
        }
        if(empty($pay_hash)){
            return $this->fail(Lang::get('hash_empty'));//Hash地址不能为空
        }
        
        //随机取一条相同面值的礼品卡
        $info = OceanCard::where(['price' => $price,'state' => 0])->find();
        if(empty($info)){
            return $this->fail(Lang::get('product_taken_down'));//商品已下架，请重试
        }
        
        //存在待审核订单时  拦截
        $already = OceanCardOrder::where(['user_id' => $this->userId,'state' => 0])->value('id');
        if($already){
            return $this->fail(Lang::get('order_pending'));//存在待审核订单，请重试
        }
        $hash = OceanCardOrder::where(['pay_hash' => $pay_hash])->value('id');
        if($hash){
            return $this->fail(Lang::get('order_hash_already'));//哈希地址已存在
        }
        Db::startTrans();
        try {
            //系统自动生成
            $p = [
                'name' => 'amazon&SXF Gift Card '.$info['price'].' USD',
                'image' => 'uploads/price/'.$info['price'].'.png',
                'price' => $info['price'],
                'state' => 1,
                'serial_number' => generate_card_number(),
                'cdk' => generate_activation_code(),
                'redemption_state' => 0
            ];
            $card = OceanCard::create($p);

            // 计算价格 - 根据当前用户等级，计算优惠折扣 - 查询当前用户最新的积分数据
            
            $discount = UserLevelLogic::getUserLevel($this->userInfo['points'])['discount']/10;
            // 精密计算 - 防止失精导致多位小数点
            $p['order_price'] = bcmul($p['price'], $discount, 2);
            //创建订单
            $order = new OceanCardOrder();
            
            $order->card_id = $card->id;
            $order->card_name = $p['name'];
            $order->price = $p['price'];
            $order->order_price = $p['price']*$discount;
            $order->card_img = $p['image'];
            $order->serial_number = $p['serial_number'];
            $order->cdk = $p['cdk'];
            $order->account = $this->userInfo['account'];
            $order->user_id = $this->userId;
            $order->pay_hash = $pay_hash;
            $order->pay_img = $pay_img;
            $order->pay_method = 1;
            $order->create_time = time();
            $sta = $order->save();
            Db::commit();
            if ($sta) {
                return $this->success(Lang::get('order_succees'));//下单成功，请等待审核
            }
        } catch (\Exception $e) {
            Db::rollback();
            // $e->getMessage();
            return $this->success(Lang::get('order_fail'));//下单失败，请重试
        }
    }
    /**
     * @notes 礼品卡列表
     */
    public function list()
    {
        return $this->dataLists(new OceanCardLists());
    }
    
    /**
     * @notes 激活码核销
     */
    public function check()
    {
        $card = request()->get('card');
        $cdk = request()->get('cdk');
        $c_id = OceanCard::where(['redemption_state' => 0,'serial_number' => $card,'cdk' => $cdk])->value('id');
        if ($c_id) {
            OceanCard::where('id',$c_id)->update(['redemption_state' => 1]);
            return $this->success('success');
        }
        return $this->fail('The card has been used or does not exist!');
    }
}
