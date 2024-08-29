<?php
// +----------------------------------------------------------------------
// | 多语言设置
// +----------------------------------------------------------------------

return [
    // 默认语言
    'default_lang'    => env('lang.default_lang', 'en-us'),
    // 允许的语言列表：英语、法语、越南语、印地语、日语、韩语、泰国语、印尼语
    'allow_lang_list' => [
        'zh-cn',
        'en-us',
        'fa-fa',//法语
        'ti-ti',//越南语
        'hd-hd',//印地语
        'ja-ja',//日语
        'ko-ko',//韩语
        'ta-ta',//泰国语
        'in-in',//印尼语
    ],
    // 多语言自动侦测变量名
    'detect_var'      => 'lang',
    // 是否使用Cookie记录
    'use_cookie'      => true,
    // 多语言cookie变量
    'cookie_var'      => 'think_lang',
    // 多语言header变量
    'header_var'      => 'think-lang',
    // 扩展语言包
    'extend_list'     => [],
    // Accept-Language转义为对应语言包名称
    'accept_language' => [
        'zh-hans-cn' => 'zh-cn',
    ],
    // 是否支持语言分组
    'allow_group'     => false,
];
