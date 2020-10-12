<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\phpStudy\WWW\majiang/application/admin\view\set_up\index.html";i:1570500035;}*/ ?>
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
        .layui-form-pane .layui-form-label 
        {
            width: 200px;
        }
        .layui-form-pane .layui-input-block 
        {
            margin-left: 200px;
        }
        .citrixContainer
        {
            border: 2px solid #000;
            margin: 10px 0px;
        }
        .citrixContainerTitle
        {
            height: 35px;
            line-height: 35px;
            color: #000;
        }
    </style>
</head>
<body class="childrenBody">
<form class="layui-form layui-form-pane" id="form_array">
    <div class="citrixContainer">
        <h5 class="citrixContainerTitle">&emsp;Seo优化</h5>
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-block">
                <input type="text" name="seo[title]" autocomplete="off" placeholder="请输入标题" class="layui-input" value="<?php echo $getInfo['seo']['title']['value']; ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">关键词</label>
            <div class="layui-input-block">
                <input type="text" name="seo[keywords]" autocomplete="off" placeholder="请输入关键词" class="layui-input" value="<?php echo $getInfo['seo']['keywords']['value']; ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">简单描述</label>
            <div class="layui-input-block">
                <input type="text" name="seo[description]" autocomplete="off" placeholder="请输入简单描述" class="layui-input" value="<?php echo $getInfo['seo']['description']['value']; ?>">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <button class="layui-btn" lay-submit lay-filter="login">保存系统配置</button>
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
        form.on("submit(login)",function(data){
            var loadLayer = layer.load(0, {shade: false}); 
            $.ajax({
                url:"<?php echo url('admin/setUp/publish'); ?>",
                data:$('#form_array').serialize(),
                type:'post',
                async: false,
                dataType : 'json',
                success:function(res) 
                {
                    parent.layer.close(loadLayer);
                    if(res.code == 1)
                    {
                        layer.msg(res.msg,{icon:1});
                        setTimeout(function(){
                            location.href = location.href;
                        },1500);
                    }else
                    {
                        layer.msg(res.msg,{icon:2});
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