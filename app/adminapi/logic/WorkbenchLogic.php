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

namespace app\adminapi\logic;


use app\common\logic\BaseLogic;
use app\common\service\ConfigService;
use app\common\service\FileService;
use app\common\model\OceanCard;
use app\common\model\OceanCardOrder;
use app\common\model\user\User;

/**
 * 工作台
 * Class WorkbenchLogic
 * @package app\adminapi\logic
 */
class WorkbenchLogic extends BaseLogic
{
    /**
     * @notes 工作套
     * @param $adminInfo
     * @return array
     * @author 段誉
     * @date 2021/12/29 15:58
     */
    public static function index()
    {
        return [
            // 版本信息
            'version' => self::versionInfo(),
            // 今日数据
            'today' => self::today(),
            // 常用功能
            'menu' => self::menu(),
            // 近15日访客数
            'visitor' => self::visitor(),
            // 服务支持
            'support' => self::support()
        ];
    }


    /**
     * @notes 常用功能
     * @return array[]
     * @author 段誉
     * @date 2021/12/29 16:40
     */
    public static function menu(): array
    {
        return [
            [
                'name' => '管理员',
                'image' => FileService::getFileUrl(config('project.default_image.menu_admin')),
                'url' => '/permission/admin'
            ],
            [
                'name' => '角色管理',
                'image' => FileService::getFileUrl(config('project.default_image.menu_role')),
                'url' => '/permission/role'
            ],
            // [
            //     'name' => '部门管理',
            //     'image' => FileService::getFileUrl(config('project.default_image.menu_dept')),
            //     'url' => '/organization/department'
            // ],
            // [
            //     'name' => '字典管理',
            //     'image' => FileService::getFileUrl(config('project.default_image.menu_dict')),
            //     'url' => '/dev_tools/dict'
            // ],
            // [
            //     'name' => '代码生成器',
            //     'image' => FileService::getFileUrl(config('project.default_image.menu_generator')),
            //     'url' => '/dev_tools/code'
            // ],
            // [
            //     'name' => '素材中心',
            //     'image' => FileService::getFileUrl(config('project.default_image.menu_file')),
            //     'url' => '/material/index'
            // ],
            [
                'name' => '菜单权限',
                'image' => FileService::getFileUrl(config('project.default_image.menu_auth')),
                'url' => '/permission/menu'
            ],
            // [
            //     'name' => '网站信息',
            //     'image' => FileService::getFileUrl(config('project.default_image.menu_web')),
            //     'url' => '/setting/website/information'
            // ],
        ];
    }


    /**
     * @notes 版本信息
     * @return array
     * @author 段誉
     * @date 2021/12/29 16:08
     */
    public static function versionInfo(): array
    {
        return [
            'version' => config('project.version'),
            'website' => config('project.website.url'),
            'name' => ConfigService::get('website', 'name'),
            'based' => 'vue3.x、ElementUI、MySQL',
            'channel' => [
                'website' => 'https://www.sxf.cn',
                'gitee' => 'https://gitee.com/sxf/sxf_php',
            ]
        ];
    }


    /**
     * @notes 今日数据
     * @return int[]
     * @author 段誉
     * @date 2021/12/29 16:15
     * 用户总数、销售总额、订单总数、销售卡总数
     */
    public static function today(): array
    {
        $res = [];
        $startTime = strtotime('today 00:00:00');
        $endTime = strtotime('today 23:59:59');
        // $date = date('Y-m-d', $startTime);
        
        $res['time'] = date('Y-m-d H:i:s');
        // 总用户数
        $res['total_new_user'] = User::count();
        // 今日新增用户数
        $res['today_new_user'] = User::whereBetween('create_time', [$startTime, $endTime])->count();
        // // 首充人数
        $res['first_recharge_count'] = OceanCardOrder::whereBetween('create_time', [$startTime, $endTime])->where('state', 1)->field('user_id')->distinct(true)->count();
        // 复充人数
        $res['repeat_recharge_count'] = OceanCardOrder::whereBetween('create_time', [$startTime, $endTime])->field('user_id, COUNT(*) as order_count')->group('user_id')->having('order_count >= 2')->count();
        // echo OceanCardOrder::getlastsql();die;
        // 订单总额
        $res['order_total'] = OceanCardOrder::where('state', 1)->sum('price');
        //今日订单总额
        $res['today_order_total'] = OceanCardOrder::whereBetween('create_time', [$startTime, $endTime])->where('state', 1)->sum('price');
        // 订单总数
        $res['order_sum'] = OceanCardOrder::where('state', 1)->count();
        //今日订单总数
        $res['order_num'] = OceanCardOrder::whereBetween('create_time', [$startTime, $endTime])->where('state', 1)->count();
        // 销售卡总数
        $res['total_sales'] = OceanCard::where('state', 1)->count();
        $res['today_sales'] = OceanCard::whereBetween('create_time', [$startTime, $endTime])->where('state', 1)->count();
        return $res;
    }
    

    /**
     * @notes 访问数
     * @return array
     * @author 段誉
     * @date 2021/12/29 16:57
     */
    public static function visitor(): array
    {
        $num = [];
        $date = [];
        for ($i = 0; $i < 15; $i++) {
            $where_start = strtotime("- " . $i . "day");
            $date[] = $day = date('Y/m/d', $where_start);
            
            $startTime = strtotime($day.' 00:00:00');
            $endTime = strtotime($day.' 23:59:59');
            
            $num[$i] = User::whereBetween('create_time', [$startTime, $endTime])->count();;
        }

        return [
            'date' => $date,
            'list' => [
                ['name' => '注册数', 'data' => $num]
            ]
        ];
    }


    /**
     * @notes 服务支持
     * @return array[]
     * @author 段誉
     * @date 2022/7/18 11:18
     */
    public static function support()
    {
        return [
            [
                'image' => FileService::getFileUrl(config('project.default_image.qq_group')),
                'title' => '官方公众号',
                'desc' => '关注官方公众号',
            ],
            [
                'image' => FileService::getFileUrl(config('project.default_image.customer_service')),
                'title' => '添加企业客服微信',
                'desc' => '想了解更多请添加客服',
            ]
        ];
    }

}