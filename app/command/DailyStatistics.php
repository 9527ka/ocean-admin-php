<?php
declare (strict_types = 1);

namespace app\command;

use app\common\logic\StatisticsLogic;
use think\console\Command;
use think\console\Input;
use think\console\Output;

class DailyStatistics extends Command
{
    protected function configure()
    {
        // 指令配置
        $this->setName('app\command\dailystatistics')
            ->setDescription('the app\command\dailystatistics command');
    }

    protected function execute(Input $input, Output $output)
    {
        StatisticsLogic::handle();

        $output->writeln('统计数据已生成');
    }
}
