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
use app\common\model\UserPosters;
use app\common\lists\ListsSearchInterface;


/**
 * UserPosters列表
 * Class UserPostersLists
 * @package app\adminapi\lists
 */
class UserPostersLists extends BaseAdminDataLists implements ListsSearchInterface
{


    /**
     * @notes 设置搜索条件
     * @return \string[][]
     * @author likeadmin
     * @date 2024/08/15 16:53
     */
    public function setSearch(): array
    {
        return [
            '=' => ['user_id', 'audit_status'],
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
     * @date 2024/08/15 16:53
     */
    public function lists(): array
    {
        $list = UserPosters::alias('up')
            ->join('user u', 'u.id = up.user_id')
            ->where($this->searchWhere)
            ->field(['up.*', 'u.account'])
            ->limit($this->limitOffset, $this->limitLength)
            ->order(['id' => 'desc'])
            ->select()
            ->toArray();
        
        // if(!empty($list)){
        //     foreach($list as &$v){
        //         $poster_images = '';
        //         $arr = json_decode($v['poster_images']);
        //         if(!empty($arr)){
        //             foreach ($arr as $img){
        //                 $poster_images .= '<el-image :src="'.$img.'" :preview-src-list="previewList" class="image"style="width: 50px;"></el-image>';
        //             }
        //         }
        //         $v['poster_images'] = $poster_images;
        //     }
        // }
        return $list;
    }


    /**
     * @notes 获取数量
     * @return int
     * @author likeadmin
     * @date 2024/08/15 16:53
     */
    public function count(): int
    {
        return UserPosters::where($this->searchWhere)->count();
    }

}