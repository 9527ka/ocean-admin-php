<?php
//印尼语
return [
    // +----------------------------------------------------------------------
    // | 系统级日志
    // +----------------------------------------------------------------------
    'system_success' => 'Operasi berhasil',
    'system_failed' => 'Operasi gagal',
    'system_error' => 'Kesalahan sistem',

    // +----------------------------------------------------------------------
    // | 验证器 Validate
    // +----------------------------------------------------------------------
    // 登录注册模块
    'account.require' => 'Akun diperlukan',
    'account.regex' => 'Nomor akun harus berupa alfanumerik',
    'account.length' => 'Nomor akun harus antara 6 hingga 12 digit',
    'account.unique' => 'Akun sudah ada',
    'full_name.require' => 'Nama lengkap diperlukan',
    'password.require' => 'Kata sandi diperlukan',
    'password.length' => 'Kata sandi harus antara 6-25 karakter',
    'password.regex' => 'Kata sandi harus merupakan kombinasi angka, huruf, atau simbol',
    'password_confirm.require' => 'Konfirmasi kata sandi diperlukan',
    'password_confirm.confirm' => 'Kedua kata sandi berbeda',
    'phone_number.require' => 'Nomor telepon diperlukan',
    'email.require' => 'Email diperlukan',
    'code.require' => 'Kode diperlukan',
    'invitation_code.require' => 'Kode undangan diperlukan',
    'invitation_code.unique' => 'Kode undangan sudah ada',
    'invitation_code_failed' => 'Gagal menghasilkan kode undangan. Silakan coba lagi nanti',
    'account_disabled' => 'Akun telah dihapus atau dinonaktifkan',
    'token_missing' => 'Parameter permintaan tidak memiliki token',
    'login_again' => 'Waktu masuk telah habis, silakan masuk lagi',
    // 修改密码
    'old_password.require' => 'Kata sandi lama diperlukan',
    'new_password.require' => 'Kata sandi baru diperlukan',
    'new_password.length' => 'Kata sandi harus antara 6-25 karakter',
    'new_password.alphaNum' => 'Kata sandi harus berupa alfanumerik',

    // +----------------------------------------------------------------------
    // | 业务逻辑 Controller Logic
    // +----------------------------------------------------------------------
    // 登录注册
    'register_success' => 'Pendaftaran berhasil',
    'send_code_success' => 'Kode verifikasi berhasil dikirim',
    'send_code_failed' => 'Gagal mengirim kode verifikasi',
    'code_empty' => 'Anda belum mengirimkan kode verifikasi email',
    'code_expired' => 'Kode verifikasi Anda telah kedaluwarsa, silakan kirim ulang',
    'code_invalidate' => 'Kode verifikasi tidak benar',
    'user_not_exist' => 'Pengguna tidak ada',
    'password_invalidate' => 'Kata sandi salah',
    'old_password_invalidate' => 'Kesalahan kata sandi asli',
    // 邮箱验证码
    'email_title' => 'Kode verifikasi email',
    'email_body' => 'Kode verifikasi Anda adalah: <b>%s</b>, Waktu efektif adalah: <b>%s</b> menit',
    //给邮箱发送6位数密码
    'email_pwd_title' => 'Kata sandi masuk baru',
    'email_pwd_body' => 'Kata sandi masuk baru Anda adalah: <b>%s</b>',
    'update_pwd_success' => 'Modifikasi kata sandi berhasil! Silakan periksa email Anda untuk mendapatkan kata sandi baru dan masuk kembali',
    'update_pwd_failed' => 'Modifikasi kata sandi gagal! Silakan coba lagi.',
    // 分享海报
    'has_shared' => 'Anda telah berbagi hari ini, silakan kembali besok',

    //下单
    'product_cannot_empty' => 'Produk tidak boleh kosong',
    'voucher_cannot_empty' => 'Voucher pembayaran tidak boleh kosong',
    'hash_empty' => 'Alamat hash tidak boleh kosong',
    'product_taken_down' => 'Produk telah diturunkan, silakan coba lagi',
    'order_succees' => 'Pesanan berhasil, silakan tunggu untuk ditinjau',
    'order_fail' => 'Pesanan gagal, silakan coba lagi',
    'order_pending' => 'Anda masih memiliki pesanan yang menunggu tinjauan',
    'order_hash_already' => 'Alamat hash sudah ada',
    'invitation_code_error' => 'Kode undangan tidak ada',
    'email_already_exist' => 'Email sudah ada',
    'account_already_exist' => 'Akun sudah ada',
    'mobile_already_exist' => 'Nomor ponsel sudah ada',
    'email_not_exist' => 'Email tidak ada',
    'username_not_exist' => 'Nama pengguna tidak ada',
    'email_is_empty' => 'Email tidak boleh kosong',
    'username_is_empty' => 'Nama pengguna tidak boleh kosong',
];
