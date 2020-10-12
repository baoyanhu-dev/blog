<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\phpstudy_pro\WWW\tp.com/application/admin\view\fenzhan\index.html";i:1577499862;}*/ ?>
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
    <button type="button" class="layui-btn" onclick="publish(this)" data-url="<?php echo url('admin/fenzhan/publish'); ?>">新增</button>
</blockquote>
<p>
    <span style="color: red">*点击生成页面后请耐心等候提示在进行其他操作!</span>
</p>
<form class="layui-form serch" action="" method="post">
    <div class="layui-form-item" style="float: left;">
        <div class="layui-input-inline">
            <input type="text" name="keywords" lay-verify="title" autocomplete="off" placeholder="请输入分站名称" class="layui-input layui-btn-sm" value="">
        </div>
        <button class="layui-btn layui-btn-danger " lay-submit="" lay-filter="serch"> 立即提交</button>
    </div>
</form>
<div class="layui-form">
    <table class="layui-table">
        <colgroup>
            <col width="20">
            <col width="60">
            <col width="50">
            <col width="165">
            <col width="300">
            <col width="300">
            <col width="300">
        </colgroup>
        <thead>
        <tr>
            <th>Id</th>
            <th>地区</th>
            <th>文件名</th>
            <th>分站名称</th>
            <th>关键词</th>
            <th>网站描述</th>
            <th>链接</th>
            <th>排序</th>
            <th>编辑时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody id="tb">
        <tr>
            <?php if(is_array($dataList) || $dataList instanceof \think\Collection): $i = 0; $__LIST__ = $dataList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td id="id"><?php echo $vo['id']; ?></td>
            <td><?php echo $vo['addressname']; ?></td>
            <td><?php echo $vo['city']; ?></td>
            <td><?php echo $vo['title']; ?></td>
            <td><?php echo $vo['keyword']; ?></td>
            <td><?php echo $vo['des']; ?></td>
            <td><?php echo $vo['link']; ?></td>
            <td><?php echo $vo['sort']; ?></td>
            <td><?php echo date("Y-m-d H:i:s",$vo['create_time']); ?></td>
            <td>
                <button type="button" class="layui-btn layui-btn-xs" onclick="publish(this)" data-url="<?php echo url('admin/fenzhan/publish',['id'=>$vo['id']]); ?>">编辑</button>
                <button type="button" class="layui-btn layui-btn-xs" onclick='address(this,<?php echo $vo['id']; ?>)' style="background: #00b7ee;">生成页面</button>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tr>
        </tbody>
    </table>
    <div style="padding:0 20px;"></div>
</div>
<script src="__JQ__/jquery.js"></script>
<script type="text/javascript" src="__LAY__/layui.js"></script>
<script type="text/javascript">
    layui.use(['form'], function()
    {
        var form     = layui.form;
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
            title: '新增城市分站/编辑城市分站',
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
     * [publish 生成分站]
     */
    function address(e,id)
    {
        $.ajax({
            url:"<?php echo url('admin/fenzhan/address'); ?>",
            data:{id:id},
            type:'post',
            async: false,
            dataType : 'json',
            success:function(res)
            {
                if(res.code == 1)
                {
                    layer.msg(res.msg);
                }else if(res.code==2){
                    layer.msg(res.msg);
                }

            },
            error:function()
            {
                layer.alert("生成成功！",{icon:1});
            }
        });
        return false;
    }
</script>
</body>
</html>