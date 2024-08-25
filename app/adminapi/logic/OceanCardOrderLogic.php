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

namespace app\adminapi\logic;


use app\common\model\OceanCardOrder;
use app\common\logic\BaseLogic;
use app\common\model\user\User;
use think\facade\Db;
use think\facade\Lang;


/**
 * OceanCardOrder逻辑
 * Class OceanCardOrderLogic
 * @package app\adminapi\logic
 */
class OceanCardOrderLogic extends BaseLogic
{
    public static function check(array $params): bool
    {
        Db::startTrans();
        try {
            $orderInfo = OceanCardOrder::where('id', $params['id'])->findOrEmpty();
            if ($orderInfo->isEmpty()) {
                throw new \Exception(Lang::get('订单数据不存在'));
            }
            if ($orderInfo->state != 0) {
                throw new \Exception(Lang::get('当前订单数据已经审核操作过了，无需审核操作'));
            }

            OceanCardOrder::where('id', $params['id'])->update(['state' => $params['state']]);

            // 审核通过 - 给下单用户的上级新增积分 [目前统一加1个积分] @todo 后续做成配置项
            // 每个月 要完成购买满24次才给上级新增积分
            if ($params['state'] == 1) {
                // $startOfMonth = strtotime(date('Y-m-01 00:00:00')); // 月初
                // $endOfMonth = strtotime(date('Y-m-t 23:59:59'));    // 月末
                // $allCount = OceanCardOrder::whereBetweenTime('create_time',$startOfMonth,$endOfMonth)->where('state',1)->count();
                //算上当前这次将要通过审核的
                // if($allCount>=23){
                    $parent_id = User::where('id', $orderInfo->user_id)->value('parent_id');
                    if ($parent_id) {
                        User::where('id', $parent_id)->inc('points', 1)->update();
                    }
                // }
            }

            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
            self::setError($e->getMessage());
            return false;
        }
    }
    /**
     * @notes 添加
     * @param array $params
     * @return bool
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public static function add(array $params): bool
    {
        Db::startTrans();
        try {
            OceanCardOrder::create([

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
     * @date 2024/08/12 15:30
     */
    public static function edit(array $params): bool
    {
        Db::startTrans();
        try {
            OceanCardOrder::where('id', $params['id'])->update([

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
     * @date 2024/08/12 15:30
     */
    public static function delete(array $params): bool
    {
        return OceanCardOrder::destroy($params['id']);
    }


    /**
     * @notes 获取详情
     * @param $params
     * @return array
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public static function detail($params): array
    {
        return OceanCardOrder::findOrEmpty($params['id'])->toArray();
    }
}