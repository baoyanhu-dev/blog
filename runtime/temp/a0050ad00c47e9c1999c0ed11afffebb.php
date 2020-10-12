<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\phpStudy\WWW\majiang/application/admin\view\adverts\publish.html";i:1566033528;}*/ ?>
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
            <label class="layui-form-label">上级菜单</label>
            <div class="layui-input-block">
                <select name="pid">
                    <option value="0">请选择上级菜单</option>
                    <?php if(is_array($dataList) || $dataList instanceof \think\Collection): $i = 0; $__LIST__ = $dataList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $vo['id']; ?>" <?php if(!(empty($getInfo['pid']) || ($getInfo['pid'] instanceof \think\Collection && $getInfo['pid']->isEmpty()))): if($getInfo['pid'] == $vo['id']): ?> selected=""<?php endif; else: if(!(empty($pid) || ($pid instanceof \think\Collection && $pid->isEmpty()))): if($pid == $vo['id']): ?> selected=""<?php endif; endif; endif; if($vo['level'] >= 2): ?> disabled="" <?php endif; ?>><?php echo $vo['str']; ?><?php echo $vo['title']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">广告名称</label>
            <div class="layui-input-block">
                <input type="text" name="title" autocomplete="off" placeholder="请输入广告名称" class="layui-input" lay-verify="required" <?php if(!(empty($getInfo['title']) || ($getInfo['title'] instanceof \think\Collection && $getInfo['title']->isEmpty()))): ?> value="<?php echo $getInfo['title']; ?>"<?php endif; ?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">排序</label>
            <div class="layui-input-block">
              <input type="text" name="sort" lay-verify="required"  placeholder="请输入排序" autocomplete="off" class="layui-input" <?php if(!(empty($getInfo['sort']) || ($getInfo['sort'] instanceof \think\Collection && $getInfo['sort']->isEmpty()))): ?> value="<?php echo $getInfo['sort']; ?>"<?php else: ?> value="10" <?php endif; ?>>
            </div>
        </div>
        <div class="layui-upload">
            <label class="layui-form-label">图片</label>
            <button type="button" class="layui-btn" id="article_click">上传图片</button>
            <div class="layui-upload-list">
                <label class="layui-form-label" style="border: 1px solid #fff;"></label>
                <img class="layui-upload-img" id="article_img" width="150" height="150" <?php if(!(empty($getInfo['img']) || ($getInfo['img'] instanceof \think\Collection && $getInfo['img']->isEmpty()))): ?> src="<?php echo citrixGetUrl($getInfo['img']); ?>" <?php endif; ?>>
                <input type="hidden" name="img" id="article_thumb" <?php if(!(empty($getInfo['img']) || ($getInfo['img'] instanceof \think\Collection && $getInfo['img']->isEmpty()))): ?> value="<?php echo $getInfo['img']; ?>"<?php endif; ?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">广告地址</label>
            <div class="layui-input-block">
              <input type="text" name="content" lay-verify="required"  placeholder="请输入广告地址" autocomplete="off" class="layui-input" <?php if(!(empty($getInfo['content']) || ($getInfo['content'] instanceof \think\Collection && $getInfo['content']->isEmpty()))): ?> value="<?php echo $getInfo['content']; ?>"<?php else: ?> value="" <?php endif; ?>>
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
                elem: '#article_click' //绑定元素
                ,url: "<?php echo url('admin/common/upload'); ?>" //上传接口
                ,data:{use:'article_default'}
                ,done: function(res)
                {
                    $("#article_img").attr('src',res.src);
                    $("#article_thumb").val(res.id);
                }
                ,error: function()
                {
                    layer.alert("Systematic anomaly！",{icon:2});
                }
            });
            //登录按钮
            form.on("submit(form_submit)",function(data){
                $.ajax({
                    url:"<?php echo url('admin/adverts/publish'); ?>",
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