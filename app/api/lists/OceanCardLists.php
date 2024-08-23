<?php
namespace app\api\lists;

use app\api\lists\BaseApiDataLists;
use app\common\enum\YesNoEnum;
use app\common\lists\ListsSearchInterface;
use app\common\model\OceanCard;
use app\common\model\article\Article;
use app\common\model\article\ArticleCollect;
use app\common\model\UserPosters;
use app\common\model\OceanCardOrder;

/**
 * 礼品卡列表
 * Class ArticleLists
 * @package app\api\lists\article
 */
class OceanCardLists extends BaseApiDataLists implements ListsSearchInterface
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
        $where[] = ['state', '=', 0];
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
//        $orderRaw = 'sort desc, id desc';
        $orderRaw = 'price ASC';
        $sortType = $this->params['sort'] ?? 'default';
        // 最新排序
//        if ($sortType == 'new') {
//            $orderRaw = 'id desc';
//        }
//        // 最热排序
//        if ($sortType == 'hot') {
//            $orderRaw = 'click_actual + click_virtual desc, id desc';
//        }

        $field = 'id,name,image,price';
        $result = OceanCard::field($field)
            ->where($this->queryWhere())
            ->where($this->searchWhere)
            ->group('price')
            ->orderRaw($orderRaw)
            ->limit($this->limitOffset, $this->limitLength)
            ->select()->toArray();
        //当日是否有分享审核成功
        $has_share = UserPosters::where(['user_id'=>$this->userId,'audit_status'=>1,'date'=>date('Y-m-d')])->value('id');
        //当日是否已经购买过
        $has_order = OceanCardOrder::where(['user_id'=>$this->userId,'state'=>1,['create_time','>=',strtotime(date('Y-m-d'))]])->value('id');
        // echo OceanCardOrder::getlastsql();die;
        if(!empty($result)){
            foreach ($result as &$v){
                $v['buy'] = 'on';
                if(empty($has_share)) $v['buy'] = 'off';
                if(!empty($has_order)) $v['buy'] = 'buyed';
            }
        }
        return $result;
    }


    /**
     * @return int
     * @author 段誉
     * @date 2022/9/16 18:55
     */
    public function count(): int
    {
        return OceanCard::where($this->searchWhere)
            ->where($this->queryWhere())
            ->count();
    }
}