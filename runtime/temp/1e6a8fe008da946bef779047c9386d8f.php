<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"/www/users/HA611975/WEB/application/admin/view/index/indexmain.html";i:1577263063;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>科技后台管理系统</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="__FONT__/css/font-awesome.min.css" media="all"/>
	<link rel="stylesheet" href="__LAY__/css/layui.css" media="all" />
	<link rel="stylesheet" href="__CSS__/public.css" media="all" />
</head>
<body class="childrenBody">
	<blockquote class="layui-elem-quote layui-bg-green">
		亲爱的<?php echo $getSystemInfo['nickname']; ?>,下午好！
	</blockquote>
	<div class="layui-row layui-col-space10 panel_box">
		<div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
			<a href="javascript:;" data-url="">
				<div class="panel_icon layui-bg-orange">
					<i class="layui-anim seraph fa fa-user-circle-o"></i>
				</div>
				<div class="panel_word userAll">
					<span><?php echo $getSystemInfo['nickname']; ?></span>
					<cite>用户昵称</cite>
				</div>
			</a>
		</div>
		<div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
			<a href="javascript:;" data-url="" target="_blank">
				<div class="panel_icon layui-bg-green">
					<i class="layui-anim seraph fa fa-eercast" ></i>
				</div>
				<div class="panel_word">
					<span><?php echo $getSystemInfo['jurisdictionName']; ?></span>
					<cite>角色权限</cite>
				</div>
			</a>
		</div>
		<div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
			<a href="javascript:;" data-url="" target="_blank">
				<div class="panel_icon layui-bg-black">
					<i class="layui-anim seraph fa fa-ravelry"></i>
				</div>
				<div class="panel_word">
					<span><?php echo $getSystemInfo['loginSum']; ?></span>
					<cite>登录次数</cite>
				</div>
			</a>
		</div>
		<div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
			<a href="javascript:;" data-url="" target="_blank">
				<div class="panel_icon layui-bg-red">
					<i class="layui-anim seraph fa fa-telegram"></i>
				</div>
				<div class="panel_word">
					<span><?php echo $getSystemInfo['loginIp']; ?></span>
					<cite>登录ip</cite>
				</div>
			</a>
		</div>
		<div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
			<a href="javascript:;">
				<div class="panel_icon layui-bg-blue">
					<i class="layui-anim seraph fa fa-wpforms"></i>
				</div>
				<div class="panel_word">
					<span class="loginTime"><?php echo $getSystemInfo['loginTime']; ?></span>
					<cite>登录时间</cite>
				</div>
			</a>
		</div>
	</div>
	<div class="layui-row layui-col-space10">
		<div class="layui-col-md12">
			<blockquote class="layui-elem-quote title">系统基本参数</blockquote>
			<table class="layui-table magt0">
				<colgroup>
					<col width="150">
					<col>
				</colgroup>
				<tbody>
				<tr>
					<td>会员昵称</td>
					<td><?php echo $getSystemInfo['nickname']; ?></td>
				</tr>
				<tr>
					<td>角色权限</td>
					<td><?php echo $getSystemInfo['jurisdictionName']; ?></td>
				</tr>
				<tr>
					<td>登录次数</td>
					<td>共<?php echo $getSystemInfo['loginSum']; ?>次</td>
				</tr>
				<tr>
					<td>登录ip</td>
					<td><?php echo $getSystemInfo['loginIp']; ?></td>
				</tr>
				<tr>
					<td>登录时间</td>
					<td><?php echo $getSystemInfo['loginTime']; ?></td>
				</tr>
				<tr>
					<td>当前版本</td>
					<td><?php echo $getSystemInfo['tpCitrixPro']; ?></td>
				</tr>
				<tr>
					<td>开发作者</td>
					<td><?php echo $getSystemInfo['tpCitrix']; ?></td>
				</tr>
				<tr>
					<td>网站首页</td>
					<td><?php echo $getSystemInfo['web']; ?></td>
				</tr>
				<tr>
					<td>php版本</td>
					<td><?php echo $getSystemInfo['php']; ?></td>
				</tr>
				<tr>
					<td>操作系统</td>
					<td><?php echo $getSystemInfo['win']; ?></td>
				</tr>
				<tr>
					<td>最大上传限制</td>
					<td><?php echo $getSystemInfo['upload_size']; ?></td>
				</tr>
				<tr>
					<td>剩余空间大小</td>
					<td><?php echo $getSystemInfo['disk']; ?></td>
				</tr>
				<tr>
					<td>Zend版本</td>
					<td><?php echo $getSystemInfo['zend']; ?></td>
				</tr>
				<tr>
					<td>服务器解译引擎</td>
					<td><?php echo $getSystemInfo['sof']; ?></td>
				</tr>
				<tr>
					<td>端口</td>
					<td>:<?php echo $getSystemInfo['port']; ?></td>
				</tr>
				</tbody>
			</table>
			<table class="layui-table mag0" lay-skin="line">
				<colgroup>
					<col>
					<col width="110">
				</colgroup>
				<tbody class="hot_news"></tbody>
			</table>
		</div>
	</div>
	<script type="text/javascript" src="__LAY__/layui.js"></script>
</body>
</html>