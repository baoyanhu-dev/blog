<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\phpStudy\WWW\majiang/application/index\view\index\ajaxCasesList.html";i:1571736263;}*/ ?>
            
            <?php if(is_array($casesList) || $casesList instanceof \think\Collection): $i = 0; $__LIST__ = $casesList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="layui-col-sm6 layui-col-md3" onmousemove="citrixMouseoverCase(this)" onmouseout="citrixMouseoutCase(this)">
                <div class="citrixCell">
                    <img src="<?php echo citrixGetUrl($vo['img']); ?>">
                </div>
                <div class="citrixCellImg citrixCellNone">
                    <dl class="citrixCellQrCode">
                        <dt>扫描下方二维码</dt>
                        <dd>查看详情</dd>
                    </dl>
                    <img src="<?php echo citrixGetUrl($vo['code_img']); ?>">
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>