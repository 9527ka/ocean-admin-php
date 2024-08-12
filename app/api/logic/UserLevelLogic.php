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

namespace app\api\logic;

use app\common\logic\BaseLogic;
use app\common\model\UserLevel;


/**
 * 用户等级名称
 * Class ArticleLogic
 * @package app\api\logic
 */
class UserLevelLogic extends BaseLogic
{


    public static function getUserLevel(int $points, array $levels = []) {

        if (empty($levels)) {
            $levels = UserLevel::select()->toArray();
        }

        if (!$levels) {
            return[];
        }

        // Sort levels by points in ascending order
        usort($levels, function($a, $b) {
            return $a['points'] - $b['points'];
        });

        // Loop through each level and find the first one that meets the requirement
        foreach ($levels as $level) {
            if ($points < $level['points']) {
                return $level;
            }
        }

        // Return the highest level if no matches were found
        return end($levels);
    }
}