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
use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});

Route::get('hello/:name', 'index/hello');

// 分类列表模块
Route::resource('typelist', 'Typelist');

Route::get('typelist', 'Typelist/index');

Route::post('typelist', 'Typelist/save');

Route::put('typelist', 'Typelist/update');

Route::delete('typelist', 'Typelist/delete');


// 用户模块
Route::resource('user', 'User');

Route::get('user', 'User/index');

Route::post('user', 'User/save');

Route::put('user', 'User/update');

Route::delete('user', 'User/delete');