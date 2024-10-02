<?php
// 应用公共文件
use app\common\service\FileService;
use think\helper\Str;
use PHPMailer\PHPMailer\PHPMailer;
use think\facade\Config;
/**
 * 根据原始密码设置加密后的密码字符串
 * @param string $originalPwd
 * @return string
 */
function getPwdEncryptString($originalPwd)
{
    return password_hash($originalPwd, PASSWORD_BCRYPT);
    // $passwordSalt = Config::get('project.unique_identification');
    // return create_password($originalPwd, $passwordSalt);
}
//获取随机字符串
function generateReferralCode($length = 10)
{
    return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $length);
}
//获取登录设备
function getDevice(){
    // 获取 User-Agent 请求头信息
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    // 使用正则表达式提取客户端操作系统信息
    if (preg_match('/\(([^)]+)\)/', $userAgent, $matches)) {
        $os = explode(';',$matches[1])[0];
    } else {
        $os = 'Unknown';
    }
    return $os;
}
/**
 * todo 谷歌账号 系统发邮件
 * @param array $tomail 接收邮件者邮箱
 * @param string $subject 邮件主题
 * @param string $body 邮件内容
 * @param string $attachment 附件列表
 * @return boolean
 */
function send_gmail($toMail, $subject = '', $body = '', $attachment = null)
{
    $mail = new PHPMailer();
     //实例化PHPMailer对象
    $mail->IsSMTP();
    $mail->CharSet = "UTF-8";
    $mail->Encoding = 'base64';
    $mail->SMTPDebug = 0; //是否调试
    $mail->SMTPAuth = true;
    $mail->Host = 'ssl://smtp.gmail.com:465'; //host
    $mail->Port = 25; //端口
    
    $mail->Username = "foundationfou@gmail.com"; //发件人邮箱
    $mail->Password = "vtwerpvmjlbqngxc"; //上面获得的谷歌应用程序码（16位字符串，无空格）
    $mail->SetFrom("foundationfou@gmail.com","Content System"); //发件人邮箱和名称
    
    $mail->Subject = $subject; //标题
    $mail->Body = $body; //内容
    $mail->IsHTML(true); //是否启用html
    // $mail->IsHTML = true;
    // foreach ($toMail as $key => $val){
    //     $mail->AddAddress($val, $key);
    // }
    $mail->AddAddress($toMail, 0);
    $sta = $mail->Send();
    if($sta){
        return true;
    }
    return false;
    // return $mail->Send() ? true : $mail->ErrorInfo;
 
}
//剔除空数组
function filtered_array($array){
    $arr = [];
    foreach ($array as $k => $v){
        if($v != ''){
            array_push($arr,[$k,'=',$v]);
        }
    }
    return $arr;
}
//格式化卡号
function format_card_number($number) {
    // 使用正则表达式在每四位数字后插入一个空格
    return preg_replace('/(\d{4})(?=\d)/', '$1 ', $number);
}
//生成卡号
function generate_card_number() {
    return sprintf('%04d%04d%04d%04d', rand(1000, 9999), rand(1000, 9999), rand(1000, 9999), rand(1000, 9999));
}

//生成激活码
function generate_activation_code() {
    $part1 = bin2hex(random_bytes(2)); // 4位
    $part2 = bin2hex(random_bytes(3)); // 6位
    $part3 = bin2hex(random_bytes(2)); // 4位

    return $part1 . '-' . $part2 . '-' . $part3;
}

/**
 * @notes 生成密码加密密钥
 * @param string $plaintext
 * @param string $salt
 * @return string
 * @author 段誉
 * @date 2021/12/28 18:24
 */
function create_password(string $plaintext, string $salt) : string
{
    return md5($salt . md5($plaintext . $salt));
}


/**
 * @notes 随机生成token值
 * @param string $extra
 * @return string
 * @author 段誉
 * @date 2021/12/28 18:24
 */
function create_token(string $extra = '') : string
{
    $salt = env('project.unique_identification', 'likeadmin');
    $encryptSalt = md5( $salt . uniqid());
    return md5($salt . $extra . time() . $encryptSalt);
}


/**
 * @notes 截取某字符字符串
 * @param $str
 * @param string $symbol
 * @return string
 * @author 段誉
 * @date 2021/12/28 18:24
 */
function substr_symbol_behind($str, $symbol = '.') : string
{
    $result = strripos($str, $symbol);
    if ($result === false) {
        return $str;
    }
    return substr($str, $result + 1);
}


/**
 * @notes 对比php版本
 * @param string $version
 * @return bool
 * @author 段誉
 * @date 2021/12/28 18:27
 */
function compare_php(string $version) : bool
{
    return version_compare(PHP_VERSION, $version) >= 0 ? true : false;
}


/**
 * @notes 检查文件是否可写
 * @param string $dir
 * @return bool
 * @author 段誉
 * @date 2021/12/28 18:27
 */
function check_dir_write(string $dir = '') : bool
{
    $route = root_path() . '/' . $dir;
    return is_writable($route);
}


/**
 * 多级线性结构排序
 * 转换前：
 * [{"id":1,"pid":0,"name":"a"},{"id":2,"pid":0,"name":"b"},{"id":3,"pid":1,"name":"c"},
 * {"id":4,"pid":2,"name":"d"},{"id":5,"pid":4,"name":"e"},{"id":6,"pid":5,"name":"f"},
 * {"id":7,"pid":3,"name":"g"}]
 * 转换后：
 * [{"id":1,"pid":0,"name":"a","level":1},{"id":3,"pid":1,"name":"c","level":2},{"id":7,"pid":3,"name":"g","level":3},
 * {"id":2,"pid":0,"name":"b","level":1},{"id":4,"pid":2,"name":"d","level":2},{"id":5,"pid":4,"name":"e","level":3},
 * {"id":6,"pid":5,"name":"f","level":4}]
 * @param array $data 线性结构数组
 * @param string $symbol 名称前面加符号
 * @param string $name 名称
 * @param string $id_name 数组id名
 * @param string $parent_id_name 数组祖先id名
 * @param int $level 此值请勿给参数
 * @param int $parent_id 此值请勿给参数
 * @return array
 */
function linear_to_tree($data, $sub_key_name = 'sub', $id_name = 'id', $parent_id_name = 'pid', $parent_id = 0)
{
    $tree = [];
    foreach ($data as $row) {
        if ($row[$parent_id_name] == $parent_id) {
            $temp = $row;
            $child = linear_to_tree($data, $sub_key_name, $id_name, $parent_id_name, $row[$id_name]);
            if ($child) {
                $temp[$sub_key_name] = $child;
            }
            $tree[] = $temp;
        }
    }
    return $tree;
}


/**
 * @notes 删除目标目录
 * @param $path
 * @param $delDir
 * @return bool|void
 * @author 段誉
 * @date 2022/4/8 16:30
 */
function del_target_dir($path, $delDir)
{
    //没找到，不处理
    if (!file_exists($path)) {
        return false;
    }

    //打开目录句柄
    $handle = opendir($path);
    if ($handle) {
        while (false !== ($item = readdir($handle))) {
            if ($item != "." && $item != "..") {
                if (is_dir("$path/$item")) {
                    del_target_dir("$path/$item", $delDir);
                } else {
                    unlink("$path/$item");
                }
            }
        }
        closedir($handle);
        if ($delDir) {
            return rmdir($path);
        }
    } else {
        if (file_exists($path)) {
            return unlink($path);
        }
        return false;
    }
}


/**
 * @notes 下载文件
 * @param $url
 * @param $saveDir
 * @param $fileName
 * @return string
 * @author 段誉
 * @date 2022/9/16 9:53
 */
function download_file($url, $saveDir, $fileName)
{
    if (!file_exists($saveDir)) {
        mkdir($saveDir, 0775, true);
    }
    $fileSrc = $saveDir . $fileName;
    file_exists($fileSrc) && unlink($fileSrc);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    $file = curl_exec($ch);
    curl_close($ch);
    $resource = fopen($fileSrc, 'a');
    fwrite($resource, $file);
    fclose($resource);
    if (filesize($fileSrc) == 0) {
        unlink($fileSrc);
        return '';
    }
    return $fileSrc;
}


/**
 * @notes 去除内容图片域名
 * @param $content
 * @return array|string|string[]
 * @author 段誉
 * @date 2022/9/26 10:43
 */
function clear_file_domain($content)
{
    $fileUrl = FileService::getFileUrl();
    $pattern = '/<img[^>]*\bsrc=["\']'.preg_quote($fileUrl, '/').'([^"\']+)["\']/i';
    return preg_replace($pattern, '<img src="$1"', $content);
}

/**
 * @notes 设置内容图片域名
 * @param $content
 * @return array|string|string[]|null
 * @author 段誉
 * @date 2024/2/5 16:36
 */
function get_file_domain($content)
{
    $imgPreg = '/(<img .*?src=")[^https|^http](.*?)(".*?>)/is';
    $videoPreg = '/(<video .*?src=")[^https|^http](.*?\.mp4)(".*?>)/is';
    $fileUrl = FileService::getFileUrl();
    $content = preg_replace($imgPreg, "\${1}$fileUrl\${2}\${3}", $content);
    return preg_replace($videoPreg, "\${1}$fileUrl\${2}\${3}", $content);
}


/**
 * @notes uri小写
 * @param $data
 * @return array|string[]
 * @author 段誉
 * @date 2022/7/19 14:50
 */
function lower_uri($data)
{
    if (!is_array($data)) {
        $data = [$data];
    }
    return array_map(function ($item) {
        return strtolower(Str::camel($item));
    }, $data);
}


/**
 * @notes 获取无前缀数据表名
 * @param $tableName
 * @return mixed|string
 * @author 段誉
 * @date 2022/12/12 15:23
 */
function get_no_prefix_table_name($tableName)
{
    $tablePrefix = config('database.connections.mysql.prefix');
    $prefixIndex = strpos($tableName, $tablePrefix);
    if ($prefixIndex !== 0 || $prefixIndex === false) {
        return $tableName;
    }
    $tableName = substr_replace($tableName, '', 0, strlen($tablePrefix));
    return trim($tableName);
}


/**
 * @notes 生成编码
 * @param $table
 * @param $field
 * @param string $prefix
 * @param int $randSuffixLength
 * @param array $pool
 * @return string
 * @author 段誉
 * @date 2023/2/23 11:35
 */
function generate_sn($table, $field, $prefix = '', $randSuffixLength = 4, $pool = []) : string
{
    $suffix = '';
    for ($i = 0; $i < $randSuffixLength; $i++) {
        if (empty($pool)) {
            $suffix .= rand(0, 9);
        } else {
            $suffix .= $pool[array_rand($pool)];
        }
    }
    $sn = $prefix . date('YmdHis') . $suffix;
    if (app()->make($table)->where($field, $sn)->find()) {
        return generate_sn($table, $field, $prefix, $randSuffixLength, $pool);
    }
    return $sn;
}


/**
 * @notes 格式化金额
 * @param $float
 * @return int|mixed|string
 * @author 段誉
 * @date 2023/2/24 11:20
 */
function format_amount($float)
{
    if ($float == intval($float)) {
        return intval($float);
    } elseif ($float == sprintf('%.1f', $float)) {
        return sprintf('%.1f', $float);
    }
    return $float;
}
