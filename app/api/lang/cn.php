<?php
return [
    // +----------------------------------------------------------------------
    // | 系統級日誌
    // +----------------------------------------------------------------------
    'system_success' => '操作成功',
    'system_failed' => '操作失敗',
    'system_error' => '系統錯誤',

    // +----------------------------------------------------------------------
    // | 驗證器 Validate
    // +----------------------------------------------------------------------
    // 登錄註冊模塊
    'account.require' => '帳號為必填項',
    'account.regex' => '帳號必須是字母和數字組合',
    'account.length' => '帳號必須在6到12位之間',
    'account.unique' => '帳號已存在',
    'full_name.require' => '姓名為必填項',
    'password.require' => '密碼為必填項',
    'password.length' => '密碼必須在6到25個字符之間',
    'password.regex' => '密碼必須是數字、字母或符號的組合',
    'password_confirm.require' => '確認密碼為必填項',
    'password_confirm.confirm' => '兩次輸入的密碼不一致',
    'phone_number.require' => '電話號碼為必填項',
    'email.require' => '電子郵件為必填項',
    'code.require' => '驗證碼為必填項',
    'invitation_code.require' => '邀請碼為必填項',
    'invitation_code.unique' => '邀請碼已存在',
    'invitation_code_failed' => '邀請碼生成失敗，請稍後再試',
    'account_disabled' => '帳號已被刪除或禁用',
    'token_missing' => '請求參數缺少令牌',
    'login_again' => '登錄超時，請重新登錄',
    // 修改密碼
    'old_password.require' => '舊密碼為必填項',
    'new_password.require' => '新密碼為必填項',
    'new_password.length' => '新密碼必須在6到25個字符之間',
    'new_password.alphaNum' => '新密碼必須是字母和數字組合',

    // +----------------------------------------------------------------------
    // | 業務邏輯 Controller Logic
    // +----------------------------------------------------------------------
    // 登錄註冊
    'register_success' => '註冊成功',
    'send_code_success' => '驗證碼發送成功',
    'send_code_failed' => '驗證碼發送失敗',
    'code_empty' => '您尚未發送電子郵件驗證碼',
    'code_expired' => '您的驗證碼已過期，請重新發送',
    'code_invalidate' => '驗證碼不正確',
    'user_not_exist' => '用戶不存在',
    'password_invalidate' => '密碼錯誤',
    'old_password_invalidate' => '原密碼錯誤',
    // 電子郵件驗證碼
    'email_title' => '電子郵件驗證碼',
    'email_body' => '您的驗證碼是：<b>%s</b>，有效時間為：<b>%s</b>分鐘',
    // 發送6位數新密碼至電子郵件
    'email_pwd_title' => '新登錄密碼',
    'email_pwd_body' => '您的新登錄密碼是：<b>%s</b>',
    'update_pwd_success' => '密碼修改成功！請前往您的電子郵件獲取新密碼並重新登錄',
    'update_pwd_failed' => '密碼修改失敗！請再試一次。',
    // 分享海報
    'has_shared' => '您今天已經分享過，請明天再來',

    // 下單
    'product_cannot_empty' => '產品不能為空',
    'voucher_cannot_empty' => '付款憑證不能為空',
    'hash_empty' => 'Hash 地址不能為空',
    'product_taken_down' => '該產品已下架，請重新選擇',
    'order_succees' => '訂單提交成功，請等待審核',
    'order_fail' => '訂單提交失敗，請再試一次',
    'order_pending' => '您還有待審核的訂單',
    'order_hash_already' => 'Hash 地址已存在',
    'invitation_code_error' => '邀請碼不存在',
    'email_already_exist' => '電子郵件已存在',
    'account_already_exist' => '帳號已存在',
    'mobile_already_exist' => '手機號碼已存在',
    'email_not_exist' => '電子郵件不存在',
    'username_not_exist' => '用戶名不存在',
    'email_is_empty' => '電子郵件不能為空',
    'username_is_empty' => '用戶名不能為空',
];
