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

namespace app\adminapi\validate\setting;


use app\common\validate\BaseValidate;


/**
 * SystemSetting验证器
 * Class SystemSettingValidate
 * @package app\adminapi\validate
 */
class SystemSettingValidate extends BaseValidate
{

     /**
      * 设置校验规则
      * @var string[]
      */
    protected $rule = [
        'id' => 'require',
        // 'version_no' => 'require',
        // 'multi_language' => 'require',
        // 'language' => 'require',
        'key' => 'require',
        // 'status' => 'require',
    ];


    /**
     * 参数描述
     * @var string[]
     */
    protected $field = [
        'id' => 'id',
        'version_no' => '版本号',
        'multi_language' => '是否支持多语言',
        'language' => '语种',
        'key' => '配置项key',
        'status' => '是否生效',
    ];


    /**
     * @notes 添加场景
     * @return SystemSettingValidate
     * @author likeadmin
     * @date 2024/08/14 23:45
     */
    public function sceneAdd()
    {
        return $this->only(['version_no','multi_language','language','key','status']);
    }


    /**
     * @notes 编辑场景
     * @return SystemSettingValidate
     * @author likeadmin
     * @date 2024/08/14 23:45
     */
    public function sceneEdit()
    {
        return $this->only(['id','version_no','multi_language','language','key','status']);
    }


    /**
     * @notes 删除场景
     * @return SystemSettingValidate
     * @author likeadmin
     * @date 2024/08/14 23:45
     */
    public function sceneDelete()
    {
        return $this->only(['id']);
    }


    /**
     * @notes 详情场景
     * @return SystemSettingValidate
     * @author likeadmin
     * @date 2024/08/14 23:45
     */
    public function sceneDetail()
    {
        return $this->only(['id']);
    }

}