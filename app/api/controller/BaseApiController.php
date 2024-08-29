<?php
// +----------------------------------------------------------------------
// | likeadmin快速开发前后端分离管理后台（PHP版）
// +----------------------------------------------------------------------
// | 欢迎阅读学习系统程序代码，建议反馈是我们前进的动力
// | 开源版本可自由商用，可去除界面版权logo
// | gitee下载：https://gitee.com/likeshop_gitee/likeadmin
// | github下载：https://github.com/likeshop-github/likeadmin
// | 访问官网：https://www.likeadmin.cn
// | likeadmin团队 版权所有 拥有最终解释权
// +----------------------------------------------------------------------
// | author: likeadminTeam
// +----------------------------------------------------------------------

namespace app\api\controller;

use app\common\controller\BaseLikeAdminController;
// use think\facade\App;
use think\facade\Lang;
class BaseApiController extends BaseLikeAdminController
{
    protected int $userId = 0;
    protected array $userInfo = [];

    public function initialize()
    {
        // 如果前端传递了语言类型，则设置语言环境
        $lang = $this->request->get('lang');
        if ($lang) {
            // 设置当前应用的语言
            // App::setLang($lang);
            Lang::setLangSet($lang);
        }
        if (isset($this->request->userInfo) && $this->request->userInfo) {
            $this->userInfo = $this->request->userInfo;
            $this->userId = $this->request->userInfo['user_id'];
        }
    }
}