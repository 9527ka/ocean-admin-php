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
use app\common\model\OceanCard;
use app\common\lists\ListsSearchInterface;
use app\common\lists\ListsExcelInterface;

/**
 * OceanCard列表
 * Class OceanCardLists
 * @package app\adminapi\lists
 */
// class OceanCardLists extends BaseAdminDataLists implements ListsSearchInterface
class OceanCardLists extends BaseAdminDataLists implements ListsExcelInterface
{


    /**
     * @notes 设置搜索条件
     * @return \string[][]
     * @author likeadmin
     * @date 2024/08/12 16:09
     */
    public function setSearch(): array
    {
        
        return [
            '=' => ['name', 'price', 'state', 'serial_number', 'cdk', 'redemption_state'],
            'between_time' => ['create_time']
        ];
        $allowSearch = ['name', 'price', 'state', 'serial_number', 'cdk', 'redemption_state'];
        return array_intersect(array_keys($this->params), $allowSearch);
    }


    /**
     * @notes 获取列表
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @author likeadmin
     * @date 2024/08/12 16:09
     */
    public function lists(): array
    {
        $p = $this->params;
        
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
        // echo json_encode($map);die;
        $list = OceanCard::where($map)
            ->field(['id', 'name', 'image', 'price', 'state', 'serial_number', 'cdk', 'redemption_state','create_time'])
            ->limit($this->limitOffset, $this->limitLength)
            ->order(['id' => 'desc'])
            ->select()
            ->toArray();
        // echo OceanCard::getlastsql();die;
        return $list;
        
        
        $field = 'id,name,image,price,state,serial_number,cdk,redemption_state';
        $lists = OceanCard::withSearch($this->setSearch(), $this->params)
            ->limit($this->limitOffset, $this->limitLength)
            ->field($field)
            ->order('id desc')
            ->select()->toArray();
        return $lists;
    }


    /**
     * @notes 获取数量
     * @return int
     * @author likeadmin
     * @date 2024/08/12 16:09
     */
    public function count(): int
    {
        return OceanCard::where($this->searchWhere)->count();
        // return OceanCard::withSearch($this->setSearch(), $this->params)->count();
    }
    
    /**
     * @notes 导出文件名
     * @return string
     * @author 段誉
     * @date 2022/11/24 16:17
     */
    public function setFileName(): string
    {
        return '礼品卡列表';
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
            'name' => '标题',
            'price' => '面值',
            'serial_number' => '卡号',
            'cdk' => '激活码',
            'state' => '状态',
            'redemption_state' => '核销状态'
        ];
    }
}