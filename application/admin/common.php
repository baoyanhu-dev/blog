<?php

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------


/**
 * [aGetParam 返回拆分结果]
 * @param  [type] $param [字符串，link_1_2]
 * @return [type]        [2]
 */
function aGetParam($param)
{
	$res = explode('_', $param);
	return $res[2];
}
/**
 * [aExplodeParam 拆分参数]
 * @param  [type] $param [description]
 * @return [type]        [description]
 */
function aExplodeParam($param)
{
	$res = explode('_', $param);
	return $res[0]."[{$res[1]}]"."[{$res[2]}]";
}

?>