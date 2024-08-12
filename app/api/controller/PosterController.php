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


use app\api\lists\UserPosterLists;
use app\api\logic\UserLevelLogic;
use app\api\validate\PosterValidate;
use app\common\model\user\User;
use app\common\model\UserPoster;

/**
 * 海报控制器
 * Class PosterController
 * @package app\api\controller
 */
class PosterController extends BaseApiController
{
    public array $notNeedLogin = ['resetPassword'];

    public function saveSharePoster()
    {
        try {
            $params = (new PosterValidate())->post()->goCheck();
            $images = json_encode($params['images'], JSON_UNESCAPED_UNICODE);
            $date = date('Y-m-d');

//        halt(config('database.mongo'));

            $posterInfo = UserPoster::where('date', $date)->where('user_id', $this->userId)->findOrEmpty();
            if (!$posterInfo->isEmpty()) {
                throw new \Exception('您今天已经分享过了，请明天再来');
            }

//        $userPoster = new UserPoster();
//        $userPoster->user_id = $this->userId;
//        $userPoster->date = $date;
//        $userPoster->poster_images = $images;
//        $userPoster->create_time = time();
//        $userPoster->audit_status = 0;  // 初始状态为未审核

            $userPoster = UserPoster::create([
                'user_id' => $this->userId,
                'date' => $date,
                'poster_images' => $images,
                'audit_status' => 0,
                'create_time' => time(),
            ]);

//        if (!$userPoster->save()) {
//            return $this->fail('保存失败');
//        }

            return $this->data(['id' => $userPoster->id]);
        } catch (\Exception $e) {
            return $this->fail($e->getMessage());
        } catch (\Throwable $e) {
            return $this->fail('系统错误');
        }
    }

    public function shareList()
    {
        return $this->dataLists(new UserPosterLists());
    }



}