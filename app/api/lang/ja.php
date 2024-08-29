<?php
//日语
return [
    // +----------------------------------------------------------------------
    // | 系统级日志
    // +----------------------------------------------------------------------
    'system_success' => '操作が成功しました',
    'system_failed' => '操作に失敗しました',
    'system_error' => 'システムエラー',

    // +----------------------------------------------------------------------
    // | 验证器 Validate
    // +----------------------------------------------------------------------
    // 登录注册模块
    'account.require' => 'アカウントが必要です',
    'account.regex' => 'アカウント番号は英数字でなければなりません',
    'account.length' => 'アカウント番号は6〜12桁の間でなければなりません',
    'account.unique' => 'アカウントはすでに存在します',
    'full_name.require' => 'フルネームが必要です',
    'password.require' => 'パスワードが必要です',
    'password.length' => 'パスワードは6〜25文字でなければなりません',
    'password.regex' => 'パスワードは数字、文字または記号の組み合わせでなければなりません',
    'password_confirm.require' => 'パスワード確認が必要です',
    'password_confirm.confirm' => '2つのパスワードが異なります',
    'phone_number.require' => '電話番号が必要です',
    'email.require' => 'メールアドレスが必要です',
    'code.require' => 'コードが必要です',
    'invitation_code.require' => '招待コードが必要です',
    'invitation_code.unique' => '招待コードはすでに存在します',
    'invitation_code_failed' => '招待コードの生成に失敗しました。後でもう一度お試しください',
    'account_disabled' => 'アカウントは削除されるか無効にされています',
    'token_missing' => 'リクエストパラメーターにトークンがありません',
    'login_again' => 'ログインがタイムアウトしました。再度ログインしてください',
    // 修改密码
    'old_password.require' => '古いパスワードが必要です',
    'new_password.require' => '新しいパスワードが必要です',
    'new_password.length' => 'パスワードは6〜25文字でなければなりません',
    'new_password.alphaNum' => 'パスワードは英数字でなければなりません',

    // +----------------------------------------------------------------------
    // | 业务逻辑 Controller Logic
    // +----------------------------------------------------------------------
    // 登录注册
    'register_success' => '登録に成功しました',
    'send_code_success' => '確認コードの送信に成功しました',
    'send_code_failed' => '確認コードの送信に失敗しました',
    'code_empty' => 'メール確認コードを送信していません',
    'code_expired' => '確認コードの有効期限が切れました。もう一度送信してください',
    'code_invalidate' => '確認コードが正しくありません',
    'user_not_exist' => 'ユーザーが存在しません',
    'password_invalidate' => 'パスワードが間違っています',
    'old_password_invalidate' => '元のパスワードが間違っています',
    // 邮箱验证码
    'email_title' => 'メール確認コード',
    'email_body' => 'あなたの確認コードは: <b>%s</b>、有効時間は: <b>%s</b>分です',
    //给邮箱发送6位数密码
    'email_pwd_title' => '新しいログインパスワード',
    'email_pwd_body' => '新しいログインパスワードは: <b>%s</b>です',
    'update_pwd_success' => 'パスワードの変更に成功しました！新しいパスワードを取得して再度ログインするには、メールを確認してください',
    'update_pwd_failed' => 'パスワードの変更に失敗しました！もう一度お試しください。',
    // 分享海报
    'has_shared' => '今日はすでに共有しました。明日またお越しください',

    //下单
    'product_cannot_empty' => '商品は空であってはなりません',
    'voucher_cannot_empty' => '支払い証明書は空であってはなりません',
    'hash_empty' => 'ハッシュアドレスは空であってはなりません',
    'product_taken_down' => '商品は取り下げられました。もう一度お試しください',
    'order_succees' => '注文が正常に行われました。レビューをお待ちください',
    'order_fail' => '注文に失敗しました。もう一度お試しください',
    'order_pending' => 'まだレビュー待ちの注文があります',
    'order_hash_already' => 'ハッシュアドレスはすでに存在します',
    'invitation_code_error' => '招待コードが存在しません',
    'email_already_exist' => 'メールはすでに存在します',
    'account_already_exist' => 'アカウントはすでに存在します',
    'mobile_already_exist' => '携帯電話はすでに存在します',
    'email_not_exist' => 'メールは存在しません',
    'username_not_exist' => 'ユーザー名は存在しません',
    'email_is_empty' => 'メールは空であってはなりません',
    'username_is_empty' => 'ユーザー名は空であってはなりません',
];
