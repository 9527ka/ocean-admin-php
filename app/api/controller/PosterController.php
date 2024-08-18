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
use app\common\model\TestData;
use app\common\model\user\User;
use app\common\model\UserPoster;
use think\facade\Lang;

/**
 * 海报控制器
 * Class PosterController
 * @package app\api\controller
 */
class PosterController extends BaseApiController
{
    public array $notNeedLogin = ['resetPassword', 'testMongodb'];

    public function saveSharePoster()
    {
        try {
            $params = (new PosterValidate())->post()->goCheck();
            $images = json_encode($params['images'], JSON_UNESCAPED_UNICODE);
            $date = date('Y-m-d');

//        halt(config('database.mongo'));

            $posterInfo = UserPoster::where('date', $date)->where('user_id', $this->userId)->findOrEmpty();
            if (!$posterInfo->isEmpty()) {
                throw new \Exception(Lang::get('has_shared'));
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

    public function testMongodb()
    {
        $userInfo = User::where('id', 16)->findOrEmpty();
halt($userInfo);

        $date = date('Y-m-d');
            // 分页查询
    // $posters = TestData::paginate([
    //     'page'  => 1,
    //     'list_rows' => 10
    // ]);

    // return json(['status' => 'success', 'data' => $posters]);
        
        
        TestData::create([
            'user_id'       => $this->userId,
            'poster_images' => ['image1.jpg', 'image2.jpg'],
            'date'          => $date,
            'create_time'   => time(),
            'audit_status'  => 0
        ]);
        

    }

    public function shareList()
    {
        return $this->dataLists(new UserPosterLists());
    }



}