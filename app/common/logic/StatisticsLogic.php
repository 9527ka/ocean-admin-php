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

namespace app\common\logic;

use app\common\model\DailyStatistics;
use app\common\model\OceanCard;
use app\common\model\OceanCardOrder;
use app\common\model\user\User;


/**
 * 统计
 * Class NoticeLogic
 * @package app\common\logic
 */
class StatisticsLogic extends BaseLogic
{
    public static function handle(int $startTime, int $endTime)
    {

        $startTime = strtotime('yesterday 00:00:00');
        $endTime = strtotime('yesterday 23:59:59');
        $date = date('Y-m-d', $startTime);
        // 总用户数
        $totalUsers = User::count();
        // 昨日新增用户数
        $newUsers = User::whereBetween('create_time', [$startTime, $endTime])->count();
        // 首充人数
        $firstRechargeUsers = OceanCardOrder::where('state', 1)->field('user_id')->distinct(true)->count();
        // 复充人数
        $repeatRechargeUsers = OceanCardOrder::field('user_id, COUNT(*) as order_count')->group('user_id')->having('order_count >= 2')->count();
        // 销售总额
        $totalSales = OceanCardOrder::where('state', 1)->sum('price');
        // 订单总数
        $totalOrders = OceanCardOrder::where('state', 1)->count();
        // 销售卡总数
        $totalSalesCards = OceanCard::count();

        // 插入到统计表
        DailyStatistics::create([
            'date' => $date,
            'total_users' => $totalUsers,
            'new_users' => $newUsers,
            'first_recharge_users' => $firstRechargeUsers,
            'repeat_recharge_users' => $repeatRechargeUsers,
            'total_sales' => $totalSales,
            'total_orders' => $totalOrders,
            'total_sales_cards' => $totalSalesCards,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

}