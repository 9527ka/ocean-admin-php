<?php
//泰语
return [
    // +----------------------------------------------------------------------
    // | 系统级日志
    // +----------------------------------------------------------------------
    'system_success' => 'ดำเนินการสำเร็จ',
    'system_failed' => 'การดำเนินการล้มเหลว',
    'system_error' => 'ข้อผิดพลาดของระบบ',

    // +----------------------------------------------------------------------
    // | 验证器 Validate
    // +----------------------------------------------------------------------
    // 登录注册模块
    'account.require' => 'ต้องการบัญชี',
    'account.regex' => 'หมายเลขบัญชีต้องเป็นตัวอักษรและตัวเลข',
    'account.length' => 'หมายเลขบัญชีต้องมีความยาวระหว่าง 6 ถึง 12 หลัก',
    'account.unique' => 'บัญชีมีอยู่แล้ว',
    'full_name.require' => 'ต้องการชื่อเต็ม',
    'password.require' => 'ต้องการรหัสผ่าน',
    'password.length' => 'รหัสผ่านต้องมีความยาวระหว่าง 6-25 อักขระ',
    'password.regex' => 'รหัสผ่านต้องเป็นการผสมผสานระหว่างตัวเลข ตัวอักษร หรือตัวสัญลักษณ์',
    'password_confirm.require' => 'ต้องการยืนยันรหัสผ่าน',
    'password_confirm.confirm' => 'รหัสผ่านทั้งสองไม่ตรงกัน',
    'phone_number.require' => 'ต้องการหมายเลขโทรศัพท์',
    'email.require' => 'ต้องการอีเมล',
    'code.require' => 'ต้องการรหัส',
    'invitation_code.require' => 'ต้องการรหัสเชิญ',
    'invitation_code.unique' => 'รหัสเชิญมีอยู่แล้ว',
    'invitation_code_failed' => 'การสร้างรหัสเชิญล้มเหลว กรุณาลองใหม่อีกครั้งในภายหลัง',
    'account_disabled' => 'บัญชีถูกลบหรือถูกปิดใช้งาน',
    'token_missing' => 'พารามิเตอร์คำขอขาดโทเค็น',
    'login_again' => 'การเข้าสู่ระบบหมดเวลา กรุณาเข้าสู่ระบบใหม่อีกครั้ง',
    // 修改密码
    'old_password.require' => 'ต้องการรหัสผ่านเก่า',
    'new_password.require' => 'ต้องการรหัสผ่านใหม่',
    'new_password.length' => 'รหัสผ่านต้องมีความยาวระหว่าง 6-25 อักขระ',
    'new_password.alphaNum' => 'รหัสผ่านต้องเป็นตัวอักษรและตัวเลข',

    // +----------------------------------------------------------------------
    // | 业务逻辑 Controller Logic
    // +----------------------------------------------------------------------
    // 登录注册
    'register_success' => 'ลงทะเบียนสำเร็จ',
    'send_code_success' => 'ส่งรหัสยืนยันสำเร็จ',
    'send_code_failed' => 'การส่งรหัสยืนยันล้มเหลว',
    'code_empty' => 'คุณยังไม่ได้ส่งรหัสยืนยันทางอีเมล',
    'code_expired' => 'รหัสยืนยันของคุณหมดอายุแล้ว กรุณาส่งใหม่อีกครั้ง',
    'code_invalidate' => 'รหัสยืนยันไม่ถูกต้อง',
    'user_not_exist' => 'ผู้ใช้ไม่อยู่',
    'password_invalidate' => 'รหัสผ่านผิดพลาด',
    'old_password_invalidate' => 'รหัสผ่านเดิมผิดพลาด',
    // 邮箱验证码
    'email_title' => 'รหัสยืนยันทางอีเมล',
    'email_body' => 'รหัสยืนยันของคุณคือ: <b>%s</b>, เวลาที่มีผลคือ: <b>%s</b> นาที',
    //给邮箱发送6位数密码
    'email_pwd_title' => 'รหัสผ่านเข้าสู่ระบบใหม่',
    'email_pwd_body' => 'รหัสผ่านเข้าสู่ระบบใหม่ของคุณคือ: <b>%s</b>',
    'update_pwd_success' => 'การแก้ไขรหัสผ่านสำเร็จ! กรุณาไปที่อีเมลของคุณเพื่อรับรหัสผ่านใหม่และเข้าสู่ระบบอีกครั้ง',
    'update_pwd_failed' => 'การแก้ไขรหัสผ่านล้มเหลว! กรุณาลองใหม่อีกครั้ง',
    // 分享海报
    'has_shared' => 'วันนี้คุณได้แชร์แล้ว กรุณากลับมาใหม่พรุ่งนี้',

    //下单
    'product_cannot_empty' => 'สินค้าต้องไม่ว่างเปล่า',
    'voucher_cannot_empty' => 'ใบสำคัญการชำระเงินต้องไม่ว่างเปล่า',
    'hash_empty' => 'ที่อยู่แฮชต้องไม่ว่างเปล่า',
    'product_taken_down' => 'สินค้าถูกนำลงแล้ว กรุณาลองใหม่อีกครั้ง',
    'order_succees' => 'สั่งซื้อสำเร็จ กรุณารอการตรวจสอบ',
    'order_fail' => 'การสั่งซื้อล้มเหลว กรุณาลองใหม่อีกครั้ง',
    'order_pending' => 'คุณยังมีคำสั่งซื้อที่รอการตรวจสอบ',
    'order_hash_already' => 'ที่อยู่แฮชมีอยู่แล้ว',
    'invitation_code_error' => 'รหัสเชิญไม่มีอยู่',
    'email_already_exist' => 'อีเมลมีอยู่แล้ว',
    'account_already_exist' => 'บัญชีมีอยู่แล้ว',
    'mobile_already_exist' => 'หมายเลขโทรศัพท์มือถือมีอยู่แล้ว',
    'email_not_exist' => 'อีเมลไม่อยู่',
    'username_not_exist' => 'ชื่อผู้ใช้ไม่อยู่',
    'email_is_empty' => 'อีเมลต้องไม่ว่างเปล่า',
    'username_is_empty' => 'ชื่อผู้ใช้ต้องไม่ว่างเปล่า',
];
