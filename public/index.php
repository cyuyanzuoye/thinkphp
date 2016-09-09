<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2015 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
// 定义应用目录
define('APP_PATH', __DIR__ . '/../system/admin/src/');
//定义应用程序的运行的日志文件
define('RUNTIME_PATH', __DIR__ . '/../system/admin/runtime/');

//-------------------非官方定义---------------------
//定义布局文件: 不适用 官方的模板引擎： 需要解析模板又要替换，
define('LAYOUT_PATH', __DIR__ . '/../system/admin/scr/layout/');
//------------------------------------------

// 加载框架引导文件
require __DIR__ . '/../thinkcore/start.php';

$T =  \think\Config::get('url_route_must');
var_dump($T);


