<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\phpStudy\WWW\majiang/application/admin\view\single_page\publish.html";i:1570787606;}*/ ?>
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
                <input type="text" name="title" autocomplete="off" placeholder="请输入名称" class="layui-input" lay-verify="required" <?php if(!(empty($getInfo['title']) || ($getInfo['title'] instanceof \think\Collection && $getInfo['title']->isEmpty()))): ?> value="<?php echo $getInfo['title']; ?>"<?php endif; ?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标签</label>
            <div class="layui-input-block">
              <input type="text" name="tag" lay-verify="required"  placeholder="请输入标签" autocomplete="off" class="layui-input" <?php if(!(empty($getInfo['tag']) || ($getInfo['tag'] instanceof \think\Collection && $getInfo['tag']->isEmpty()))): ?> value="<?php echo $getInfo['tag']; ?>"<?php else: ?> value="" <?php endif; ?>>
            </div>
        </div>
        <div class="layui-upload" id="img">
            <label class="layui-form-label">图片</label>
            <button type="button" class="layui-btn" id="page_click">上传图片</button>
            <div class="layui-upload-list">
                <label class="layui-form-label" style="border: 1px solid #fff;"></label>
                <img class="layui-upload-img" id="page_img" width="150" height="150" <?php if(!(empty($getInfo['img']) || ($getInfo['img'] instanceof \think\Collection && $getInfo['img']->isEmpty()))): ?> src="<?php echo citrixGetUrl($getInfo['img']); ?>" <?php endif; ?>>
                <input type="hidden" name="img" id="page_thumb" <?php if(!(empty($getInfo['img']) || ($getInfo['img'] instanceof \think\Collection && $getInfo['img']->isEmpty()))): ?> value="<?php echo $getInfo['img']; ?>"<?php endif; ?>>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">单页内容</label>
            <div class="layui-input-block" >
                <textarea placeholder="请输入单页内容" name="content" id="container"><?php if(!(empty($getInfo['content']) || ($getInfo['content'] instanceof \think\Collection && $getInfo['content']->isEmpty()))): ?><?php echo htmlentities($getInfo['content']); endif; ?></textarea>
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
        layui.use(['form','upload'], function()
        {
            var form     = layui.form,
                upload = layui.upload;
            //iframe句柄
            var layerIframe = parent.layer.getFrameIndex(window.name);
            //上传图片
            upload.render({
                elem: '#page_click' //绑定元素
                ,url: "<?php echo url('admin/common/upload'); ?>" //上传接口
                ,data:{use:'page_default'}
                ,done: function(res)
                {
                    $("#page_img").attr('src',res.src);
                    $("#page_thumb").val(res.id);
                }
                ,error: function()
                {
                    layer.alert("Systematic anomaly！",{icon:2});
                }
            });
            //登录按钮
            form.on("submit(form_submit)",function(data){
                $.ajax({
                    url:"<?php echo url('admin/singlePage/publish'); ?>",
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
    
    <!-- 加载编辑器的容器 -->
    <script id="container" name="content" type="text/plain">
        这里写你的初始化内容
    </script>
    <!-- 配置文件 -->
    <script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
</body>
</html>