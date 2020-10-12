<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:66:"/www/users/HA611975/WEB/application/index/view/index/newsList.html";i:1577330782;s:65:"/www/users/HA611975/WEB/application/index/view/public/header.html";i:1571726099;s:66:"/www/users/HA611975/WEB/application/index/view/public/navList.html";i:1571797273;s:65:"/www/users/HA611975/WEB/application/index/view/public/footer.html";i:1577340182;}*/ ?>
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
<div class="banner news">
    <div class="title">
        <p>实时新闻</p>
        <p class="en">Real-time News</p>
    </div>
</div>
<!-- main -->
<div class="main-news">
    <div class="layui-container">
        <div class="layui-col-xs12 citrixCaseName">
            <span class="layui-breadcrumb">
                 <?php if(is_array($data) || $data instanceof \think\Collection): $k1 = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k1 % 2 );++$k1;?>
                <a href="<?php echo url('index/index/DataList',['id'=>$vo['id']]); ?>" <?php if($id == $vo['id']): ?> style="background: #5fb878;color: #fff!important;" <?php endif; ?>><?php echo $vo['name']; ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </span>
        </div>
        <div class="layui-row layui-col-space20" id="citrixNewsPageHtml">
            <?php if(is_array($newsList) || $newsList instanceof \think\Collection): $i = 0; $__LIST__ = $newsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="layui-col-lg6 content">
                <div>
                    <div class="news-img"><a href="<?php echo url('index/index/Info',['id'=>$vo['id']]); ?>"><img src="<?php echo citrixGetUrl($vo['img']); ?>" width="182" height="128"></a></div><div class="news-panel">
                      <strong><a href="<?php echo url('index/index/Info',['id'=>$vo['id']]); ?>"><?php echo $vo['title']; ?></a></strong>
                      <p class="detail"><span><?php echo $vo['description']; ?></span><a href="<?php echo url('index/index/Info',['id'=>$vo['id']]); ?>">....</a></p>
                      <p class="read-push">阅读 <span><?php echo $vo['click_sum']; ?></span>发布时间：<span><?php echo date("Y-m-d",$vo['create_time']); ?></span></p>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="citrixPage" id="citrixNewsPage"></div>
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
            <a href="" target="_blank">上海</a>
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