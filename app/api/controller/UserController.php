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
namespace app\api\controller;


use app\api\logic\UserLevelLogic;
use app\api\logic\UserLogic;
use app\api\validate\PasswordValidate;
use app\api\validate\SetUserInfoValidate;
use app\api\validate\UserValidate;
use app\common\model\user\User;
use app\common\model\UserPosters;
use app\common\model\UserLevel;
use think\facade\Lang;
use app\api\lists\UserLists;
/**
 * 用户控制器
 * Class UserController
 * @package app\api\controller
 */
class UserController extends BaseApiController
{
    public array $notNeedLogin = ['resetPassword'];

    //下级用户
    public function child(){
        return $this->dataLists(new UserLists());
    }
    /**
     * @notes 获取个人中心
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @author 段誉
     * @date 2022/9/16 18:19
     */
    public function center()
    {
        $data = UserLogic::center($this->userInfo);
        return $this->success('', $data);
    }

    /**
     * @notes 获取个人信息
     * @return \think\response\Json
     * @author 段誉
     * @date 2022/9/20 19:46
     */
    public function info()
    {
        $result = UserLogic::info($this->userId);
        
        //子用户数
        $result['invite_partners'] = User::where('parent_id', $this->userId)->whereOr('parent_2_id', $this->userId)->count();
        //子用户分享数
        $result['share_daily'] = UserPosters::alias('up')
            ->join('user u', 'u.id = up.user_id')
            ->where('up.audit_status', 1)
            ->where('u.parent_id|u.parent_2_id', $this->userId)
            ->count();
        $level = UserLevelLogic::getUserLevel($result['points']);
        // 用户分值对应的优惠比例
        $result['discount'] = $level ? $level['discount']*0.1 : 0;
        $result['level_name'] = $level ? $level['name'] : 0;

        // 版本信息
        $result['version'] = 'V1.8.3';

        return $this->data($result);
    }

    public function levels()
    {
        return $this->data(UserLevel::select()->toArray());
    }

    /**
     * @notes 重置密码
     * @return \think\response\Json
     * @author 段誉
     * @date 2022/9/16 18:06
     */
    public function resetPassword()
    {
        $params = (new PasswordValidate())->post()->goCheck('resetPassword');
        $result = UserLogic::resetPassword($params);
        if (true === $result) {
            return $this->success(Lang::get('system_success'), [], 1, 1);
        }
        return $this->fail(UserLogic::getError());
    }

    /**
     * @notes 修改密码
     * @return \think\response\Json
     * @author 段誉
     * @date 2022/9/20 19:16
     */
    public function changePassword()
    {
        $params = (new PasswordValidate())->post()->goCheck();
        $result = UserLogic::changePassword($params, $this->userId);
        if (true === $result) {
            return $this->success(Lang::get('system_success'), [], 1, 1);
        }
        return $this->fail(UserLogic::getError());
    }

    /**
     * @notes 注销用户
     * @return \think\response\Json
     * @author 段誉
     * @date 2022/9/20 19:16
     */
    public function logout()
    {
        $params = (new PasswordValidate())->post()->goCheck('logout');
        $result = UserLogic::logout($params, $this->userId);
        if (true === $result) {
            return $this->success('操作成功', [], 1, 1);
        }
        return $this->fail(UserLogic::getError());
    }


    /**
     * @notes 获取小程序手机号
     * @return \think\response\Json
     * @author 段誉
     * @date 2022/9/21 16:46
     */
    public function getMobileByMnp()
    {
        $params = (new UserValidate())->post()->goCheck('getMobileByMnp');
        $params['user_id'] = $this->userId;
        $result = UserLogic::getMobileByMnp($params);
        if ($result === false) {
            return $this->fail(UserLogic::getError());
        }
        return $this->success('绑定成功', [], 1, 1);
    }


    /**
     * @notes 编辑用户信息
     * @return \think\response\Json
     * @author 段誉
     * @date 2022/9/21 17:01
     */
    public function setInfo()
    {
        $params = (new SetUserInfoValidate())->post()->goCheck(null, ['id' => $this->userId]);
        $result = UserLogic::setInfo($this->userId, $params);
        if (false === $result) {
            return $this->fail(UserLogic::getError());
        }
        return $this->success('操作成功', [], 1, 1);
    }


    /**
     * @notes 绑定/变更 手机号
     * @return \think\response\Json
     * @author 段誉
     * @date 2022/9/21 17:29
     */
    public function bindMobile()
    {
        $params = (new UserValidate())->post()->goCheck('bindMobile');
        $params['user_id'] = $this->userId;
        $result = UserLogic::bindMobile($params);
        if($result) {
            return $this->success('绑定成功', [], 1, 1);
        }
        return $this->fail(UserLogic::getError());
    }

}