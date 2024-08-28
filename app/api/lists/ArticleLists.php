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

namespace app\api\lists;

use app\api\lists\BaseApiDataLists;
use app\common\enum\YesNoEnum;
use app\common\lists\ListsSearchInterface;
use app\common\model\article\Article;
use app\common\model\article\ArticleCollect;


/**
 * 文章列表
 * Class ArticleLists
 * @package app\api\lists\article
 */
class ArticleLists extends BaseApiDataLists implements ListsSearchInterface
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
        $where[] = ['is_show', '=', 1];
        if (!empty($this->params['keyword'])) {
//            $where[] = ['title', 'like', '%' . $this->params['keyword'] . '%'];
        }
        return $where;
    }


    /**
     * @notes 获取文章列表
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @author 段誉
     * @date 2022/9/16 18:55
     */
    public function lists(): array
    {
        $act = $this->request->get('act/s');
        $lang = $this->request->get('lang/s');
        
//        $orderRaw = 'sort desc, id desc';
        $orderRaw = 'date desc';
//        $sortType = $this->params['sort'] ?? 'default';
//        // 最新排序
//        if ($sortType == 'new') {
//            $orderRaw = 'id desc';
//        }
//        // 最热排序
//        if ($sortType == 'hot') {
//            $orderRaw = 'click_actual + click_virtual desc, id desc';
//        }

        $field = 'id,title,desc,theme,is_quality,date,image';
        if($act == 'home'){
            $result = Article::field($field)
                ->where('language', $lang)
                ->where($this->queryWhere())
                ->where($this->searchWhere)
                ->orderRaw($orderRaw)
                ->limit(6)
                ->select()->toArray();
        }else{
            $result = Article::field($field)
                ->where('language', $lang)
                ->where($this->queryWhere())
                ->where($this->searchWhere)
                ->orderRaw($orderRaw)
                ->limit($this->limitOffset, $this->limitLength)
                ->select()->toArray();
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
        return Article::where($this->searchWhere)
            ->where($this->queryWhere())
            ->count();
    }
}