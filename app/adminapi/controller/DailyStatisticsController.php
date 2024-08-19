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
use app\adminapi\lists\AnimalsLists;
use app\adminapi\logic\AnimalsLogic;
use app\adminapi\validate\AnimalsValidate;
use app\adminapi\validate\DailyStatisticsValidate;
use app\common\model\DailyStatistics;


/**
 * @package app\adminapi\controller
 */
class DailyStatisticsController extends BaseAdminController
{


    /**
     * @notes 获取统计数据
     * @return \think\response\Json
     * @author likeadmin
     * @date 2024/08/02 22:15
     */
    public function info()
    {
        $params = (new DailyStatisticsValidate())->get()->goCheck();
        $date = $params['date'] ?? date('Y-m-d', strtotime('-1 day'));

        $info = DailyStatistics::where('date', $date)->findOrEmpty();

        return $this->data($info->isEmpty() ? [] : $info->toArray());
    }



}