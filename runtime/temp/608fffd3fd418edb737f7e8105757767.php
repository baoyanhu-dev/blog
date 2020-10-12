<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:66:"D:\phpstudy_pro\WWW\tp.com/application/index\view\index\index.html";i:1577339109;s:68:"D:\phpstudy_pro\WWW\tp.com/application/index\view\public\header.html";i:1571726099;s:69:"D:\phpstudy_pro\WWW\tp.com/application/index\view\public\navList.html";i:1571797273;s:68:"D:\phpstudy_pro\WWW\tp.com/application/index\view\public\banner.html";i:1571731638;s:68:"D:\phpstudy_pro\WWW\tp.com/application/index\view\public\footer.html";i:1577420851;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    	
	<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <title><?php echo $webConfig['seo']['title']['value']; ?></title>
	<meta name="keywords" content="<?php echo $webConfig['seo']['keywords']['value']; ?>" />
	<meta name="description" content="<?php echo $webConfig['seo']['description']['value']; ?>" />
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="__LAY__/css/layui.css">
    <link rel="stylesheet" href="__CSS__/index.css">
    <link rel="stylesheet" href="__CSS__/tpCitrix.css">
    <link rel="stylesheet" href="__FONT__/css/font-awesome.min.css" media="all"/>
</head>
<body>

<div class="nav index citrixNav">
    <div class="layui-container">
        <div class="nav-logo">
            <a href="<?php echo citrixGetAdv(2523,2); ?>">
                <img src="<?php echo citrixGetAdv(2523,1); ?>" >
            </a>
        </div>
        <div class="nav-list">
            <button>
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="layui-nav">
                <?php if(is_array($navList) || $navList instanceof \think\Collection): $i = 0; $__LIST__ = $navList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li class="layui-nav-item">
                    <a href="<?php echo $vo['content']; ?>" <?php if(!(empty($citrixOn) || ($citrixOn instanceof \think\Collection && $citrixOn->isEmpty()))): if($citrixOn == $vo['id']): ?> style="color: #5FB878!important;"<?php endif; endif; ?>><?php echo $vo['title']; ?></a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>
<!-- banner部分 -->

<div class="layui-carousel" id="banner">
    <div carousel-item="">
        <div><img src="<?php echo citrixGetAdv(2521,1); ?>"></div>
        <div><img src="<?php echo citrixGetAdv(2522,1); ?>"></div>
    </div>
</div>
<div class="main-service main-product ">
    <div class="layui-container" >

        <a href="<?php echo citrixGetAdv(2518,2); ?>" >
        <div class="layui-col-sm6 layui-col-md4">
                <img src="<?php echo citrixGetAdv(2518,1); ?>" width="100%" height="186px">
        </div>
        </a>

        <a href="<?php echo citrixGetAdv(2519,2); ?>" >
        <div class="layui-col-sm6 layui-col-md4" >
                <img src="<?php echo citrixGetAdv(2519,1); ?>" width="100%" height="186px">
        </div>
        </a>

        <a href="<?php echo citrixGetAdv(2520,2); ?>" >

        <div class="layui-col-sm6 layui-col-md4">
                <img src="<?php echo citrixGetAdv(2520,1); ?>" width="100%" height="186px">
        </div>
        </a>
    </div>
    <div class="citrixClear"></div>
</div>
<!-- 竞争优势 -->
<div class="main-service main-product ">
    <div class="layui-container">
        <!--<p class="title citrixParam3">贴心服务<span>&emsp;竞争优势&emsp;</span>质量保障</p>-->
        <div class="layui-row layui-col-space25">
            <div class="layui-col-sm6 layui-col-md3">
                <div class="content">
                    <div>
                        <img src="<?php echo citrixGetUrl(getCitrixDb('single_page','id',12,'img')); ?>">
                    </div>
                    <div>
                        <p class="label"><?php echo getCitrixDb("single_page","id",12,"title"); ?></p>
                        <p><?php echo getCitrixDb("single_page","id",12,"content"); ?></p>
                    </div>
                    <!--<a href="<?php echo url('index/index/pageInfo',['id'=>12]); ?>">立即查看 ></a>-->
                </div>
            </div>
            <div class="layui-col-sm6 layui-col-md3 ">
                <div class="content">
                    <div>
                        <img src="<?php echo citrixGetUrl(getCitrixDb('single_page','id',13,'img')); ?>">
                    </div>
                    <div>
                        <p class="label"><?php echo getCitrixDb("single_page","id",13,"title"); ?></p>
                        <p><?php echo getCitrixDb("single_page","id",13,"content"); ?></p>
                    </div>
                    <!--<a href="<?php echo url('index/index/pageInfo',['id'=>13]); ?>">立即查看 ></a>-->
                </div>
            </div>
            <div class="layui-col-sm6 layui-col-md3 ">
                <div class="content">
                   <div>
                        <img src="<?php echo citrixGetUrl(getCitrixDb('single_page','id',14,'img')); ?>">
                    </div>
                    <div>
                        <p class="label"><?php echo getCitrixDb("single_page","id",14,"title"); ?></p>
                        <p><?php echo getCitrixDb("single_page","id",14,"content"); ?></p>
                    </div>
                    <!--<a href="<?php echo url('index/index/pageInfo',['id'=>14]); ?>">立即查看 ></a>-->
                </div>
            </div>
            <div class="layui-col-sm6 layui-col-md3 ">
                <div class="content">
                    <div>
                        <img src="<?php echo citrixGetUrl(getCitrixDb('single_page','id',15,'img')); ?>">
                    </div>
                    <div>
                        <p class="label"><?php echo getCitrixDb("single_page","id",15,"title"); ?></p>
                        <p><?php echo getCitrixDb("single_page","id",15,"content"); ?></p>
                    </div>
                    <!--<a href="<?php echo url('index/index/pageInfo',['id'=>15]); ?>">立即查看 ></a>-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 客户案例 -->
<div class="main-service citrixDoorVessel">
    <div class="layui-container">
        <div class="layui-col-xs12 citrixParam5">
            <span class="citrixDoorTitle">
                &emsp;客户案例
            </span>
            <span class="layui-breadcrumb citrixDoor" lay-separator="|">
                <?php if(is_array($dataCasesList['cateList']) || $dataCasesList['cateList'] instanceof \think\Collection): $k1 = 0; $__LIST__ = $dataCasesList['cateList'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k1 % 2 );++$k1;if($k1 == 1): ?>
                <a href="<?php echo url('index/index/casesList',['id'=>$vo['id']]); ?>">&emsp;<?php echo $vo['name']; ?></a>
                <?php else: ?>
                <a href="<?php echo url('index/index/casesList',['id'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </span>
            <a href="<?php echo url('index/index/casesList'); ?>" class="citrixDoorMore">
                <i class="fa fa-angle-double-right" aria-hidden="true"></i> More&emsp;
            </a>
        </div>
        <div class="layui-row layui-col-space25">
            <?php if(is_array($dataCasesList['list']) || $dataCasesList['list'] instanceof \think\Collection): $i = 0; $__LIST__ = $dataCasesList['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="layui-col-sm6 layui-col-md3" onmousemove="citrixMouseoverCase(this)" onmouseout="citrixMouseoutCase(this)">
                <div class="citrixCell">
                    <img src="<?php echo citrixGetUrl($vo['img']); ?>">
                </div>
                <div class="citrixCellImg citrixCellNone">
                    <a href="<?php echo url('index/index/Info',['id'=>$vo['id']]); ?>">
                        <dl class="citrixCellQrCode">
                            <dt>扫码下方二维码体验案例</dt>
                            <dd><a href="<?php echo url('index/index/Info',['id'=>$vo['id']]); ?>" style="color: red">点击查看图文详情介绍</a></dd>
                        </dl>
                        <img src="<?php echo citrixGetUrl($vo['code_img']); ?>">
                    </a>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
<!-- 资讯动态 -->
<div class="main-case citrixParam4">
    <div class="layui-container">
        <div class="layui-col-xs12 citrixParam5">
            <span class="citrixDoorTitle">
                &emsp;资讯动态
            </span>
            <a href="<?php echo url('index/index/newsList'); ?>" class="citrixDoorMore">
                <i class="fa fa-angle-double-right" aria-hidden="true"></i> More&emsp;
            </a>
        </div>
        <div class="layui-row">
            <div class="layui-inline layui-col-sm6 layui-col-md4 citrixNewsVessel ">
                <div class="layui-inline case-img">
                    <img src="<?php echo citrixGetAdv(2524,1); ?>">
                    <div class="citrixNewsBox">
                        <h6 class="citrixNewsBoxTitle"><?php echo $dataNewsList['0']['name']; ?></h6>
                        <p class="citrixNewsBoxDesc"><?php echo $dataNewsList['0']['description']; ?></p>
                    </div>
                </div>
                <div class="layui-col-md12">
                    <?php if(is_array($dataNewsList['0']['list']) || $dataNewsList['0']['list'] instanceof \think\Collection): $i = 0; $__LIST__ = $dataNewsList['0']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="layui-card">
                        <dl class="layui-card-header citrixNewsItem">
                            <dt><?php echo date("m-d",$vo['create_time']); ?></dt>
                            <dd><a href="<?php echo url('index/index/Info',['id'=>$vo['id']]); ?>"><?php echo $vo['title']; ?></a></dd>
                        </dl>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="layui-inline layui-col-sm6 layui-col-md4 citrixNewsVessel  even center">
                <div class="layui-inline case-img">
                    <img src="<?php echo citrixGetAdv(2525,1); ?>">
                    <div class="citrixNewsBox">
                        <h6 class="citrixNewsBoxTitle"><?php echo $dataNewsList['1']['name']; ?></h6>
                        <p class="citrixNewsBoxDesc"><?php echo $dataNewsList['1']['description']; ?></p>
                    </div>
                </div>
                <div class="layui-col-md12">
                    <?php if(is_array($dataNewsList['1']['list']) || $dataNewsList['1']['list'] instanceof \think\Collection): $i = 0; $__LIST__ = $dataNewsList['1']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="layui-card">
                        <dl class="layui-card-header citrixNewsItem">
                            <dt><?php echo date("m-d",$vo['create_time']); ?></dt>
                            <dd><a href="<?php echo url('index/index/Info',['id'=>$vo['id']]); ?>"><?php echo $vo['title']; ?></a></dd>
                        </dl>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="layui-inline layui-col-sm6 layui-col-md4 citrixNewsVessel ">
                <div class="layui-inline case-img">
                    <img src="<?php echo citrixGetAdv(2526,1); ?>">
                    <div class="citrixNewsBox">
                        <h6 class="citrixNewsBoxTitle"><?php echo $dataNewsList['2']['name']; ?></h6>
                        <p class="citrixNewsBoxDesc"><?php echo $dataNewsList['2']['description']; ?></p>
                    </div>
                </div>
                <div class="layui-col-md12">
                    <?php if(is_array($dataNewsList['2']['list']) || $dataNewsList['2']['list'] instanceof \think\Collection): $i = 0; $__LIST__ = $dataNewsList['2']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="layui-card">
                        <dl class="layui-card-header citrixNewsItem">
                            <dt><?php echo date("m-d",$vo['create_time']); ?></dt>
                            <dd><a href="<?php echo url('index/index/Info',['id'=>$vo['id']]); ?>"><?php echo $vo['title']; ?></a></dd>
                        </dl>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 项目定制 -->
<div class="main-service citrixAnimatedVessel">
    <div class="layui-container citrixAnimatedHeading">
        <div class="layui-col-xs12 ">
            <h2 class="citrixAnimated">项目定制</h2>
            <p class="citrixAnimatedImgs"></p>
            <span>坚持实施"一份需求、十份计划、百种方法"的针对性定制模式</span>
        </div>
    </div>
</div>
<!-- 表单提交 -->
<div class="main-service citrixCompanyInfo">
    <div class="layui-container">
        <div class="layui-row">
            <div class="layui-inline layui-col-sm6" style="margin-bottom: 10px;" >
                <h1 class="citrixCompanyInfoH2"><?php echo getCitrixDb("single_page","id",11,"title"); ?></h1>
                <span class="citrixCompanyInfoSpan"><?php echo getCitrixDb("single_page","id",11,"tag"); ?></span>
                <p class="citrixCompanyInfoP" style="    padding: 5px;"><?php echo getCitrixDb("single_page","id",11,"content"); ?></p>
            </div>
            <div class="layui-inline layui-col-sm6" style="margin-bottom: 10px;">
                <form class="layui-form layui-form-pane" id="form_array">
                <div class="layui-form-item">
                    <label class="layui-form-label">昵称</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" autocomplete="off" placeholder="请输入昵称" class="layui-input" lay-verify="required">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">邮箱</label>
                    <div class="layui-input-block">
                        <input type="text" name="email" autocomplete="off" placeholder="请输入邮箱" class="layui-input" lay-verify="required">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">联系方式</label>
                    <div class="layui-input-block">
                        <input type="text" name="phone" autocomplete="off" placeholder="请输入联系方式（86+）" class="layui-input" lay-verify="required">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">验证码</label>
                    <div class="layui-input-inline">
                        <input type="text" placeholder="请输入验证码" autocomplete="off" id="code" name="verifyCode" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux" style="margin:0px;padding: 0px!important;;"><img src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>?seed='+Math.random()" width="116" height="36" id="captcha" /></div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">需求描述</label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入需求描述" class="layui-textarea" name="message" value="" lay-verify="required"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <button class="layui-btn" lay-submit lay-filter="form_submit">提交</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- footer部分 -->

<div class="footer">
    <div class="layui-container">
        <p class="footer-web citrixColor">
            友情链接：
            <?php if(is_array($lUList) || $lUList instanceof \think\Collection): $i = 0; $__LIST__ = $lUList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <a href="<?php echo $vo['value_2']; ?>" target="_blank"><?php echo $vo['value_1']; ?></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </p>
    </div>
    <div class="layui-container">
        <p class="footer-web citrixColor">
            城市分站：
            <?php if(is_array($address) || $address instanceof \think\Collection): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <a href="<?php echo $vo['link']; ?>" target="_blank"><?php echo $vo['addressname']; ?></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </p>
    </div>
    <div class="layui-container">
        <div class="layui-row">
            <div class="layui-inline layui-col-sm8 citrixReport">
                <div class="layui-col-md3">
                    <dl class="layui-card-header citrixNewsItem citrixColor">
                        <h2>业务范围</h2>
                    </dl>
                    <dl class="layui-card-header citrixNewsItem citrixColor">
                        企业网站
                    </dl>
                    <dl class="layui-card-header citrixNewsItem citrixColor">
                        微信公众号(小程序)
                    </dl>
                    <dl class="layui-card-header citrixNewsItem citrixColor">
                        代运营公众号
                    </dl>
                    <dl class="layui-card-header citrixNewsItem citrixColor">
                        定制开发
                    </dl>
                </div>
                <div class="layui-col-md3">
                    <dl class="layui-card-header citrixNewsItem citrixColor">
                        <h2>关于云信</h2>
                    </dl>
                    <dl class="layui-card-header citrixNewsItem citrixColor">
                        公司简介
                    </dl>
                    <dl class="layui-card-header citrixNewsItem citrixColor">
                        公司荣誉
                    </dl>
                </div>
                <div class="layui-col-md3">
                    <dl class="layui-card-header citrixNewsItem citrixColor">
                        <h2>合作共赢</h2>
                    </dl>
                    <dl class="layui-card-header citrixNewsItem citrixColor">
                        渠道合作
                    </dl>
                    <dl class="layui-card-header citrixNewsItem citrixColor">
                        重要公告
                    </dl>
                </div>
                <div class="layui-col-md3">
                    <dl class="layui-card-header citrixNewsItem citrixColor">
                        <h2>联系我们</h2>
                    </dl>
                    <dl class="layui-card-header citrixNewsItem citrixColor">
                        QQ：11447474
                    </dl>

                </div>
            </div>
            <div class="layui-inline layui-col-sm4 citrixReport4" >
                <!--<dl class="layui-card-header citrixNewsItem citrixColor citrixServicehotline">-->
                    <!--<h2>服务热线：18051158881</h2>-->
                <!--</dl>-->
                <dl class="layui-inline layui-col-sm4 layui-card-header citrixNewsItem citrixColor citrixReportImg">
                    <img src="<?php echo citrixGetAdv(2527,1); ?>" width="100" height="100">
                    <dd>微信公众号</dd>
                </dl>
                <dl class="layui-inline layui-col-sm4 layui-card-header citrixNewsItem citrixColor citrixReportImg">
                    <img src="<?php echo citrixGetAdv(2528,1); ?>" width="100" height="100">
                    <dd>微信小程序</dd>
                </dl>
            </div>
        </div>
    </div>
    <div class="layui-container citrixReport2">
        <p>© 2015 - <?php echo date('Y') ?></p>
        <p>部分图片及信息来源网络!如版权侵权请联系我们删除ლ(′◉❥◉｀ლ)</p>
        <p> <?php echo $webConfig['seo']['title']['value']; ?></p>
        </br>
    </div>
    <div class="layui-container citrixReport3">
        <img src="__IMG__/zp.png">
    </div>
</div>
<script src="__JQ__/jquery.js"></script>
<script src="__LAY__/layui.js"></script>
<script type="text/javascript">
    layui.config({
        base: '__JS__/'
    }).use('firm');

    layui.use(['laypage', 'layer','form','upload'], function(){
        var laypage = layui.laypage
        ,layer = layui.layer
        ,form     = layui.form
        ,upload = layui.upload;

        //分页
        laypage.render({
           elem: 'citrixCasePage'
           ,limit:16
          ,count: <?php if(!(empty($casesCount) || ($casesCount instanceof \think\Collection && $casesCount->isEmpty()))): ?><?php echo $casesCount; else: ?>0<?php endif; ?>
          ,layout: ['count','prev', 'next','limit', 'refresh', 'skip']
          ,jump: function(obj, first)
          {
            if(!first){
                $.ajax({
                    url:"<?php echo url('index/index/ajaxCasesList'); ?>",
                    data:{"curr":obj.curr,"id":'<?php echo $id; ?>'},
                    type:'post',
                    async: false,
                    success:function(res)
                    {
                        $("#citrixCasePageHtml").html(res);
                    },
                    error:function()
                    {
                        layer.alert("未请求到数据！",{icon:2});
                    }
                });
            }
            form.render();
          }
        });

        //分页
        laypage.render({
           elem: 'citrixNewsPage'
           ,limit:16
          ,count: <?php if(!(empty($newsCount) || ($newsCount instanceof \think\Collection && $newsCount->isEmpty()))): ?><?php echo $newsCount; else: ?>0<?php endif; ?>
          ,layout: ['count','prev', 'next','limit', 'refresh', 'skip']
          ,jump: function(obj, first){
            if(!first){
                $.ajax({
                    url:"<?php echo url('index/index/ajaxNewsList'); ?>",
                    data:{"curr":obj.curr,"id":'<?php echo $id; ?>'},
                    type:'post',
                    async: false,
                    success:function(res)
                    {
                        $("#citrixNewsPageHtml").html(res);
                    },
                    error:function()
                    {
                        layer.alert("未请求到数据！",{icon:2});
                    }
                });
            }
            form.render();
          }
        });

        //data分页
        laypage.render({
            elem: 'citrixDataPage'
            ,limit:16
            ,count: <?php if(!(empty($newsCount) || ($newsCount instanceof \think\Collection && $newsCount->isEmpty()))): ?><?php echo $newsCount; else: ?>0<?php endif; ?>
            ,layout: ['count','prev', 'next','limit', 'refresh', 'skip']
            ,jump: function(obj, first){
            if(!first){
                $.ajax({
                    url:"<?php echo url('index/index/ajaxDataList'); ?>",
                    data:{"curr":obj.curr,"id":'<?php echo $id; ?>'},
                    type:'post',
                    async: false,
                    success:function(res)
                    {
                        $("#citrixDataPageHtml").html(res);
                    },
                    error:function()
                    {
                        layer.alert("未请求到数据！",{icon:2});
                    }
                });
            }
            form.render();
        }
        });

        //表单提交
        form.on("submit(form_submit)",function(data){
            $.ajax({
                url:"<?php echo url('index/index/publish'); ?>",
                data:$('#form_array').serialize(),
                type:'post',
                async: false,
                dataType : 'json',
                success:function(res)
                {
                    if(res.code == 1)
                    {
                        layer.msg(res.msg,{offset: '50px',anim: 1});
                        setTimeout(function(){
                            location.reload();
                        },1500)
                    }else
                    {
                        layer.msg(res.msg);
                        var ts = Date.parse(new Date())/1000;
                        var img = document.getElementById('captcha');
                        img.src = "/captcha?id="+ts;
                    }
                },
                error:function()
                {
                    layer.alert("Systematic anomaly！",{icon:2});
                }
            });
            return false;
        });
    });
    /**
     * [citrixMouseoverCase 客户案例鼠标移入时效果]
     * @return {[type]} [description]
     */
    function citrixMouseoverCase(e)
    {
        $(e).addClass("citrixCase");
        $(".citrixCase .citrixCell").addClass("citrixCellNone");
        $(".citrixCase .citrixCellImg").removeClass("citrixCellNone");
        $(".citrixCase .citrixCellImg").css("box-shadow","#666 0px 0px 15px");
    }
    /**
     * [citrixMouseoutCase 客户案例鼠标移出时效果]
     * @return {[type]} [description]
     */
    function citrixMouseoutCase(e)
    {
        $(".citrixCase .citrixCell").removeClass("citrixCellNone");
        $(".citrixCase .citrixCellImg").addClass("citrixCellNone");
        $(".citrixCase .citrixCellImg").css("box-shadow","");
        $(e).removeClass("citrixCase");
    }
    /**
     * [citrixMouseoverCase 客户案例鼠标移入时效果]
     * @return {[type]} [description]
     */
    function citrixMouseoverCase(e)
    {
        $(e).addClass("citrixCase");
        $(".citrixCase .citrixCell").addClass("citrixCellNone");
        $(".citrixCase .citrixCellImg").removeClass("citrixCellNone");
        $(".citrixCase .citrixCellImg").css("box-shadow","#666 0px 0px 15px");
    }
    /**
     * [citrixMouseoutCase 客户案例鼠标移出时效果]
     * @return {[type]} [description]
     */
    function citrixMouseoutCase(e)
    {
        $(".citrixCase .citrixCell").removeClass("citrixCellNone");
        $(".citrixCase .citrixCellImg").addClass("citrixCellNone");
        $(".citrixCase .citrixCellImg").css("box-shadow","");
        $(e).removeClass("citrixCase");
    }
</script>
</body>
</html>