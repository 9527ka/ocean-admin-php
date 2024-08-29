<?php
//越南语
return [
    // +----------------------------------------------------------------------
    // | 系统级日志
    // +----------------------------------------------------------------------
    'system_success' => 'Thao tác thành công',
    'system_failed' => 'Thao tác thất bại',
    'system_error' => 'Lỗi hệ thống',

    // +----------------------------------------------------------------------
    // | 验证器 Validate
    // +----------------------------------------------------------------------
    // 登录注册模块
    'account.require' => 'Yêu cầu tài khoản',
    'account.regex' => 'Số tài khoản phải là chữ và số',
    'account.length' => 'Số tài khoản phải có độ dài từ 6 đến 12 chữ số',
    'account.unique' => 'Tài khoản đã tồn tại',
    'full_name.require' => 'Yêu cầu tên đầy đủ',
    'password.require' => 'Yêu cầu mật khẩu',
    'password.length' => 'Mật khẩu phải có độ dài từ 6-25 ký tự',
    'password.regex' => 'Mật khẩu phải là sự kết hợp của số, chữ cái hoặc ký hiệu',
    'password_confirm.require' => 'Yêu cầu xác nhận mật khẩu',
    'password_confirm.confirm' => 'Hai mật khẩu không khớp',
    'phone_number.require' => 'Yêu cầu số điện thoại',
    'email.require' => 'Yêu cầu email',
    'code.require' => 'Yêu cầu mã',
    'invitation_code.require' => 'Yêu cầu mã mời',
    'invitation_code.unique' => 'Mã mời đã tồn tại',
    'invitation_code_failed' => 'Tạo mã mời thất bại. Vui lòng thử lại sau',
    'account_disabled' => 'Tài khoản đã bị xóa hoặc vô hiệu hóa',
    'token_missing' => 'Thiếu tham số yêu cầu token',
    'login_again' => 'Đăng nhập đã hết hạn, vui lòng đăng nhập lại',
    // 修改密码
    'old_password.require' => 'Yêu cầu mật khẩu cũ',
    'new_password.require' => 'Yêu cầu mật khẩu mới',
    'new_password.length' => 'Mật khẩu phải có độ dài từ 6-25 ký tự',
    'new_password.alphaNum' => 'Mật khẩu phải là chữ và số',

    // +----------------------------------------------------------------------
    // | 业务逻辑 Controller Logic
    // +----------------------------------------------------------------------
    // 登录注册
    'register_success' => 'Đăng ký thành công',
    'send_code_success' => 'Mã xác nhận đã được gửi thành công',
    'send_code_failed' => 'Gửi mã xác nhận thất bại',
    'code_empty' => 'Bạn chưa gửi mã xác nhận qua email',
    'code_expired' => 'Mã xác nhận đã hết hạn, vui lòng gửi lại',
    'code_invalidate' => 'Mã xác nhận không đúng',
    'user_not_exist' => 'Người dùng không tồn tại',
    'password_invalidate' => 'Sai mật khẩu',
    'old_password_invalidate' => 'Sai mật khẩu gốc',
    // 邮箱验证码
    'email_title' => 'Mã xác nhận qua email',
    'email_body' => 'Mã xác nhận của bạn là: <b>%s</b>, Thời gian hiệu lực là: <b>%s</b> phút',
    //给邮箱发送6位数密码
    'email_pwd_title' => 'Mật khẩu đăng nhập mới',
    'email_pwd_body' => 'Mật khẩu đăng nhập mới của bạn là: <b>%s</b>',
    'update_pwd_success' => 'Thay đổi mật khẩu thành công! Vui lòng kiểm tra email của bạn để nhận mật khẩu mới và đăng nhập lại',
    'update_pwd_failed' => 'Thay đổi mật khẩu thất bại! Vui lòng thử lại.',
    // 分享海报
    'has_shared' => 'Hôm nay bạn đã chia sẻ, vui lòng quay lại vào ngày mai',

    //下单
    'product_cannot_empty' => 'Sản phẩm không thể trống',
    'voucher_cannot_empty' => 'Phiếu thanh toán không thể trống',
    'hash_empty' => 'Địa chỉ hash không thể trống',
    'product_taken_down' => 'Sản phẩm đã bị gỡ bỏ, vui lòng thử lại',
    'order_succees' => 'Đặt hàng thành công, vui lòng chờ duyệt',
    'order_fail' => 'Đặt hàng thất bại, vui lòng thử lại',
    'order_pending' => 'Bạn vẫn còn đơn hàng đang chờ duyệt',
    'order_hash_already' => 'Địa chỉ hash đã tồn tại',
    'invitation_code_error' => 'Mã mời không tồn tại',
    'email_already_exist' => 'Email đã tồn tại',
    'account_already_exist' => 'Tài khoản đã tồn tại',
    'mobile_already_exist' => 'Số di động đã tồn tại',
    'email_not_exist' => 'Email không tồn tại',
    'username_not_exist' => 'Tên người dùng không tồn tại',
    'email_is_empty' => 'Email không thể trống',
    'username_is_empty' => 'Tên người dùng không thể trống',
];
