<?php
// +----------------------------------------------------------------------
// | 控制台配置
// +----------------------------------------------------------------------
return [
    // 指令定义
    'commands' => [
        // 定时任务
        'crontab' => 'app\common\command\Crontab',
        // 退款查询
        'query_refund' => 'app\common\command\QueryRefund',

        // 每日统计首页数据
        'daily:statistics' => 'app\command\DailyStatistics',
    ],

    // 定时任务配置
    'schedule' => [
        [
            'command' => 'daily:statistics',
            'rule'    => '0 1 * * *',  // 每天凌晨1点运行
        ],
    ],
];
