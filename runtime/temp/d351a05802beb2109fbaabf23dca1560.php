<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\phpstudy_pro\WWW\tp.com/application/admin\view\adverts\index.html";i:1566033952;}*/ ?>
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
        <button type="button" class="layui-btn" onclick="publish(this)" data-url="<?php echo url('admin/adverts/publish'); ?>">新增</button>
    </blockquote> 
    <div class="layui-form">
        <table class="layui-table">
            <colgroup>
                <col width="50">
                <col width="65">
                <col width="80">
                <col width="250">
                <col >
                <col width="165">
                <col width="165">
            </colgroup>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>排序</th>
                    <th>图片</th>
                    <th>广告名称</th>
                    <th>广告地址</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($dataList) || $dataList instanceof \think\Collection): $i = 0; $__LIST__ = $dataList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $vo['id']; ?></td>
                    <td>
                        <input type="text" value="<?php echo $vo['sort']; ?>" class="citrix_sort" onblur="change_table_val('adverts','id','<?php echo $vo['id']; ?>','sort',this)">
                    </td>
                    <td>
                        <?php if(!(empty($vo['img']) || ($vo['img'] instanceof \think\Collection && $vo['img']->isEmpty()))): ?>
                        <a href="<?php echo citrixGetUrl($vo['img']); ?>" width="40" height="40" target="_blank"><img src="<?php echo citrixGetUrl($vo['img']); ?>" width="40" height="40"></a>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $vo['str']; ?><?php echo htmlentities($vo['title']); ?></td>
                    <td><?php echo htmlentities($vo['content']); ?></td>
                    <td><?php echo date("Y-m-d H:i:s",$vo['create_time']); ?></td>
                    <td>
                        <?php if($vo['level'] >= 2): ?>
                        <button type="button" class="layui-btn layui-btn-xs layui-btn-disabled">&nbsp;+&nbsp;</button>
                        <?php else: ?>
                        <button type="button" class="layui-btn layui-btn-xs layui-btn-normal" onclick="publish(this)" data-url="<?php echo url('admin/adverts/publish',['pid'=>$vo['id']]); ?>">&nbsp;+&nbsp;</button>
                        <?php endif; ?>
                        <button type="button" class="layui-btn layui-btn-xs" onclick="publish(this)" data-url="<?php echo url('admin/adverts/publish',['id'=>$vo['id']]); ?>">编辑</button>
                        <button type="button" class="layui-btn layui-btn-xs layui-btn-danger infoDelete" data-id="<?php echo $vo['id']; ?>">删除</button>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
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
                        url:"<?php echo url('admin/adverts/infoDelete'); ?>",
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
                url:"<?php echo url('admin/adverts/changeTableVal'); ?>",
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