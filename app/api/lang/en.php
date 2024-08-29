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
    'account.length' => 'The account number must be between 6 and 12 digits',
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
    //给邮箱发送6位数密码
    'email_pwd_title' => 'New login password',
    'email_pwd_body' => 'Your new login password is: <b>%s</b>',
    'update_pwd_success' => 'Password modification is successful! Please go to your email to get a new password and log in again',
    'update_pwd_failed' => 'Password modification failed! Please try again.',
    // 分享海报
    'has_shared' => 'You have shared today, please come back tomorrow',
    
    //下单
    'product_cannot_empty' => 'The product cannot be empty',
    'voucher_cannot_empty' => 'Payment voucher cannot be empty',
    'hash_empty' => 'Hash address cannot be empty',
    'product_taken_down' => 'The product has been taken down, please try again',
    'order_succees' => 'Order successfully placed, please wait for review',
    'order_fail' => 'Order failed, please try again',
    'order_pending' => 'You still have pending orders for review',
    'order_hash_already' => 'Hash address already exists',
    'invitation_code_error' => 'Invitation code does not exist',
    'email_already_exist' => 'Email already exist',
    'account_already_exist' => 'Account already exist',
    'mobile_already_exist' => 'Mobile already exist',
    'email_not_exist' => 'Email does not exist',
    'username_not_exist' => 'Username does not exist',
    'email_is_empty' => 'Email cannot be empty',
    'username_is_empty' => 'Username cannot be empty',
];