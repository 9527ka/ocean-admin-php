<?php
namespace app\api\lists;

use app\api\lists\BaseApiDataLists;
use app\common\enum\YesNoEnum;
use app\common\lists\ListsSearchInterface;
use app\common\model\user\User;
use app\common\model\article\Article;
use app\common\model\article\ArticleCollect;


/**
 * 用户列表
 * Class ArticleLists
 * @package app\api\lists\article
 */
class UserLists extends BaseApiDataLists implements ListsSearchInterface
{

    /**
     * @notes 搜索条件
     * @return \string[][]
     * @author 段誉
     * @date 2022/9/16 18:54
     */
    public function setSearch(): array
    {
        return [
//            '=' => ['cid']
        ];
    }


    /**
     * @notes 自定查询条件
     * @return array
     * @author 段誉
     * @date 2022/10/25 16:53
     */
    public function queryWhere()
    {
        $where = [];
        if (!empty($this->params['keyword'])) {
//            $where[] = ['title', 'like', '%' . $this->params['keyword'] . '%'];
        }
        return $where;
    }


    /**
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @author 段誉
     * @date 2022/9/16 18:55
     */
    public function lists(): array
    {
        $orderRaw = 'create_time desc';
        $field = 'account,parent_id,create_time';
        $lists = User::field($field)
            ->where('parent_id', $this->userId)
            ->whereOr('parent_2_id', $this->userId)
            ->orderRaw($orderRaw)
            ->limit($this->limitOffset, $this->limitLength)
            ->select()->toArray();
        // echo User::getlastsql();die;
        if(!empty($lists)){
            foreach ($lists as $k => &$v){
                $v['level'] = $v['parent_id'] == $this->userId ? '1':'2';
                unset($v['parent_id']);
            }
        }
        return $lists;
    }


    /**
     * @return int
     * @author 段誉
     * @date 2022/9/16 18:55
     */
    public function count(): int
    {
        return User::where('parent_id', $this->userId)
            ->whereOr('parent_2_id', $this->userId)
            ->count();
    }
}