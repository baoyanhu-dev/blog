<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\phpStudy\WWW\majiang/application/admin\view\data_cate\publish.html";i:1570505847;}*/ ?>
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
                    <option value="<?php echo $vo['id']; ?>" <?php if(!(empty($getInfo['pid']) || ($getInfo['pid'] instanceof \think\Collection && $getInfo['pid']->isEmpty()))): if($getInfo['pid'] == $vo['id']): ?> selected=""<?php endif; else: if(!(empty($pid) || ($pid instanceof \think\Collection && $pid->isEmpty()))): if($pid == $vo['id']): ?> selected=""<?php endif; endif; endif; if($vo['level'] == 3): ?> disabled="" <?php endif; ?>><?php echo $vo['str']; ?><?php echo $vo['name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">分类名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" autocomplete="off" placeholder="请输入分类名称" class="layui-input" lay-verify="required" <?php if(!(empty($getInfo['name']) || ($getInfo['name'] instanceof \think\Collection && $getInfo['name']->isEmpty()))): ?> value="<?php echo $getInfo['name']; ?>"<?php endif; ?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">分类类型</label>
            <div class="layui-input-block">
              <input type="radio" name="type" value="1" title="资讯列表" <?php if(!(empty($getInfo['sort']) || ($getInfo['sort'] instanceof \think\Collection && $getInfo['sort']->isEmpty()))): if($getInfo['type'] == 1): ?> checked="" <?php endif; else: ?> checked=""<?php endif; ?>>
              <input type="radio" name="type" value="2" title="案例列表" <?php if(!(empty($getInfo['sort']) || ($getInfo['sort'] instanceof \think\Collection && $getInfo['sort']->isEmpty()))): if($getInfo['type'] == 2): ?> checked="" <?php endif; endif; ?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">排序</label>
            <div class="layui-input-block">
              <input type="text" name="sort" lay-verify="required"  placeholder="请输入排序" autocomplete="off" class="layui-input" <?php if(!(empty($getInfo['sort']) || ($getInfo['sort'] instanceof \think\Collection && $getInfo['sort']->isEmpty()))): ?> value="<?php echo $getInfo['sort']; ?>"<?php else: ?> value="10" <?php endif; ?>>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">简单描述</label>
            <div class="layui-input-block">
                <textarea placeholder="请输入简单描述" class="layui-textarea" name="description" value="<?php echo $getInfo['description']; ?>" lay-verify="required"><?php if(!(empty($getInfo['description']) || ($getInfo['description'] instanceof \think\Collection && $getInfo['description']->isEmpty()))): ?><?php echo $getInfo['description']; endif; ?></textarea>
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
         layui.use(['form'], function()
        {
            var form     = layui.form;
            //iframe句柄
            var layerIframe = parent.layer.getFrameIndex(window.name);
            //登录按钮
            form.on("submit(form_submit)",function(data){
                $.ajax({
                    url:"<?php echo url('admin/DataCate/publish'); ?>",
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