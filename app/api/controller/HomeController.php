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


use app\api\lists\AnimalLists;
use app\api\lists\ArticleLists;
use app\api\lists\PlantsLists;
use app\api\logic\IndexLogic;
use app\common\model\Animals;
use app\common\model\Article;
use app\common\model\Plants;
use think\response\Json;


/**
 * home
 * Class HomeController
 * @package app\api\controller
 */
class HomeController extends BaseApiController
{


    public array $notNeedLogin = ['news', 'animals', 'plants'];


    public function news()
    {
        return $this->dataLists(new ArticleLists());
    }

    public function animals()
    {
        return $this->dataLists(new AnimalLists());
    }

    public function plants()
    {
        return $this->dataLists(new PlantsLists());
    }

}