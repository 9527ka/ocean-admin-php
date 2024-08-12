<?php
namespace app\adminapi\controller;

use app\adminapi\controller\BaseAdminController;
use app\adminapi\lists\OceanCardLists;
use app\adminapi\logic\OceanCardLogic;
use app\adminapi\validate\OceanCardValidate;
use app\common\model\OceanCard;

/**
 * OceanCard控制器
 * Class OceanCardController
 * @package app\adminapi\controller
 */
class OceanCardController extends BaseAdminController
{
    /**
     * @notes 获取列表
     * @return \think\response\Json
     * @author likeadmin
     * @date 2024/08/12 16:09
     */
    public function lists()
    {
        return $this->dataLists(new OceanCardLists());
    }


    /**
     * @notes 添加
     * @return \think\response\Json
     * @author likeadmin
     * @date 2024/08/12 16:09
     */
    public function add()
    {
        $d = (new OceanCardValidate())->post()->goCheck('add');
        for ($i = 0; $i < $d['number']; $i++) {
            $params = [
            'name' => $d['name'],
            'image' => $d['image'],
            'price' => $d['price'],
            'state' => 0,
            'serial_number' => generate_card_number(),
            'cdk' => generate_activation_code(),
            'redemption_state' => 0
            ];
            OceanCard::create($params);
            // echo OceanCard::getlastsql();die;
            // OceanCardLogic::add($params);
        }
        
        return $this->success('添加成功', [], 1, 1);
    }


    /**
     * @notes 编辑
     * @return \think\response\Json
     * @author likeadmin
     * @date 2024/08/12 16:09
     */
    public function edit()
    {
        $params = (new OceanCardValidate())->post()->goCheck('edit');
        $result = OceanCardLogic::edit($params);
        if (true === $result) {
            return $this->success('编辑成功', [], 1, 1);
        }
        return $this->fail(OceanCardLogic::getError());
    }


    /**
     * @notes 删除
     * @return \think\response\Json
     * @author likeadmin
     * @date 2024/08/12 16:09
     */
    public function delete()
    {
        $params = (new OceanCardValidate())->post()->goCheck('delete');
        OceanCardLogic::delete($params);
        return $this->success('删除成功', [], 1, 1);
    }


    /**
     * @notes 获取详情
     * @return \think\response\Json
     * @author likeadmin
     * @date 2024/08/12 16:09
     */
    public function detail()
    {
        $params = (new OceanCardValidate())->goCheck('detail');
        $result = OceanCardLogic::detail($params);
        return $this->data($result);
    }


}