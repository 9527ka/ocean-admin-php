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
namespace app\adminapi\lists\user;

use app\adminapi\lists\BaseAdminDataLists;
use app\common\enum\user\UserTerminalEnum;
use app\common\lists\ListsExcelInterface;
use app\common\model\user\User;
use app\common\model\OceanCardOrder;


/**
 * 用户列表
 * Class UserLists
 * @package app\adminapi\lists\user
 */
class UserLists extends BaseAdminDataLists implements ListsExcelInterface
{

    /**
     * @notes 搜索条件
     * @return array
     * @author 段誉
     * @date 2022/9/22 15:50
     */
    public function setSearch(): array
    {
        return [
            '=' => ['account', 'email', 'mobile', 'serial_number', 'cdk', 'username', 'pay_method'],
            'between_time' => ['create_time'],
        ];
        $allowSearch = ['account', 'email', 'mobile', 'create_time_start', 'create_time_end'];
        return array_intersect(array_keys($this->params), $allowSearch);
    }


    /**
     * @notes 获取用户列表
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @author 段誉
     * @date 2022/9/22 15:50
     */
    public function lists(): array
    {
        if(!empty($_GET['user_id'])){
            $uid = $_GET['user_id'];
            $orderRaw = 'create_time desc';
            $field = 'account,parent_id,create_time';
            $lists = User::field($field)
                ->where('parent_id', $uid)
                ->whereOr('parent_2_id', $uid)
                ->orderRaw($orderRaw)
                ->limit($this->limitOffset, $this->limitLength)
                ->select()->toArray();
            // echo User::getlastsql();die;
            if(!empty($lists)){
                foreach ($lists as $k => &$v){
                    $v['level'] = $v['parent_id'] == $uid ? '一级':'二级';
                }
            }
            return $lists;
        }
        
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
        $field = "id,sn,nickname,email,real_name,points,icode,sex,avatar,account,mobile,channel,create_time,parent_id,login_device,login_ip";
        $lists = User::where($map)
            ->limit($this->limitOffset, $this->limitLength)
            ->field($field)
            ->order('id desc')
            ->select()->toArray();

        foreach ($lists as &$item) {
            $item['parent_account'] = User::where('id',$item['parent_id'])->value('account');
            $map = ['user_id'=>$item['id'],'state'=>1];
            $item['order_total'] = OceanCardOrder::where($map)->sum('price');
            $item['order_count'] = OceanCardOrder::where($map)->count();
        }

        return $lists;
    }


    /**
     * @notes 获取数量
     * @return int
     * @author 段誉
     * @date 2022/9/22 15:51
     */
    public function count(): int
    {
        if(!empty($_GET['user_id'])){
            $uid = $_GET['user_id'];
            return User::where('parent_id', $uid)->whereOr('parent_2_id', $uid)->count();
        }
        return User::where($this->searchWhere)->count();
    }


    /**
     * @notes 导出文件名
     * @return string
     * @author 段誉
     * @date 2022/11/24 16:17
     */
    public function setFileName(): string
    {
        return '用户列表';
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
            'sn' => '用户编号',
            'nickname' => '用户昵称',
            'account' => '账号',
            'mobile' => '手机号码',
            'channel' => '注册来源',
            'create_time' => '注册时间',
        ];
    }

}