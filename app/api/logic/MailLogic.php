<?php
namespace app\api\logic;

use app\common\logic\BaseLogic;
use EasyWeChat\Kernel\Exceptions\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use think\facade\Lang;

/**
 * 邮箱逻辑类
 */
class MailLogic extends BaseLogic
{
    const EMAIL_CODE_EXPIRE = 5;

    private array $config;

    private PHPMailer $mail;

    public function __construct()
    {
        $this->config = config('mail');
        $this->mail = new PHPMailer(true);
    }
    
    public function sendPwdEmail($to, $code)
    {
        try {
            // $sta = send_gmail($to, Lang::get('email_pwd_title'), sprintf(Lang::get('email_pwd_body'), $code, self::EMAIL_CODE_EXPIRE));
            $this->mail->isSMTP();
            $this->mail->Host = $this->config['host'];
            $this->mail->SMTPAuth = true;
            $this->mail->Username = $this->config['username'];
            $this->mail->Password = $this->config['password'];
            $this->mail->SMTPSecure = $this->config['encryption'];
            $this->mail->Port = $this->config['port'];

            $this->mail->setFrom($this->config['from']['email'], $this->config['from']['name']);
            $this->mail->addAddress($to);

            $this->mail->isHTML(true);
            $this->mail->Subject = Lang::get('email_pwd_title');
            $this->mail->Body = sprintf(Lang::get('email_pwd_body'), $code, self::EMAIL_CODE_EXPIRE);

            $this->mail->Send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    
    public function sendVerificationEmail(string $to, int $code)
    {
        try {
            $this->mail->isSMTP();
            $this->mail->Host = $this->config['host'];
            $this->mail->SMTPAuth = true;
            $this->mail->Username = $this->config['username'];
            $this->mail->Password = $this->config['password'];
            $this->mail->SMTPSecure = $this->config['encryption'];
            $this->mail->Port = $this->config['port'];

            $this->mail->setFrom($this->config['from']['email'], $this->config['from']['name']);
            $this->mail->addAddress($to);

            $this->mail->isHTML(true);
            $this->mail->Subject = Lang::get('email_title');
            $this->mail->Body = sprintf(Lang::get('email_body'), $code, self::EMAIL_CODE_EXPIRE);

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}