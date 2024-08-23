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

namespace app\adminapi\logic\setting;


use app\common\model\SystemSetting;
use app\common\logic\BaseLogic;
use think\facade\Db;


/**
 * SystemSetting逻辑
 * Class SystemSettingLogic
 * @package app\adminapi\logic
 */
class SystemSettingLogic extends BaseLogic
{


    /**
     * @notes 添加
     * @param array $params
     * @return bool
     * @author likeadmin
     * @date 2024/08/14 23:45
     */
    public static function add(array $params): bool
    {
        Db::startTrans();
        try {
            SystemSetting::create([
                'remark' => $params['remark'],
                'version_no' => $params['version_no'],
                'multi_language' => $params['multi_language'],
                'language' => $params['language'],
                'key' => $params['key'],
                'value' => $params['value'],
                'status' => $params['status']
            ]);

            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
            self::setError($e->getMessage());
            return false;
        }
    }


    /**
     * @notes 编辑
     * @param array $params
     * @return bool
     * @author likeadmin
     * @date 2024/08/14 23:45
     */
    public static function edit(array $params): bool
    {
        Db::startTrans();
        try {
            SystemSetting::where('id', $params['id'])->update([
                'version_no' => $params['version_no'],
                'multi_language' => $params['multi_language'],
                'language' => $params['language'],
                'key' => $params['key'],
                'value' => $params['value'],
                'status' => $params['status'],
                'remark' => $params['remark'],
            ]);

            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
            self::setError($e->getMessage());
            return false;
        }
    }


    /**
     * @notes 删除
     * @param array $params
     * @return bool
     * @author likeadmin
     * @date 2024/08/14 23:45
     */
    public static function delete(array $params): bool
    {
        return SystemSetting::destroy($params['id']);
    }


    /**
     * @notes 获取详情
     * @param $params
     * @return array
     * @author likeadmin
     * @date 2024/08/14 23:45
     */
    public static function detail($params): array
    {
        return SystemSetting::findOrEmpty($params['id'])->toArray();
    }
}