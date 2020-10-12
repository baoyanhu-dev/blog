<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\phpStudy\WWW\majiang/application/admin\view\admin_cate\publish.html";i:1565075426;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="__FONT__/css/font-awesome.min.css" media="all"/>
    <link rel="stylesheet" href="__LAY__/css/layui.css" media="all" />
    <link rel="stylesheet" href="__CSS__/public.css" media="all" />
</head>
<body class="childrenBody">
    <form class="layui-form layui-form-pane" id="form_array">
        <div class="layui-form-item">
            <label class="layui-form-label">名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" autocomplete="off" placeholder="请输入名称" class="layui-input" lay-verify="required" <?php if(!(empty($getInfo['name']) || ($getInfo['name'] instanceof \think\Collection && $getInfo['name']->isEmpty()))): ?> value="<?php echo $getInfo['name']; ?>"<?php endif; ?>>
            </div>
        </div>
        <?php if(is_array($menuList) || $menuList instanceof \think\Collection): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?>
        <div class="layui-collapse layui-form-item layui-form-text" lay-accordion="" style="border: 2px solid #1AA094;">
        <div class="layui-colla-item">
            <h2 class="layui-colla-title"><input type="checkbox" lay-skin="primary" name="menu[]" value="<?php echo $v1['id']; ?>" <?php if(!(empty($getInfo['menu_collect']) || ($getInfo['menu_collect'] instanceof \think\Collection && $getInfo['menu_collect']->isEmpty()))): if(in_array($v1['id'],$getInfo['menu_collect']) == true): ?> checked=""<?php endif; endif; ?>><?php echo $v1['name']; ?><span style="color: #F60;">&nbsp;[<?php echo citrixGetMenuCateName($v1['menu_cate_id']); ?>]</span></h2>
            <?php if(!(empty($v1['list']) || ($v1['list'] instanceof \think\Collection && $v1['list']->isEmpty()))): ?>
            <div class="layui-colla-content layui-show">
                <?php if(is_array($v1['list']) || $v1['list'] instanceof \think\Collection): $i = 0; $__LIST__ = $v1['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?>
                <div class="layui-collapse layui-form-item layui-form-text" lay-accordion="" >
                    <div class="layui-colla-item">
                        <h2 class="layui-colla-title"><input type="checkbox" lay-skin="primary" name="menu[]" value="<?php echo $v2['id']; ?>" <?php if(!(empty($getInfo['menu_collect']) || ($getInfo['menu_collect'] instanceof \think\Collection && $getInfo['menu_collect']->isEmpty()))): if(in_array($v2['id'],$getInfo['menu_collect']) == true): ?> checked=""<?php endif; endif; ?>><?php echo $v2['name']; ?><span style="color: #F60;">&nbsp;[<?php echo citrixGetMenuCateName($v2['menu_cate_id']); ?>]</span></h2>
                        <?php if(!(empty($v2['list']) || ($v2['list'] instanceof \think\Collection && $v2['list']->isEmpty()))): ?>
                        <div class="layui-colla-content layui-show">
                            <div class="layui-collapse" lay-accordion="">
                                <div class="layui-colla-item">
                                    <?php if(is_array($v2['list']) || $v2['list'] instanceof \think\Collection): $k3 = 0; $__LIST__ = $v2['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($k3 % 2 );++$k3;?>
                                    <div class="layui-colla-content layui-show" <?php if($k3 == 1): ?> style="border-top: 1px solid #FFF;" <?php endif; ?>>&emsp;
                                        <input type="checkbox" lay-skin="primary" name="menu[]" value="<?php echo $v3['id']; ?>" <?php if(!(empty($getInfo['menu_collect']) || ($getInfo['menu_collect'] instanceof \think\Collection && $getInfo['menu_collect']->isEmpty()))): if(in_array($v3['id'],$getInfo['menu_collect']) == true): ?> checked=""<?php endif; endif; ?>><?php echo $v3['name']; ?><span style="color: #F60;">&nbsp;[<?php echo citrixGetMenuCateName($v3['menu_cate_id']); ?>]</span>
                                    </div>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <?php endif; ?>
        </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">描述</label>
            <div class="layui-input-block">
                <textarea placeholder="请输入描述" lay-verify="required" name="description" class="layui-textarea"><?php if(!(empty($getInfo['description']) || ($getInfo['description'] instanceof \think\Collection && $getInfo['description']->isEmpty()))): ?><?php echo $getInfo['description']; endif; ?></textarea>
            </div>
        </div>
        <?php if(!(empty($getInfo['id']) || ($getInfo['id'] instanceof \think\Collection && $getInfo['id']->isEmpty()))): ?>
        <input type="hidden" name="id" value="<?php echo $getInfo['id']; ?>">
        <?php endif; ?>
        <div class="layui-form-item">
            <button class="layui-btn" lay-submit lay-filter="form_submit">提交</button>
        </div>
    </form>
    <script src="__JQ__/jquery.js"></script>
    <script type="text/javascript" src="__LAY__/layui.js"></script>
    <script type="text/javascript">
         layui.use(['form'], function()
        {
            var form     = layui.form;
            //iframe句柄
            var layerIframe = parent.layer.getFrameIndex(window.name);
            //登录按钮
            form.on("submit(form_submit)",function(data){
                $.ajax({
                    url:"<?php echo url('admin/adminCate/publish'); ?>",
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
                                parent.layer.close(layerIframe);
                            },1500)
                        }else
                        {
                            layer.msg(res.msg);
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
    </script>
</body>
</html>