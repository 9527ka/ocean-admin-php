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

namespace app\common\model;


use app\common\model\BaseModel;



/**
 * UserPoster模型
 * Class Article
 * @package app\common\model
 */
class UserPoster extends BaseModel
{
    protected $name = 'user_posters';

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = true;

    // 指定字段类型
//    protected $type = [
//        '_id'             => 'string',
//        'user_id'         => 'integer',
//        'poster_images'   => 'array',
//        'audit_status'    => 'integer',
//        'create_time'     => 'timestamp',
//        'audit_time'      => 'timestamp',
//    ];
    
}