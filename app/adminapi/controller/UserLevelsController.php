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


namespace app\adminapi\controller;


use app\adminapi\controller\BaseAdminController;
use app\adminapi\lists\UserLevelsLists;
use app\adminapi\logic\UserLevelsLogic;
use app\adminapi\validate\UserLevelsValidate;


/**
 * UserLevels控制器
 * Class UserLevelsController
 * @package app\adminapi\controller
 */
class UserLevelsController extends BaseAdminController
{


    /**
     * @notes 获取列表
     * @return \think\response\Json
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function lists()
    {
        return $this->dataLists(new UserLevelsLists());
    }


    /**
     * @notes 添加
     * @return \think\response\Json
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function add()
    {
        $params = (new UserLevelsValidate())->post()->goCheck('add');
        $result = UserLevelsLogic::add($params);
        if (true === $result) {
            return $this->success('添加成功', [], 1, 1);
        }
        return $this->fail(UserLevelsLogic::getError());
    }


    /**
     * @notes 编辑
     * @return \think\response\Json
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function edit()
    {
        $params = (new UserLevelsValidate())->post()->goCheck('edit');
        $result = UserLevelsLogic::edit($params);
        if (true === $result) {
            return $this->success('编辑成功', [], 1, 1);
        }
        return $this->fail(UserLevelsLogic::getError());
    }


    /**
     * @notes 删除
     * @return \think\response\Json
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function delete()
    {
        $params = (new UserLevelsValidate())->post()->goCheck('delete');
        UserLevelsLogic::delete($params);
        return $this->success('删除成功', [], 1, 1);
    }


    /**
     * @notes 获取详情
     * @return \think\response\Json
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function detail()
    {
        $params = (new UserLevelsValidate())->goCheck('detail');
        $result = UserLevelsLogic::detail($params);
        return $this->data($result);
    }


}