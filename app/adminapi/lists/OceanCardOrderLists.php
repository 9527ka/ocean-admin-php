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
use app\common\lists\ListsExcelInterface;


/**
 * OceanCardOrder列表
 * Class OceanCardOrderLists
 * @package app\adminapi\lists
 */
class OceanCardOrderLists extends BaseAdminDataLists implements ListsExcelInterface
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
        $p = $this->params;
        if($p['serial_number']){
            $p['serial_number'] = str_replace(' ', '', $p['serial_number']);
        }
        
        unset($p['page_size']);
        unset($p['page_no']);
        $arr = filtered_array($p);
        $map = [];
        foreach ($arr as $v){
            if(in_array('start_time',$v)){
                array_push($map,['create_time','between',[strtotime($p['start_time']),strtotime($p['end_time'])]]);
                continue;
            }
            if(in_array('end_time',$v)) continue;
            if(in_array('page_type',$v)) continue;
            if(in_array('page_start',$v)) continue;
            if(in_array('page_end',$v)) continue;
            if(in_array('file_name',$v)) continue;
            if(in_array('export',$v)) continue;
            
            array_push($map,$v);
        }
        $list = OceanCardOrder::where($map)
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
        $p = $this->params;
        if($p['serial_number']){
            $p['serial_number'] = str_replace(' ', '', $p['serial_number']);
        }
        
        unset($p['page_size']);
        unset($p['page_no']);
        $arr = filtered_array($p);
        $map = [];
        foreach ($arr as $v){
            if(in_array('start_time',$v)){
                array_push($map,['create_time','between',[strtotime($p['start_time']),strtotime($p['end_time'])]]);
                continue;
            }
            if(in_array('end_time',$v)) continue;
            if(in_array('page_type',$v)) continue;
            if(in_array('page_start',$v)) continue;
            if(in_array('page_end',$v)) continue;
            if(in_array('file_name',$v)) continue;
            if(in_array('export',$v)) continue;
            
            array_push($map,$v);
        }
        return OceanCardOrder::where($map)->count();
    }
    /**
     * @notes 导出文件名
     * @return string
     * @author 段誉
     * @date 2022/11/24 16:17
     */
    public function setFileName(): string
    {
        return '订单列表';
    }
    
    /**
     * @notes 导出字段
     * @return string[]
     * @author 段誉
     * @date 2022/11/24 16:17
     */
    public function setExcelFields(): array
    {
        return [
            'card_name' => '卡名称',
            'price' => '卡面值',
            'order_price' => '金额(USD)',
            'serial_number' => '卡号',
            'cdk' => '激活码',
            'account' => '用户',
            'pay_hash' => '支付哈希',
            'cdk' => '激活码',
            'state' => '状态',
            'create_time' => '创建时间'
        ];
    }

}