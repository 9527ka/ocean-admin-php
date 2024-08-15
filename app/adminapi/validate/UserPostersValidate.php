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

namespace app\adminapi\validate;


use app\common\validate\BaseValidate;


/**
 * UserPosters验证器
 * Class UserPostersValidate
 * @package app\adminapi\validate
 */
class UserPostersValidate extends BaseValidate
{

     /**
      * 设置校验规则
      * @var string[]
      */
    protected $rule = [
        'id' => 'require',
        'user_id' => 'require',
        'audit_status' => 'require',
        'poster_images' => 'require',
        'date' => 'require',
    ];


    /**
     * 参数描述
     * @var string[]
     */
    protected $field = [
        'id' => 'id',
        'user_id' => '用户id',
        'audit_status' => '审核状态',
        'poster_images' => '图片列表',
        'date' => '分享日期',
    ];

    public function sceneCheck()
    {
        return $this->only(['id','audit_status']);
    }
    /**
     * @notes 添加场景
     * @return UserPostersValidate
     * @author likeadmin
     * @date 2024/08/15 16:53
     */
    public function sceneAdd()
    {
        return $this->only(['user_id','audit_status','poster_images','date']);
    }


    /**
     * @notes 编辑场景
     * @return UserPostersValidate
     * @author likeadmin
     * @date 2024/08/15 16:53
     */
    public function sceneEdit()
    {
        return $this->only(['id','user_id','audit_status','poster_images','date']);
    }


    /**
     * @notes 删除场景
     * @return UserPostersValidate
     * @author likeadmin
     * @date 2024/08/15 16:53
     */
    public function sceneDelete()
    {
        return $this->only(['id']);
    }


    /**
     * @notes 详情场景
     * @return UserPostersValidate
     * @author likeadmin
     * @date 2024/08/15 16:53
     */
    public function sceneDetail()
    {
        return $this->only(['id']);
    }

}