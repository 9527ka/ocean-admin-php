<?php
return [
    // +----------------------------------------------------------------------
    // | 系统级日志
    // +----------------------------------------------------------------------
    'system_success' => '操作成功',
    'system_failed' => '操作失败',
    'system_error' => '系统错误',

    // +----------------------------------------------------------------------
    // | 验证器 Validate
    // +----------------------------------------------------------------------
    // 登录注册模块 - 验证器
    'account.require' => '请输入账号',
    'account.regex' => '账号须为字母数字组合',
    'account.length' => '账号须为3-12位之间',
    'account.unique' => '账号已存在',
    'full_name.require' => '请输入全名',
    'password.require' => '请输入密码',
    'password.length' => '密码须在6-25位之间',
    'password.regex' => '密码须为数字,字母或符号组合',
    'password_confirm.require' => '请输入确认密码',
    'password_confirm.confirm' => '两次输入的密码不一致',
    'phone_number.require' => '请输入手机号码',
    'email.require' => '请输入邮箱账号',
    'code.require' => '请输入邮箱验证码',
    'invitation_code.require' => '请输入邀请码',
    'invitation_code.unique' => '邀请码已存在',
    'invitation_code_failed' => '邀请码生辰有误，请稍后重试',
    'account_disabled' => '账号被注销或者已被禁用',
    'token_missing' => '请求缺少token',
    'login_again' => '登录已过期，请重新登录',
    // 修改密码
    'old_password.require' => '请输入旧密码',
    'new_password.require' => '请输入新密码',
    'new_password.length' => '密码须在6-25位之间',
    'new_password.alphaNum' => '密码须为字母数字组合',

    // +----------------------------------------------------------------------
    // | 业务逻辑 Controller Logic
    // +----------------------------------------------------------------------
    // 登录注册
    'register_success' => '注册成功',
    'send_code_success' => '验证码发送成功',
    'send_code_failed' => '验证码发送失败',
    'code_empty' => '您还未发送邮箱验证码',
    'code_expired' => '您的验证码已经过期，请重新发送',
    'code_invalidate' => '您输入的验证码不正确',
    'user_not_exist' => '用户不存在',
    'password_invalidate' => '密码错误',
    'old_password_invalidate' => '原始密码错误',
    // 邮箱验证码
    'email_title' => '邮箱验证码',
    'email_body' => '您的验证码是: <b>%s</b>, 有效时间为: <b>%s</b>分钟',
    // 海报
    'has_shared' => '您今天已经分享过了，请明天再来',
    'email_already_exists' => '邮箱已存在'

];