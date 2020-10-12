<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


use think\Route;


##路由
Route::any('index','index/index/index');//首页
Route::any('news','index/index/newsList');//新闻中心列表
Route::any('ajaxNewsList','index/index/ajaxNewsList');//ajax新闻中心列表
Route::any('ajaxDataList','index/index/ajaxDataList');//ajax新闻分类分页列表
Route::any('DataList','index/index/DataList');//ajax新闻分类列表
Route::any('cases','index/index/casesList');//客户案例列表
Route::any('ajaxCasesList','index/index/ajaxCasesList');//ajax客户案例列表
Route::any('info','index/index/Info');//详情
Route::any('pageInfo','index/index/pageInfo');//单页面


Route::any('publish','index/index/publish');//需求提交


return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
