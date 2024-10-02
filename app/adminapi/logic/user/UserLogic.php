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
use app\common\model\OceanCardOrder;
use think\facade\Db;
use think\facade\Config;
use app\api\logic\LoginLogic;

use think\Exception;
use app\common\service\{
    ConfigService,
    FileService
};

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
    public static function detail_back(int $userId): array
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
    public static function detail(int $userId): array
    {
        $field = [
            'id', 'sn', 'account', 'nickname', 'avatar', 'real_name',
            'sex', 'mobile', 'create_time', 'login_time', 'channel',
            'user_money', 'invitation_code', 'icode', 'email', 'points','parent_id'
        ];

        $user = User::where(['id' => $userId])->field($field)
            ->findOrEmpty();

        if ($user->isEmpty()) {
            return [];
        }

        // 上级用户[如果存在]
        $icodeUser = [];
        if ($user->parent_id) {
            $icodeUser = User::where(['id' => $user->parent_id])->field($field)->findOrEmpty();
        }
        $users = User::where('parent_id',$userId)->whereOr('parent_2_id',$userId)
            ->field(['GROUP_CONCAT(DISTINCT id) as ids'])->find();
        $user_ids = empty($users) ? '' : $users['ids'];

        // 有分享记录的账号总数,子用户分享数
        $shareUserCount = OceanCardOrder::alias('o')
            ->join('user u', 'o.user_id = u.id')
            ->where('o.state', 1)
            ->where('u.parent_id|u.parent_2_id', $userId)
            ->count();
        //统计下单总数
        $orderCount = OceanCardOrder::whereIn('user_id',$user_ids)->count();
        //统计总充值
        $orderTotal = OceanCardOrder::whereIn('user_id',$user_ids)->sum('price');
        // 用户等级 - 分值对应的优惠比例
        $discount = UserLevelLogic::getUserLevel($user->points)['discount'] ?? 0;
        $levelName = UserLevelLogic::getUserLevel($user->points)['name'] ?? '';

        $user->sex = $user->getData('sex');
        $userInfo = $user->toArray();
        // 上级用户
        $subordinateCount = 0;
        if($user_ids != ''){
            // echo $user_ids;die;
            $subordinateCount = count(explode(',',$user_ids));
        }
        
        $userInfo['parent_account'] = $icodeUser['account'] ?? '';
        $userInfo['subordinate_count'] = $subordinateCount;//下级总人数
        $userInfo['has_share_user_count'] = $shareUserCount;//有分享记录的账号总数
        $userInfo['user_discount'] = $discount;//用户等级
        $userInfo['order_count'] = $orderCount;//下单总数
        $userInfo['order_total'] = $orderTotal;//下单总额

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
    
    
    /**
     * @notes 添加
     * @param array $params
     * @return bool
     * @author likeadmin
     * @date 2024/08/24 22:39
     */
    public static function add(array $params): bool
    {
        Db::startTrans();
        try {
            if(!$params['password']){
                throw new \Exception('请填写密码');
            }
            //邮箱是否存在
            $has_email = User::where(['email' => $params['email']])->value('id');
            if($has_email){
                throw new \Exception('邮箱已存在');
            }
            //账号是否存在
            $has_account = User::where('account',$params['account'])->value('id');
            if($has_account){
                throw new \Exception('用户名已存在');
            }
            //手机号是否存在
            $has_mobile = User::where('mobile',$params['mobile'])->value('id');
            if($has_mobile){
                throw new \Exception('手机号已存在');
            }
            //检查邀请码是否存在
            $parent_id = User::where('icode',$params['invitation_code'])->value('id');
            if(!$parent_id){
                throw new \Exception('邀请码不存在');
            }
            $parent_2_id = User::where('id',$parent_id)->value('parent_id');

            $userSn = User::createUserSn();
            
            $password = getPwdEncryptString($params['password']);
            $avatar = $params['avatar'];
            if(!$params['avatar']){
                $avatar = ConfigService::get('default_image', 'user_avatar');
            }
            
            User::create([
                'avatar' => $avatar,
                'real_name' => $params['real_name'],
                'account' => $params['account'],
                'password' => $password,
                'mobile' => $params['mobile'],
                'email' => $params['email'],
                'points' => $params['points'],
                'icode' => self::getIcode(),
                'invitation_code' => $params['invitation_code'],
                // 'login_ip' => $params['login_ip'],
                // 'login_time' => $params['login_time'],
                // 'login_device' => $params['login_device'],
                'parent_id' => $parent_id ?? 0,
                'parent_2_id' => $parent_2_id ?? 0
            ]);

            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
            self::setError($e->getMessage());
            return false;
        }
    }
    public static function getIcode(int $length = 6): string
    {
        $icode = generateReferralCode($length);
        $user = User::where('icode', $icode)->findOrEmpty();
        if (!$user->isEmpty()) {
            $icode = generateReferralCode($length);
            $user = User::where('icode', $icode)->findOrEmpty();
            if (!$user->isEmpty()) {
                throw new Exception('邀请码生成错误，请重试');
            }
        }
        return $icode;
    }

    /**
     * @notes 编辑
     * @param array $params
     * @return bool
     * @author likeadmin
     * @date 2024/08/24 22:39
     */
    public static function edit(array $params): bool
    {
        Db::startTrans();
        try {
            $edit = [
                'avatar' => $params['avatar'],
                'real_name' => $params['real_name'],
                'account' => $params['account'],
                'mobile' => $params['mobile'],
                'email' => $params['email'],
                'points' => $params['points'],
            ];
            if(!empty($params['password'])){
                // $passwordSalt = Config::get('project.unique_identification');
                $edit['password'] = LoginLogic::getPwdEncryptString($params['password']);
            }
            User::where('id', $params['id'])->update($edit);

            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
            self::setError($e->getMessage());
            return false;
        }
    }


    /**
     * @notes 删除
     * @param array $params
     * @return bool
     * @author likeadmin
     * @date 2024/08/24 22:39
     */
    public static function delete(array $params): bool
    {
        return User::destroy($params['id']);
    }

}