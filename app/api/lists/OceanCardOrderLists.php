<?php
namespace app\api\lists;

use app\api\lists\BaseApiDataLists;
use app\common\enum\YesNoEnum;
use app\common\lists\ListsSearchInterface;
use app\common\model\OceanCardOrder;
use app\common\model\article\Article;
use app\common\model\article\ArticleCollect;


/**
 * 礼品卡列表
 * Class ArticleLists
 * @package app\api\lists\article
 */
class OceanCardOrderLists extends BaseApiDataLists implements ListsSearchInterface
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
        $orderRaw = 'create_time desc';
        $sortType = $this->params['sort'] ?? 'default';

        $field = 'id,card_name,price,serial_number,cdk,pay_method,state,create_time';
        $result = OceanCardOrder::field($field)
            ->where($this->queryWhere())
            ->where($this->searchWhere)
            ->orderRaw($orderRaw)
            ->limit($this->limitOffset, $this->limitLength)
            ->select()->toArray();
        if(!empty($result)){
            foreach ($result as &$v){
                $v['card_img'] = 'https://a.yuejie.online/uploads/images/'.$v['price'].'.png';
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
        return OceanCardOrder::where($this->searchWhere)
            ->where($this->queryWhere())
            ->count();
    }
}