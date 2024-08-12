<?php
namespace app\api\controller;

use app\api\validate\PayValidate;
use app\common\enum\user\UserTerminalEnum;
use app\common\logic\PaymentLogic;
use app\common\service\pay\AliPayService;
use app\common\service\pay\WeChatPayService;
use app\common\model\OceanCard;
use app\common\model\OceanCardOrder;
use app\api\lists\OceanCardLists;

/**
 * 订单与核销
 * Class PayController
 * @package app\api\controller
 */
class CardController extends BaseApiController
{

    public array $notNeedLogin = ['check','list'];
    
    //下单购买
    public function order(){
        $price = request()->get('price');//面值
        //随机取一条相同面值的礼品卡
        $info = OceanCard::where(['price' => $price,'state' => 0])->find();
        if(empty($info)){
            return $this->fail('商品已下架，请重试');
        }
        
        //系统自动生成
        $p = [
            'name' => 'amazon&SXF Gift Card '.$info['price'].' USD',
            'image' => 'uploads/images/'.$info['price'].'.png',
            'price' => $info['price'],
            'state' => 1,
            'serial_number' => generate_card_number(),
            'cdk' => generate_activation_code(),
            'redemption_state' => 0
        ];
        $card = OceanCard::create($p);
        
        //创建订单
        $order = new OceanCardOrder();
        
        $pay_img = request()->get('pay_img');//支付凭证
        
        $order->card_id = $card->id;
        $order->card_name = $p['name'];
        $order->price = $p['price'];
        $order->serial_number = $p['serial_number'];
        $order->cdk = $p['cdk'];
        $order->pay_img = $pay_img;
        $order->username = $this->userInfo['nickname'];
        $order->user_id = $this->userId;
        $order->pay_method = 1;
        $order->create_time = time();

        if ($order->save()) {
            return $this->success('下单成功');
        }

        return $this->data([]);
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
