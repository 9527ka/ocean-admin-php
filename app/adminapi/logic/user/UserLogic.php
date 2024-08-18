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
namespace app\adminapi\logic\user;

use app\api\logic\UserLevelLogic;
use app\common\enum\user\AccountLogEnum;
use app\common\enum\user\UserTerminalEnum;
use app\common\logic\AccountLogLogic;
use app\common\logic\BaseLogic;
use app\common\model\user\User;
use app\common\model\UserPoster;
use think\facade\Db;

/**
 * 用户逻辑层
 * Class UserLogic
 * @package app\adminapi\logic\user
 */
class UserLogic extends BaseLogic
{

    /**
     * @notes 用户详情
     * @param int $userId
     * @return array
     * @author 段誉
     * @date 2022/9/22 16:32
     */
    public static function detail(int $userId): array
    {
        $field = [
            'id', 'sn', 'account', 'nickname', 'avatar', 'real_name',
            'sex', 'mobile', 'create_time', 'login_time', 'channel',
            'user_money', 'invitation_code', 'icode', 'email', 'points'
        ];

        $user = User::where(['id' => $userId])->field($field)
            ->findOrEmpty();

        if ($user->isEmpty()) {
            return [];
        }

        // 上级用户[如果存在]
        if ($user->invitation_code) {
            $icodeUser = User::where(['idx_icode' => $user->invitation_code])->field($field)->findOrEmpty();
        }

        // 下级总数
        $subordinateUserIds = User::where('invitation_code', $user->icode)->where('is_disable', 0)->column('id');

        // 今日分享数 [@todo 统计数据 后续可以统一新建统计表，不用每次去查询]
        $todayShareCount = UserPoster::whereIn('user_id', $subordinateUserIds)->where('date', date('Y-m-d'))->count();

        // 有分享记录的账号总数
        $shareUserCount = UserPoster::whereIn('user_id', $subordinateUserIds)->group('user_id')->count('DISTINCT user_id');

        // 用户等级 - 分值对应的优惠比例
        $discount = UserLevelLogic::getUserLevel($user->points)['discount'] ?? 0;
        $levelName = UserLevelLogic::getUserLevel($user->points)['name'] ?? '';

//        $user['channel'] = UserTerminalEnum::getTermInalDesc($user['channel']);
        $user->sex = $user->getData('sex');
        $userInfo = $user->toArray();
        // 上级用户
        $userInfo['parent_username'] = $icodeUser['real_name'] ?? '';
        $userInfo['subordinate_count'] = count($subordinateUserIds);
        $userInfo['today_share_count'] = $todayShareCount;
        $userInfo['has_share_user_count'] = $shareUserCount;
        $userInfo['user_discount'] = $discount;
        $userInfo['user_level_name'] = $levelName;

        return $userInfo;
    }


    /**
     * @notes 更新用户信息
     * @param array $params
     * @return User
     * @author 段誉
     * @date 2022/9/22 16:38
     */
    public static function setUserInfo(array $params)
    {
        return User::update([
            'id' => $params['id'],
            $params['field'] => $params['value']
        ]);
    }


    /**
     * @notes 调整用户余额
     * @param array $params
     * @return bool|string
     * @author 段誉
     * @date 2023/2/23 14:25
     */
    public static function adjustUserMoney(array $params)
    {
        Db::startTrans();
        try {
            $user = User::find($params['user_id']);
            if (AccountLogEnum::INC == $params['action']) {
                //调整可用余额
                $user->user_money += $params['num'];
                $user->save();
                //记录日志
                AccountLogLogic::add(
                    $user->id,
                    AccountLogEnum::UM_INC_ADMIN,
                    AccountLogEnum::INC,
                    $params['num'],
                    '',
                    $params['remark'] ?? ''
                );
            } else {
                $user->user_money -= $params['num'];
                $user->save();
                //记录日志
                AccountLogLogic::add(
                    $user->id,
                    AccountLogEnum::UM_DEC_ADMIN,
                    AccountLogEnum::DEC,
                    $params['num'],
                    '',
                    $params['remark'] ?? ''
                );
            }

            Db::commit();
            return true;

        } catch (\Exception $e) {
            Db::rollback();
            return $e->getMessage();
        }
    }

}