<?php
// +----------------------------------------------------------------------
// | likeadmin快速开发前后端分离管理后台（PHP版）
// +----------------------------------------------------------------------
// | 欢迎阅读学习系统程序代码，建议反馈是我们前进的动力
// | 开源版本可自由商用，可去除界面版权logo
// | gitee下载：https://gitee.com/likeshop_gitee/likeadmin
// | github下载：https://github.com/likeshop-github/likeadmin
// | 访问官网：https://www.likeadmin.cn
// | likeadmin团队 版权所有 拥有最终解释权
// +----------------------------------------------------------------------
// | author: likeadminTeam
// +----------------------------------------------------------------------


namespace app\adminapi\controller;


use app\adminapi\controller\BaseAdminController;
use app\adminapi\lists\OceanCardOrderLists;
use app\adminapi\logic\OceanCardOrderLogic;
use app\adminapi\validate\OceanCardOrderValidate;
use app\common\model\OceanCardOrder;

/**
 * OceanCardOrder控制器
 * Class OceanCardOrderController
 * @package app\adminapi\controller
 */
class OceanCardOrderController extends BaseAdminController
{
    //审核
    public function check()
    {
        $params = (new OceanCardOrderValidate())->post()->goCheck('check');
        OceanCardOrderLogic::check($params);
        return $this->success('提交成功', [], 1, 1);
    }
    
    /**
     * @notes 获取列表
     * @return \think\response\Json
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function lists()
    {
        OceanCardOrder::where('is_tip', 0)->save(['is_tip' => 1]);
        return $this->dataLists(new OceanCardOrderLists());
    }


    /**
     * @notes 添加
     * @return \think\response\Json
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function add()
    {
        $params = (new OceanCardOrderValidate())->post()->goCheck('add');
        $result = OceanCardOrderLogic::add($params);
        if (true === $result) {
            return $this->success('添加成功', [], 1, 1);
        }
        return $this->fail(OceanCardOrderLogic::getError());
    }


    /**
     * @notes 编辑
     * @return \think\response\Json
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function edit()
    {
        $params = (new OceanCardOrderValidate())->post()->goCheck('edit');
        $result = OceanCardOrderLogic::edit($params);
        if (true === $result) {
            return $this->success('编辑成功', [], 1, 1);
        }
        return $this->fail(OceanCardOrderLogic::getError());
    }


    /**
     * @notes 删除
     * @return \think\response\Json
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function delete()
    {
        $params = (new OceanCardOrderValidate())->post()->goCheck('delete');
        OceanCardOrderLogic::delete($params);
        return $this->success('删除成功', [], 1, 1);
    }


    /**
     * @notes 获取详情
     * @return \think\response\Json
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function detail()
    {
        $params = (new OceanCardOrderValidate())->goCheck('detail');
        $result = OceanCardOrderLogic::detail($params);
        return $this->data($result);
    }


}