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


use app\common\model\user\User;
use app\common\validate\BaseValidate;
use think\facade\Lang;

/**
 * 注册验证器
 * Class RegisterValidate
 * @package app\api\validate
 */
class RegisterValidate extends BaseValidate
{

    public function __construct()
    {
        parent::__construct();

        $this->message = [
            'account.require' => Lang::get('account.require'),
            'account.regex' => Lang::get('account.regex'),
            'account.length' => Lang::get('account.length'),
            'account.unique' => Lang::get('account.unique'),
            'full_name.require' => Lang::get('full_name.require'),
            'password.require' => Lang::get('password.require'),
            'password.length' => Lang::get('password.length'),
            'password.regex' => Lang::get('password.regex'),
            'password_confirm.require' => Lang::get('password_confirm.require'),
            'password_confirm.confirm' => Lang::get('password_confirm.confirm'),
            'phone_number.require' => Lang::get('phone_number.require'),
            'email.require' => Lang::get('email.require'),
            'code.require' => Lang::get('code.require'),
            'invitation_code.require' => Lang::get('invitation_code.require'),
            'invitation_code.unique' => Lang::get('invitation_code.unique'),
        ];
    }

    protected $regex = [
        'register' => '^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$',
        'password' => '/^(?![0-9]+$)(?![a-z]+$)(?![A-Z]+$)(?!([^(0-9a-zA-Z)]|[\(\)])+$)([^(0-9a-zA-Z)]|[\(\)]|[a-z]|[A-Z]|[0-9]){6,20}$/',
    ];

    protected $rule = [
        'account' => 'require|length:3,12|unique:' . User::class . '|regex:register',
        'full_name' => 'require',
        'password' => 'require|length:6,20|regex:password',
        'password_confirm' => 'require|confirm',
        'phone_number' => 'require',
        'email' => 'require|email',
        'code' => 'require|length:6|integer',
//        'invitation_code' => 'require|unique:' . User::class,
    ];

}