<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"/www/users/HA611975/WEB/application/admin/view/cases/index.html";i:1570611244;}*/ ?>
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
    <blockquote class="layui-elem-quote">
        <button type="button" class="layui-btn" onclick="publish(this)" data-url="<?php echo url('admin/cases/publish'); ?>">新增</button>
    </blockquote> 
    <form class="layui-form serch" action="<?php echo url('admin/cases/index'); ?>" method="post">
        <div class="layui-form-item" style="float: left;">
            <div class="layui-input-inline">
                <select name="data_cate_id">
                    <option value="0">请选择上级菜单</option>
                    <?php if(is_array($cateList) || $cateList instanceof \think\Collection): $i = 0; $__LIST__ = $cateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $vo['id']; ?>" <?php if($data_cate_id == $vo['id']): ?> selected="selected"<?php endif; ?>><?php echo $vo['str']; ?><?php echo $vo['name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="layui-input-inline">
                <input type="text" name="keywords" lay-verify="title" autocomplete="off" placeholder="请输入关键词" class="layui-input layui-btn-sm" value="<?php echo $keywords; ?>">
            </div>
            <button class="layui-btn layui-btn-danger " lay-submit="" lay-filter="serch"> 立即提交</button>
        </div>
    </form> 
    <div class="layui-form">
        <table class="layui-table">
            <colgroup>
                <col width="50">
                <col width="50">
                <col width="80">
                <col width="80">
                <col width="80">
                <col >
                <col width="300">
                <col width="165">
                <col width="165">
                <col width="165">
            </colgroup>
            <thead>
                <tr>
                    <th></th>
                    <th>Id</th>
                    <th>排序</th>
                    <th>图片</th>
                    <th>二维码</th>
                    <th>标题</th>
                    <th>上级分类</th>
                    <th>添加时间</th>
                    <th>修改时间</th>
                    <th>操作</th>
                </tr> 
            </thead>
            <tbody id="tb">
                <?php if(is_array($dataList) || $dataList instanceof \think\Collection): $i = 0; $__LIST__ = $dataList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td>
                        <input type="checkbox" lay-skin="primary" name="layNameCheckbox" lay-filter="layNameCheckbox" value="<?php echo $vo['id']; ?>">
                    </td>
                    <td><?php echo $vo['id']; ?></td>
                    <td>
                        <input type="text" value="<?php echo $vo['sort']; ?>" class="citrix_sort" onblur="change_table_val('cases','id','<?php echo $vo['id']; ?>','sort',this)">
                    </td>
                    <td>
                        <?php if(!(empty($vo['img']) || ($vo['img'] instanceof \think\Collection && $vo['img']->isEmpty()))): ?>
                        <a href="<?php echo citrixGetUrl($vo['img']); ?>" width="40" height="40" target="_blank"><img src="<?php echo citrixGetUrl($vo['img']); ?>" width="40" height="40"></a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(!(empty($vo['code_img']) || ($vo['code_img'] instanceof \think\Collection && $vo['code_img']->isEmpty()))): ?>
                        <a href="<?php echo citrixGetUrl($vo['code_img']); ?>" width="40" height="40" target="_blank"><img src="<?php echo citrixGetUrl($vo['code_img']); ?>" width="40" height="40"></a>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlentities($vo['title']); ?></td>
                    <td><?php echo citrixGetDataName($vo['data_cate_id']); ?></td>
                    <td><?php echo date("Y-m-d H:i:s",$vo['create_time']); ?></td>
                    <td><?php if(!(empty($vo['update_time']) || ($vo['update_time'] instanceof \think\Collection && $vo['update_time']->isEmpty()))): ?><?php echo date("Y-m-d H:i:s",$vo['update_time']); endif; ?></td>
                    <td>
                        <button type="button" class="layui-btn layui-btn-xs" onclick="publish(this)" data-url="<?php echo url('admin/cases/publish',['id'=>$vo['id']]); ?>">编辑</button>
                        <button type="button" class="layui-btn layui-btn-xs layui-btn-danger infoDelete" data-id="<?php echo $vo['id']; ?>">删除</button>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div class="layui-input-inline" style="width: 75px;margin-top: 10px;">
            <div class="layui-inline">
                <dl style="width: 200px;">
                    <dt style="float: left;width: 30px;margin-top: 5px;">
                        <input type="checkbox" lay-skin="primary" name="layTableCheckbox" lay-filter="layTableCheckbox">
                    </dt>
                    <dd style="float: left;width: 60px;background: #019688;color: #fff;padding: 5px 10px;<?php if(empty($dataList->render()) || ($dataList->render() instanceof \think\Collection && $dataList->render()->isEmpty())): ?> margin-bottom: 20px;<?php endif; ?>" class="batchDelete">
                        批量删除
                    </dd>
                </dl>
            </div>
            
        </div>
        <div style="padding:0 20px;"><?php echo $dataList->render(); ?></div> 
    </div>
    <script src="__JQ__/jquery.js"></script>
    <script type="text/javascript" src="__LAY__/layui.js"></script>
    <script type="text/javascript">
        layui.use(['form'], function()
        {
            var form     = layui.form;
             //删除
            $(document).on("click",".infoDelete",function()
            {
                var id = $(this).attr("data-id");
                layer.confirm('您确定要删除吗？', 
                {
                  btn: ['确定','取消']
                }, function(){
                    $.ajax({
                        url:"<?php echo url('admin/cases/infoDelete'); ?>",
                        data:{"id":id},
                        type:'post',
                        async: false,
                        dataType : 'json',
                        success:function(res) 
                        {
                            if(res.code == 1)
                            {
                                layer.alert(res.msg,{icon:1});
                                setTimeout(function(){
                                    location.href = location.href;
                                },1500)
                            }else
                            {
                                layer.alert(res.msg,{icon:2});
                            }
                        },
                        error:function()
                        {
                            layer.alert("Systematic anomaly！",{icon:2});
                        }
                    });
                });
            });
            //全选
            form.on('checkbox(layTableCheckbox)', function(data)
            {
                if (this.checked) {
                    $("#tb :checkbox").prop("checked", true);
                } else {
                    $("#tb :checkbox").prop("checked", false);
                }
                form.render('checkbox');
            });
            //批量删除
            $('.batchDelete').click(function(){
                var spCodesTemp = '' ;
                $("input:checkbox[name=layNameCheckbox]:checked").each(function(i){
                    if(0==i){
                        spCodesTemp = $(this).val();
                    }else{
                        spCodesTemp += (","+$(this).val());
                    }
                });
                if(spCodesTemp.length <= 0)
                {
                    layer.alert('请选择需要批量删除的内容',{icon:2});
                    return;
                }
                layer.confirm('您要批量删除当前选中的内容吗？', 
                {
                    btn: ['确认','取消'] 
                }, function(){
                    $.ajax({
                        url:"<?php echo url('admin/cases/batchDelete'); ?>"
                        ,type:'post'
                        ,data:{"uGather":spCodesTemp}
                        ,dataType : 'json'
                        ,success:function(res)
                        {
                            if(res.code == 1)
                            {
                                layer.alert(res.msg,{icon:1});
                                setTimeout(function(){
                                    location.href = location.href;
                                },1500)
                            }else
                            {
                                layer.alert(res.msg,{icon:2});
                            }
                        }
                    });
                });
            });
        });
        /**
         * [publish 新增/编辑]
         * @param  {[type]} e [description]
         * @return {[type]}   [description]
         */
        function publish(e)
        {
            layer.open({
                type: 2,
                title: '新增/编辑',
                shadeClose: true,
                shade: 0.8,
                area: ['90%', '90%'],
                content: $(e).attr("data-url"),
                end:function()
                { 
                    location.href = location.href;
                }
            });
        }
        /**
         * [change_table_val 快捷编辑]
         * @param  {[type]} table    [description]
         * @param  {[type]} id_name  [description]
         * @param  {[type]} id_value [description]
         * @param  {[type]} field    [description]
         * @param  {[type]} obj      [description]
         * @return {[type]}          [description]
         */
        function change_table_val(table,id_name,id_value,field,obj)
        { 
            var value = $(obj).val();
            $.ajax({
                url:"<?php echo url('admin/cases/changeTableVal'); ?>",
                data:{'table':table,'id_name':id_name,'id_value':id_value,'field':field,'value':value},
                type:'post',
                async: false,
                dataType : 'json',
                success:function(res) 
                {
                    layer.msg(res.msg,{offset: '50px',anim: 1});
                },
                error:function()
                {
                    layer.alert("Systematic anomaly！",{icon:2});
                }
            });
        }
    </script>
</body>
</html>