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
 * OceanCardOrder验证器
 * Class OceanCardOrderValidate
 * @package app\adminapi\validate
 */
class OceanCardOrderValidate extends BaseValidate
{

     /**
      * 设置校验规则
      * @var string[]
      */
    protected $rule = [
        'id' => 'require',
        'card_id' => 'require',
        'card_name' => 'require',
        'price' => 'require',
        'state' => 'require',
        'serial_number' => 'require',
        'cdk' => 'require',
        'username' => 'require',
        'user_id' => 'require',
        'pay_method' => 'require',
        'pay_img' => 'require',
        'create_time' => 'require',
    ];


    /**
     * 参数描述
     * @var string[]
     */
    protected $field = [
        'id' => 'id',
        'card_id' => '卡id',
        'card_name' => '卡名称',
        'price' => '面值',
        'state' => '状态',
        'serial_number' => '序列号',
        'cdk' => '兑换码',
        'username' => '用户名',
        'user_id' => '用户ID',
        'pay_method' => '支付方式',
        'pay_img' => '支付截图',
        'create_time' => '创建时间',
    ];


    /**
     * @notes 添加场景
     * @return OceanCardOrderValidate
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function sceneAdd()
    {
        return $this->only(['card_id','card_name','price','state','serial_number','cdk','username','user_id','pay_method','pay_img','create_time']);
    }


    /**
     * @notes 编辑场景
     * @return OceanCardOrderValidate
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function sceneEdit()
    {
        return $this->only(['id','card_id','card_name','price','state','serial_number','cdk','username','user_id','pay_method','pay_img','create_time']);
    }


    /**
     * @notes 删除场景
     * @return OceanCardOrderValidate
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function sceneDelete()
    {
        return $this->only(['id']);
    }
    
    public function sceneCheck()
    {
        return $this->only(['id,state']);
    }

    /**
     * @notes 详情场景
     * @return OceanCardOrderValidate
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function sceneDetail()
    {
        return $this->only(['id']);
    }

}