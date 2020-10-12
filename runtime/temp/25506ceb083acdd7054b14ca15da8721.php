<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"/www/users/HA611975/WEB/application/admin/view/admin/publish.html";i:1565075426;}*/ ?>
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
            <label class="layui-form-label">分组</label>
            <div class="layui-input-block">
                <select name="admin_cate_id" lay-filter="aihao">
                    <option value="0">请选择分组</option>
                    <?php if(is_array($dataList) || $dataList instanceof \think\Collection): $i = 0; $__LIST__ = $dataList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $vo['id']; ?>" <?php if(!(empty($getInfo['admin_cate_id']) || ($getInfo['admin_cate_id'] instanceof \think\Collection && $getInfo['admin_cate_id']->isEmpty()))): if($getInfo['admin_cate_id'] == $vo['id']): ?> selected=""<?php endif; endif; ?>><?php echo $vo['name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
          </div>
        
        <div class="layui-form-item">
            <label class="layui-form-label">昵称</label>
            <div class="layui-input-block">
                <input type="text" name="nickname" autocomplete="off" placeholder="请输入昵称" class="layui-input" lay-verify="required" <?php if(!(empty($getInfo['nickname']) || ($getInfo['nickname'] instanceof \think\Collection && $getInfo['nickname']->isEmpty()))): ?> value="<?php echo $getInfo['nickname']; ?>"<?php endif; ?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">账号</label>
            <div class="layui-input-block">
                <input type="text" name="username" autocomplete="off" placeholder="请输入账号邮箱" class="layui-input" lay-verify="required|email" <?php if(!(empty($getInfo['username']) || ($getInfo['username'] instanceof \think\Collection && $getInfo['username']->isEmpty()))): ?> value="<?php echo $getInfo['username']; ?>"<?php endif; ?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
                <input type="text" name="password" autocomplete="off" placeholder="请输入密码" class="layui-input" >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">重复密码</label>
            <div class="layui-input-block">
                <input type="text" name="password_confirm" autocomplete="off" placeholder="请输入重复密码" class="layui-input" >
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
                    url:"<?php echo url('admin/admin/publish'); ?>",
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