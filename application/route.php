<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

Route::get('api/:ver/time', 'api/:ver.time/index');
Route::get('api/:ver/cat', 'api/:ver.cat/read');
Route::get('api/:ver/index', 'api/:ver.index/index');

Route::resource('test','api/test');

Route::resource('api/:ver/news', 'api/:ver.news');