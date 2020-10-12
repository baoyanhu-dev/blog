<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\phpStudy\WWW\majiang/application/admin\view\fenzhan\publish.html";i:1577498474;}*/ ?>
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
    <style type="text/css">
        .citrixCheckLevel
        {
            display: none;
        }
    </style>
</head>
<body class="childrenBody">
<form class="layui-form layui-form-pane" id="form_array">
    <div class="layui-form-item">
        <label class="layui-form-label">排序</label>
        <div class="layui-input-block">
            <input type="text" name="sort" autocomplete="off" placeholder="请输入排序" class="layui-input" lay-verify="required" <?php if(!(empty($getInfo['sort']) || ($getInfo['sort'] instanceof \think\Collection && $getInfo['sort']->isEmpty()))): ?> value="<?php echo $getInfo['sort']; ?>"<?php endif; ?>>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">地区</label>
        <div class="layui-input-block">
            <input type="text" name="addressname" autocomplete="off" placeholder="请输入地区名(如:北京)" class="layui-input" lay-verify="required" <?php if(!(empty($getInfo['addressname']) || ($getInfo['addressname'] instanceof \think\Collection && $getInfo['addressname']->isEmpty()))): ?> value="<?php echo $getInfo['addressname']; ?>"<?php endif; ?>>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">目录名称</label>
        <div class="layui-input-block">
            <input type="text" name="city"  placeholder="请输入生成目录名称(如:beijing)" autocomplete="off" class="layui-input" <?php if(!(empty($getInfo['city']) || ($getInfo['city'] instanceof \think\Collection && $getInfo['city']->isEmpty()))): ?> value="<?php echo $getInfo['city']; ?>"<?php endif; ?>>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">分站链接</label>
        <div class="layui-input-block">
            <input type="text" name="link"  placeholder="请输入分站链接:(http://或者https://开头)" autocomplete="off" class="layui-input" <?php if(!(empty($getInfo['link']) || ($getInfo['link'] instanceof \think\Collection && $getInfo['link']->isEmpty()))): ?> value="<?php echo $getInfo['link']; ?>"<?php endif; ?>>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">分站title</label>
        <div class="layui-input-block">
            <input type="text" name="title"  placeholder="分站title(建议以-分割)" autocomplete="off" class="layui-input" <?php if(!(empty($getInfo['title']) || ($getInfo['title'] instanceof \think\Collection && $getInfo['title']->isEmpty()))): ?> value="<?php echo $getInfo['title']; ?>"<?php endif; ?>>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">分站关键词</label>
        <div class="layui-input-block">
            <input type="text" name="keyword"  placeholder="请输入分站关键词(建议以,分割)" autocomplete="off" class="layui-input" <?php if(!(empty($getInfo['keyword']) || ($getInfo['keyword'] instanceof \think\Collection && $getInfo['keyword']->isEmpty()))): ?> value="<?php echo $getInfo['keyword']; ?>"<?php endif; ?>>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">分站描述</label>
        <div class="layui-input-block">
            <input type="text" name="des"  placeholder="请输入分站描述" autocomplete="off" class="layui-input" <?php if(!(empty($getInfo['des']) || ($getInfo['des'] instanceof \think\Collection && $getInfo['des']->isEmpty()))): ?> value="<?php echo $getInfo['des']; ?>"<?php endif; ?>>
        </div>
    </div>
    <?php if(!(empty($getInfo) || ($getInfo instanceof \think\Collection && $getInfo->isEmpty()))): ?>
    <input type="hidden" name="id" value="<?php echo $getInfo['id']; ?>">
    <?php endif; ?>
    <div class="layui-form-item">
        <button class="layui-btn" lay-submit lay-filter="form_submit">提交</button>
    </div>
</form>
<script src="__JQ__/jquery.js"></script>
<script type="text/javascript" src="__LAY__/layui.js"></script>
<script type="text/javascript">
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,laydate = layui.laydate;
        //表单提交
        form.on("submit(form_submit)",function(data){
            $.ajax({
                url:"<?php echo url('admin/fenzhan/publish'); ?>",
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