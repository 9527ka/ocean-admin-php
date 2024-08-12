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
namespace app\api\validate;

use app\common\validate\BaseValidate;
use think\facade\Lang;

/**
 * 密码校验
 * Class PasswordValidate
 * @package app\api\validate
 */
class PasswordValidate extends BaseValidate
{
    public function __construct()
    {
        parent::__construct();

        $this->message = [
            'old_password.require' => Lang::get('old_password.require'),
            'new_password.require' => Lang::get('new_password.require'),
            'new_password.length' => Lang::get('new_password.length'),
            'new_password.alphaNum' => Lang::get('new_password.alphaNum'),
            'password_confirm.require' => Lang::get('password_confirm.require'),
            'password_confirm.confirm' => Lang::get('password_confirm.confirm'),
            'account.require' => Lang::get('old_password.require'),
        ];
    }

    protected $rule = [
//        'mobile' => 'require|mobile',
//        'mobile' => 'require|mobile',
        'old_password' => 'require',
        'new_password' => 'require|length:6,20|alphaNum',
        'password_confirm' => 'require|confirm:new_password',
    ];

    /**
     * @notes 重置登录密码
     * @return PasswordValidate
     * @author 段誉
     * @date 2022/9/16 18:11
     */
    public function sceneResetPassword()
    {
        return $this->only(['mobile', 'code', 'password', 'password_confirm']);
    }


    /**
     * @notes 修改密码场景
     * @return PasswordValidate
     * @author 段誉
     * @date 2022/9/20 19:14
     */
    public function sceneChangePassword()
    {
        return $this->only(['password', 'password_confirm']);
    }

}