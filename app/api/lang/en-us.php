<?php
return [
    // +----------------------------------------------------------------------
    // | 系统级日志
    // +----------------------------------------------------------------------
    'system_success' => 'Operate successfully',
    'system_failed' => 'Operation failure',
    'system_error' => 'System error',

    // +----------------------------------------------------------------------
    // | 验证器 Validate
    // +----------------------------------------------------------------------
    // 登录注册模块
    'account.require' => 'Account required',
    'account.regex' => 'Account number must be alphanumeric',
    'account.length' => 'The account number must be between 3 and 12 digits',
    'account.unique' => 'Account already exists',
    'full_name.require' => 'Full name required',
    'password.require' => 'Password required',
    'password.length' => 'Password must be between 6-25 characters',
    'password.regex' => 'The password must be a combination of numbers, letters or symbols',
    'password_confirm.require' => 'Password confirm required',
    'password_confirm.confirm' => 'The two passwords are different',
    'phone_number.require' => 'Phone number required',
    'email.require' => 'email required',
    'code.require' => 'code required',
    'invitation_code.require' => 'Invitation code require',
    'invitation_code.unique' => 'The invitation code already exists',
    'invitation_code_failed' => 'Invitation code generation failed. Please try again later',
    'account_disabled' => 'The account has been deleted or disabled',
    'token_missing' => 'The request parameter lacks a token',
    'login_again' => 'Login timed out, please login again',
    // 修改密码
    'old_password.require' => 'Old password require',
    'new_password.require' => 'New password require',
    'new_password.length' => 'Password must be between 6-25 characters',
    'new_password.alphaNum' => 'The password must be alphanumeric',


    // +----------------------------------------------------------------------
    // | 业务逻辑 Controller Logic
    // +----------------------------------------------------------------------
    // 登录注册
    'register_success' => 'Registered successfully',
    'send_code_success' => 'The verification code is sent successfully',
    'send_code_failed' => 'The verification code is sent failed',
    'code_empty' => 'You have not sent the email verification code',
    'code_expired' => 'Your verification code has expired, please resend it',
    'code_invalidate' => 'The verification code is incorrect',
    'user_not_exist' => 'The user does not exist',
    'password_invalidate' => 'Wrong password',
    'old_password_invalidate' => 'Original password error',
    // 邮箱验证码
    'email_title' => 'Email verification code',
    'email_body' => 'Your verification code is: <b>%s</b>, Effective time is: <b>%s</b>minutes',
    // 分享海报
    'has_shared' => 'You have shared today, please come back tomorrow',
];