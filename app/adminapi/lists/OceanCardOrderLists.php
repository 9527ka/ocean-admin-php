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

namespace app\adminapi\lists;


use app\adminapi\lists\BaseAdminDataLists;
use app\common\model\OceanCardOrder;
use app\common\lists\ListsSearchInterface;


/**
 * OceanCardOrder列表
 * Class OceanCardOrderLists
 * @package app\adminapi\lists
 */
class OceanCardOrderLists extends BaseAdminDataLists implements ListsSearchInterface
{


    /**
     * @notes 设置搜索条件
     * @return \string[][]
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function setSearch(): array
    {
        return [
            '=' => ['card_name', 'price', 'state', 'serial_number', 'cdk', 'account', 'pay_method'],
            'between_time' => ['create_time'],
        ];
    }


    /**
     * @notes 获取列表
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function lists(): array
    {
        $list = OceanCardOrder::where($this->searchWhere)
            ->field(['id', 'card_id', 'card_name', 'price', 'order_price', 'state', 'serial_number', 'cdk', 'account', 'user_id', 'pay_method', 'pay_img','pay_hash', 'create_time'])
            ->limit($this->limitOffset, $this->limitLength)
            ->order(['id' => 'desc'])
            ->select()
            ->toArray();
        if(!empty($list)){
            foreach ($list as &$v){
                $v['serial_number'] = format_card_number($v['serial_number']);
            }
        }
        return $list;
    }


    /**
     * @notes 获取数量
     * @return int
     * @author likeadmin
     * @date 2024/08/12 15:30
     */
    public function count(): int
    {
        return OceanCardOrder::where($this->searchWhere)->count();
    }

}