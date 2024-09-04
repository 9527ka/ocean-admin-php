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

use app\adminapi\logic\WorkbenchLogic;
use app\common\model\UserPosters;
use app\common\model\OceanCardOrder;
/**
 * 工作台
 * Class WorkbenchCotroller
 * @package app\adminapi\controller
 */
class WorkbenchController extends BaseAdminController
{
    public array $notNeedLogin = ['checkOrder'];
    //检查是否有新分享订单、充值订单
    public function checkOrder(){
        $orderCount = OceanCardOrder::where('is_tip', 0)->where('state',0)->count();
        $shareCount = UserPosters::where('is_tip', 0)->where('audit_status',0)->count();
        return $this->data(['orderCount' => $orderCount, 'shareCount' => $shareCount]);
    }
    //人工介入时，关闭提示音
    // public function closeOrderTip(){
    //     $act = request()->get('act',1);
    //     if($act == 1){
    //         $orderCount = OceanCardOrder::where('is_tip', 0)->save(['is_tip' => 1]);
    //     }else{
    //         $shareCount = UserPosters::where('is_tip', 0)->save(['is_tip' => 1]);
    //     }
    //     return $this->success();
    // }
    /**
     * @notes 工作台
     * @return \think\response\Json
     * @author 段誉
     * @date 2021/12/29 17:01
     */
    public function index()
    {
        $result = WorkbenchLogic::index();
        return $this->data($result);
    }
}