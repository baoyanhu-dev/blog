<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\phpStudy\WWW\majiang/application/admin\view\permission\publish.html";i:1565075426;}*/ ?>
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
            <label class="layui-form-label">权限模块</label>
            <div class="layui-input-block">
              <select name="menu_cate_id" lay-filter="aihao" lay-verify="required">
                <?php if(is_array($moduleList) || $moduleList instanceof \think\Collection): $i = 0; $__LIST__ = $moduleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $vo['id']; ?>" <?php if(!(empty($getInfo['menu_cate_id']) || ($getInfo['menu_cate_id'] instanceof \think\Collection && $getInfo['menu_cate_id']->isEmpty()))): if($getInfo['menu_cate_id'] == $vo['id']): ?> selected=""<?php endif; else: if(!(empty($menu_cate_id) || ($menu_cate_id instanceof \think\Collection && $menu_cate_id->isEmpty()))): if($menu_cate_id == $vo['id']): ?> selected=""<?php endif; endif; endif; ?>><?php echo $vo['name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">上级菜单</label>
            <div class="layui-input-block">
              <select name="pid" lay-filter="aihao" >
                <option value="0">作为顶级菜单</option>
                <?php if(is_array($dataList) || $dataList instanceof \think\Collection): $i = 0; $__LIST__ = $dataList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $vo['id']; ?>" <?php if(!(empty($getInfo['pid']) || ($getInfo['pid'] instanceof \think\Collection && $getInfo['pid']->isEmpty()))): if($getInfo['pid'] == $vo['id']): ?> selected=""<?php endif; else: if(!(empty($pid) || ($pid instanceof \think\Collection && $pid->isEmpty()))): if($pid == $vo['id']): ?> selected=""<?php endif; endif; endif; if($vo['level'] == 3): ?> disabled="" <?php endif; ?>><?php echo $vo['str']; ?><?php echo $vo['name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" autocomplete="off" placeholder="请输入名称" class="layui-input" lay-verify="required" <?php if(!(empty($getInfo['name']) || ($getInfo['name'] instanceof \think\Collection && $getInfo['name']->isEmpty()))): ?> value="<?php echo $getInfo['name']; ?>"<?php endif; ?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块</label>
            <div class="layui-input-block">
                <input type="text" name="module" autocomplete="off" placeholder="请输入模块" class="layui-input"  <?php if(!(empty($getInfo['module']) || ($getInfo['module'] instanceof \think\Collection && $getInfo['module']->isEmpty()))): ?> value="<?php echo $getInfo['module']; ?>"<?php endif; ?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">控制器</label>
            <div class="layui-input-block">
                <input type="text" name="controller" autocomplete="off" placeholder="请输入控制器" class="layui-input"  <?php if(!(empty($getInfo['controller']) || ($getInfo['controller'] instanceof \think\Collection && $getInfo['controller']->isEmpty()))): ?> value="<?php echo $getInfo['controller']; ?>"<?php endif; ?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">方法</label>
            <div class="layui-input-block">
                <input type="text" name="function" autocomplete="off" placeholder="请输入方法" class="layui-input" <?php if(!(empty($getInfo['function']) || ($getInfo['function'] instanceof \think\Collection && $getInfo['function']->isEmpty()))): ?> value="<?php echo $getInfo['function']; ?>"<?php endif; ?>>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">描述</label>
            <div class="layui-input-block">
                <textarea placeholder="请输入描述" lay-verify="required" name="description" class="layui-textarea"><?php if(!(empty($getInfo['description']) || ($getInfo['description'] instanceof \think\Collection && $getInfo['description']->isEmpty()))): ?><?php echo $getInfo['description']; endif; ?></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block">
              <select name="is_display" lay-filter="aihao">
                <option value="1" <?php if(!(empty($getInfo['is_display']) || ($getInfo['is_display'] instanceof \think\Collection && $getInfo['is_display']->isEmpty()))): if($getInfo['is_display'] == 1): ?> selected="" <?php endif; else: ?> selected=""<?php endif; ?>>显示在左侧</option>
                <option value="2" <?php if(!(empty($getInfo['is_display']) || ($getInfo['is_display'] instanceof \think\Collection && $getInfo['is_display']->isEmpty()))): if($getInfo['is_display'] == 2): ?> selected="" <?php endif; endif; ?>>只作为节点</option>
              </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图标</label>
            <div class="layui-input-block">
                <input type="text" name="icon" autocomplete="off" placeholder="请输入图标代码" class="layui-input"  <?php if(!(empty($getInfo['icon']) || ($getInfo['icon'] instanceof \think\Collection && $getInfo['icon']->isEmpty()))): ?> value="<?php echo $getInfo['icon']; ?>"<?php endif; ?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">排序大小</label>
            <div class="layui-input-block">
                <input type="text" name="sort" autocomplete="off" placeholder="请输入排序大小1-100" class="layui-input" lay-verify="required" <?php if(!(empty($getInfo['sort']) || ($getInfo['sort'] instanceof \think\Collection && $getInfo['sort']->isEmpty()))): ?> value="<?php echo $getInfo['sort']; ?>" <?php else: ?> value="10" <?php endif; ?>>
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
                    url:"<?php echo url('admin/permission/publish'); ?>",
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