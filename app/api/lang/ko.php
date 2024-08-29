<?php
//韩语
return [
    // +----------------------------------------------------------------------
    // | 系统级日志
    // +----------------------------------------------------------------------
    'system_success' => '작업이 성공적으로 완료되었습니다',
    'system_failed' => '작업 실패',
    'system_error' => '시스템 오류',

    // +----------------------------------------------------------------------
    // | 验证器 Validate
    // +----------------------------------------------------------------------
    // 登录注册模块
    'account.require' => '계정이 필요합니다',
    'account.regex' => '계정 번호는 영숫자여야 합니다',
    'account.length' => '계정 번호는 6에서 12자리 사이여야 합니다',
    'account.unique' => '계정이 이미 존재합니다',
    'full_name.require' => '전체 이름이 필요합니다',
    'password.require' => '비밀번호가 필요합니다',
    'password.length' => '비밀번호는 6~25자 사이여야 합니다',
    'password.regex' => '비밀번호는 숫자, 문자 또는 기호의 조합이어야 합니다',
    'password_confirm.require' => '비밀번호 확인이 필요합니다',
    'password_confirm.confirm' => '두 비밀번호가 다릅니다',
    'phone_number.require' => '전화번호가 필요합니다',
    'email.require' => '이메일이 필요합니다',
    'code.require' => '코드가 필요합니다',
    'invitation_code.require' => '초대 코드가 필요합니다',
    'invitation_code.unique' => '초대 코드는 이미 존재합니다',
    'invitation_code_failed' => '초대 코드 생성 실패. 나중에 다시 시도해 주세요',
    'account_disabled' => '계정이 삭제되었거나 비활성화되었습니다',
    'token_missing' => '요청 매개변수에 토큰이 없습니다',
    'login_again' => '로그인이 만료되었습니다. 다시 로그인해 주세요',
    // 修改密码
    'old_password.require' => '이전 비밀번호가 필요합니다',
    'new_password.require' => '새 비밀번호가 필요합니다',
    'new_password.length' => '비밀번호는 6~25자 사이여야 합니다',
    'new_password.alphaNum' => '비밀번호는 영숫자여야 합니다',

    // +----------------------------------------------------------------------
    // | 业务逻辑 Controller Logic
    // +----------------------------------------------------------------------
    // 登录注册
    'register_success' => '성공적으로 등록되었습니다',
    'send_code_success' => '인증 코드가 성공적으로 전송되었습니다',
    'send_code_failed' => '인증 코드 전송 실패',
    'code_empty' => '이메일 인증 코드를 보내지 않았습니다',
    'code_expired' => '인증 코드가 만료되었습니다. 다시 보내주세요',
    'code_invalidate' => '인증 코드가 올바르지 않습니다',
    'user_not_exist' => '사용자가 존재하지 않습니다',
    'password_invalidate' => '잘못된 비밀번호',
    'old_password_invalidate' => '원래 비밀번호 오류',
    // 邮箱验证码
    'email_title' => '이메일 인증 코드',
    'email_body' => '당신의 인증 코드는: <b>%s</b>, 유효 시간은: <b>%s</b>분입니다',
    //给邮箱发送6位数密码
    'email_pwd_title' => '새 로그인 비밀번호',
    'email_pwd_body' => '새 로그인 비밀번호는: <b>%s</b>입니다',
    'update_pwd_success' => '비밀번호 변경이 성공했습니다! 새 비밀번호를 받으려면 이메일을 확인하고 다시 로그인해 주세요',
    'update_pwd_failed' => '비밀번호 변경 실패! 다시 시도해 주세요.',
    // 分享海报
    'has_shared' => '오늘 이미 공유했습니다. 내일 다시 오세요',

    //下单
    'product_cannot_empty' => '제품은 비워 둘 수 없습니다',
    'voucher_cannot_empty' => '결제 바우처는 비워 둘 수 없습니다',
    'hash_empty' => '해시 주소는 비워 둘 수 없습니다',
    'product_taken_down' => '제품이 내려졌습니다. 다시 시도해 주세요',
    'order_succees' => '주문이 성공적으로 완료되었습니다. 검토를 기다려 주세요',
    'order_fail' => '주문 실패, 다시 시도해 주세요',
    'order_pending' => '아직 검토 중인 주문이 있습니다',
    'order_hash_already' => '해시 주소가 이미 존재합니다',
    'invitation_code_error' => '초대 코드가 존재하지 않습니다',
    'email_already_exist' => '이메일이 이미 존재합니다',
    'account_already_exist' => '계정이 이미 존재합니다',
    'mobile_already_exist' => '모바일이 이미 존재합니다',
    'email_not_exist' => '이메일이 존재하지 않습니다',
    'username_not_exist' => '사용자 이름이 존재하지 않습니다',
    'email_is_empty' => '이메일은 비워 둘 수 없습니다',
    'username_is_empty' => '사용자 이름은 비워 둘 수 없습니다',
];
