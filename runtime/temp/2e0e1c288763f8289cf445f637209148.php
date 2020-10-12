<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\phpStudy\WWW\majiang/application/index\view\index\ajaxNewsList.html";i:1577283372;}*/ ?>

            <?php if(is_array($newsList) || $newsList instanceof \think\Collection): $i = 0; $__LIST__ = $newsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="layui-col-lg6 content">
                <div>
                    <div class="news-img"><a href="<?php echo url('index/index/Info',['id'=>$vo['id']]); ?>"><img src="<?php echo citrixGetUrl($vo['img']); ?>"  width="182" height="128"></a></div><div class="news-panel">
                      <strong><a href="<?php echo url('index/index/Info',['id'=>$vo['id']]); ?>"><?php echo $vo['title']; ?></a></strong>
                      <p class="detail"><span><?php echo $vo['description']; ?></span><a href="<?php echo url('index/index/Info',['id'=>$vo['id']]); ?>">[详细]</a></p>
                      <p class="read-push">阅读 <span><?php echo $vo['click_sum']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;发布时间：<span><?php echo date("Y-m-d",$vo['create_time']); ?></span></p>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>