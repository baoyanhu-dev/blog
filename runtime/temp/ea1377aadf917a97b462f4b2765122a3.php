<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\phpStudy\WWW\majiang/application/admin\view\index\index.html";i:1577257843;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>云信科技后台管理系统</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Access-Control-Allow-Origin" content="*">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="__FONT__/css/font-awesome.min.css" media="all"/>
	<link rel="stylesheet" href="__LAY__/css/layui.css" media="all" />
	<link rel="stylesheet" href="__CSS__/index.css" media="all" />
</head>
<body class="main_body">
	<div class="layui-layout layui-layout-admin">
		<!-- 顶部 -->
		<div class="layui-header header">
			<div class="layui-main mag0">
				<a href="javascript:;" class="logo"><?php echo $getSystemInfo['tpCitrixPro']; ?></a>
				<!-- 显示/隐藏菜单 -->
				<a href="javascript:;" class="seraph hideMenu fa fa-align-left"></a>
				<!-- 顶级菜单 -->
				<ul class="layui-nav mobileTopLevelMenus" mobile>
					<li class="layui-nav-item" data-menu="<?php echo $getShowTopList['0']['alias']; ?>">
						<a href="javascript:;">
							<i class="seraph icon-caidan"></i>
							<cite><?php echo $getSystemInfo['tpCitrixPro']; ?></cite>
						</a>
						<dl class="layui-nav-child">
							<?php if(is_array($getShowTopList) || $getShowTopList instanceof \think\Collection): $i = 0; $__LIST__ = $getShowTopList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<dd class="layui-this" data-menu="<?php echo $vo['alias']; ?>">
								<a href="javascript:;">
									<i class="layui-icon" data-icon="<?php echo $vo['icon']; ?>"><?php echo $vo['icon']; ?></i>
									<cite><?php echo $vo['name']; ?></cite>
								</a>
							</dd>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</dl>
					</li>
				</ul>
				<ul class="layui-nav topLevelMenus" pc>
					<?php if(is_array($getShowTopList) || $getShowTopList instanceof \think\Collection): $k1 = 0; $__LIST__ = $getShowTopList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k1 % 2 );++$k1;?>
					<li class="layui-nav-item layui-this" data-menu="<?php echo $vo['alias']; ?>" <?php if($k1 != 1): ?>pc<?php endif; ?>>
						<a href="javascript:;">
							<i class="layui-icon" data-icon="<?php echo $vo['icon']; ?>"><?php echo $vo['icon']; ?></i>
							<cite><?php echo $vo['name']; ?></cite>
						</a>
					</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			    <!-- 顶部右侧菜单 -->
			    <ul class="layui-nav top_menu">
					<li class="layui-nav-item" pc>
						<a href="javascript:;" class="clearCache">
							<i class="layui-icon" data-icon="&#xe640;">&#xe640;</i>
							<cite>清除缓存</cite>
							<span class="layui-badge-dot"></span>
						</a>
					</li>
					<li class="layui-nav-item lockcms" pc>
						<a href="javascript:;">
							<i class="seraph icon-lock"></i>
							<cite>锁屏</cite>
						</a>
					</li>
					<li class="layui-nav-item" id="userInfo">
						<a href="javascript:;">
							<img src="__IMG__/face.jpg" class="layui-nav-img userAvatar" width="35" height="35">
							<cite class="adminName"><?php echo $getSystemInfo['nickname']; ?></cite>
						</a>
						<dl class="layui-nav-child">
							<dd pc>
								<a href="javascript:;" class="changeSkin">
									<i class="layui-icon">&#xe61b;</i>
									<cite>更换皮肤</cite>
								</a>
							</dd>
							<dd>
								<a href="<?php echo url('admin/common/logout'); ?>" class="signOut">
									<i class="seraph icon-tuichu"></i>
									<cite>退出</cite>
								</a>
							</dd>
						</dl>
					</li>
				</ul>
			</div>
		</div>
		<!-- 左侧导航 -->
		<div class="layui-side layui-bg-black">
			<div class="user-photo">
				<a class="img" title="我的头像" >
					<img src="__IMG__/face.jpg" class="userAvatar">
				</a>
				<p>
					你好！<span class="userName"><?php echo $getSystemInfo['nickname']; ?></span>, 欢迎登录
				</p>
			</div>
			<div class="navBar layui-side-scroll" id="navBar">
				<ul class="layui-nav layui-nav-tree">
					<li class="layui-nav-item layui-this">
						<a href="javascript:;" data-url="<?php echo url('admin/index/index'); ?>">
							<i class="layui-icon"></i>
							<cite>后台首页</cite>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- 右侧内容 -->
		<div class="layui-body layui-form">
			<div class="layui-tab mag0" lay-filter="bodyTab" id="top_tabs_box">
				<ul class="layui-tab-title top_tab" id="top_tabs">
					<li class="layui-this" lay-id="">
						<i class="layui-icon">&#xe68e;</i> 
						<cite>后台首页</cite>
					</li>
				</ul>
				<ul class="layui-nav closeBox">
				  <li class="layui-nav-item">
				    <a href="javascript:;">
				    	<i class="fa fa-dot-circle-o"></i> 页面操作
				    </a>
				    <dl class="layui-nav-child">
					  	<dd>
					  		<a href="javascript:;" class="refresh refreshThis">
					  			<i class="fa fa-spinner"></i> 刷新当前
					  		</a>
					  	</dd>
				      	<dd>
				      		<a href="javascript:;" class="closePageOther">
				      			<i class="fa fa-close"></i> 关闭其他
				      		</a>
			      		</dd>
				      	<dd>
				      		<a href="javascript:;" class="closePageAll">
				      			<i class="fa fa-window-close-o"></i> 关闭全部
				      		</a>
			      		</dd>
				    </dl>
				  </li>
				</ul>
				<div class="layui-tab-content clildFrame">
					<div class="layui-tab-item layui-show" style="padding-top: 10px;">
						<iframe src="<?php echo url('admin/index/indexMain'); ?>"></iframe>
					</div>
				</div>
			</div>
		</div>
		<!-- 底部 -->
		<div class="layui-footer footer">
			<p>
				<span>copyright @2020 云信科技 苏ICP备178147880号</span>　　
			</p>
		</div>
	</div>
	<!-- 移动导航 -->
	<div class="site-tree-mobile"><i class="layui-icon">&#xe602;</i></div>
	<div class="site-mobile-shade"></div>
	<script type="text/javascript" src="__LAY__/layui.js"></script>
	<script type="text/javascript" src="__JS__/index.js"></script>
	<script type="text/javascript" src="__JS__/cache.js"></script>
</body>
</html>