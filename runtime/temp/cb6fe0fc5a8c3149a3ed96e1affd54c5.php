<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\phpStudy\WWW\majiang/application/admin\view\message\index.html";i:1567764584;}*/ ?>
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
    <form class="layui-form serch" action="<?php echo url('admin/message/index'); ?>" method="post">
        <div class="layui-form-item" style="float: left;">
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
                <col >
                <col width="300">
                <col width="165">
                <col width="165">
                <col width="165">
            </colgroup>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>昵称</th>
                    <th>邮箱</th>
                    <th>ip地址</th>
                    <th>提交时间</th>
                    <th>操作</th>
                </tr> 
            </thead>
            <tbody id="tb">
                <?php if(is_array($dataList) || $dataList instanceof \think\Collection): $i = 0; $__LIST__ = $dataList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $vo['id']; ?></td>
                    <td><?php echo htmlentities($vo['name']); ?></td>
                    <td><?php echo htmlentities($vo['email']); ?></td>
                    <td><?php echo htmlentities($vo['ip']); ?></td>
                    <td><?php echo date("Y-m-d H:i:s",$vo['create_time']); ?></td>
                    <td>
                        <button type="button" class="layui-btn layui-btn-xs" onclick="publish(this)" data-url="<?php echo url('admin/message/publish',['id'=>$vo['id']]); ?>">查看</button>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div style="padding:0 20px;"><?php echo $dataList->render(); ?></div> 
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
    </script>
</body>
</html>