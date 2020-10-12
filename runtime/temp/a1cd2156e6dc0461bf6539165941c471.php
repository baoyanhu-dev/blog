<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"/www/users/HA611975/WEB/application/admin/view/link_url/index.html";i:1571046906;}*/ ?>
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
        .citrix_sort {
            height: 30px;
            line-height: 30px;
            width: 95%;
            border: 1px solid #fd0000;
        }
    </style>
</head>
<body class="childrenBody">
<form class="layui-form layui-form-pane" id="form_array">
    <div class="layui-form layui-col-sm8">
        <table class="layui-table">
            <colgroup>
                <col>
                <col width="500">
                <col width="80">
            </colgroup>
        <thead>
            <tr>
                <th>链接名称</th>
                <th>链接地址</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody id="citrixAddList1">
            <?php if(!(empty($getDataList1) || ($getDataList1 instanceof \think\Collection && $getDataList1->isEmpty()))): if(is_array($getDataList1) || $getDataList1 instanceof \think\Collection): $k1 = 0; $__LIST__ = $getDataList1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k1 % 2 );++$k1;if($k1 == 1): ?> 
            <tr>
                <td>
                    <input type="text" name="<?php echo aExplodeParam($vo['name_1']); ?>" class="citrix_sort" value="<?php echo $vo['value_1']; ?>">
                </td>
                <td>
                    <input type="text" name="<?php echo aExplodeParam($vo['name_2']); ?>" class="citrix_sort" value="<?php echo $vo['value_2']; ?>">
                </td>
                <td>
                    <button type="button" class="layui-btn layui-btn-warm layui-btn-xs citrixAddList" data-param="1">
                        <i class="fa fa-plus-square" aria-hidden="true">&nbsp;新增</i>
                    </button>
                </td>
            </tr>
            <?php else: ?>
            <tr id="<?php echo $vo['name_1']; ?>">
                <td>
                    <input type="text" name="<?php echo aExplodeParam($vo['name_1']); ?>" class="citrix_sort" value="<?php echo $vo['value_1']; ?>">
                </td>
                <td>
                    <input type="text" name="<?php echo aExplodeParam($vo['name_2']); ?>" class="citrix_sort" value="<?php echo $vo['value_2']; ?>">
                </td>
                <td>
                    <button type="button" class="layui-btn layui-btn-danger layui-btn-xs citrixDelList" data-param1="1" data-param2="<?php echo aGetParam($vo['name_2']); ?>">
                        <i class="fa fa-close" aria-hidden="true">&nbsp;删除</i>
                    </button>
                </td>
            </tr>
            <?php endif; endforeach; endif; else: echo "" ;endif; else: ?>
            <tr>
                <td>
                    <input type="text" name="name[1][1]" class="citrix_sort" value="">
                </td>
                <td>
                    <input type="text" name="link[1][1]" class="citrix_sort" value="">
                </td>
                <td>
                    <button type="button" class="layui-btn layui-btn-warm layui-btn-xs citrixAddList" data-param="1">
                        <i class="fa fa-plus-square" aria-hidden="true">&nbsp;新增</i>
                    </button>
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
        </table>
    </div>
    <div class="layui-form layui-col-sm8">
        <table class="layui-table">
            <colgroup>
                <col>
                <col width="500">
                <col width="80">
            </colgroup>
        <thead>
            <tr>
                <th>链接名称</th>
                <th>链接地址</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody id="citrixAddList2">
            <?php if(!(empty($getDataList2) || ($getDataList2 instanceof \think\Collection && $getDataList2->isEmpty()))): if(is_array($getDataList2) || $getDataList2 instanceof \think\Collection): $k1 = 0; $__LIST__ = $getDataList2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k1 % 2 );++$k1;if($k1 == 1): ?> 
            <tr>
                <td>
                    <input type="text" name="<?php echo aExplodeParam($vo['name_1']); ?>" class="citrix_sort" value="<?php echo $vo['value_1']; ?>">
                </td>
                <td>
                    <input type="text" name="<?php echo aExplodeParam($vo['name_2']); ?>" class="citrix_sort" value="<?php echo $vo['value_2']; ?>">
                </td>
                <td>
                    <button type="button" class="layui-btn layui-btn-warm layui-btn-xs citrixAddList" data-param="2">
                        <i class="fa fa-plus-square" aria-hidden="true">&nbsp;新增</i>
                    </button>
                </td>
            </tr>
            <?php else: ?>
            <tr id="<?php echo $vo['name_1']; ?>">
                <td>
                    <input type="text" name="<?php echo aExplodeParam($vo['name_1']); ?>" class="citrix_sort" value="<?php echo $vo['value_1']; ?>">
                </td>
                <td>
                    <input type="text" name="<?php echo aExplodeParam($vo['name_2']); ?>" class="citrix_sort" value="<?php echo $vo['value_2']; ?>">
                </td>
                <td>
                    <button type="button" class="layui-btn layui-btn-danger layui-btn-xs citrixDelList" data-param1="2" data-param2="<?php echo aGetParam($vo['name_2']); ?>">
                        <i class="fa fa-close" aria-hidden="true">&nbsp;删除</i>
                    </button>
                </td>
            </tr>
            <?php endif; endforeach; endif; else: echo "" ;endif; else: ?>
            <tr>
                <td>
                    <input type="text" name="name[2][1]" class="citrix_sort" value="">
                </td>
                <td>
                    <input type="text" name="link[2][1]" class="citrix_sort" value="">
                </td>
                <td>
                    <button type="button" class="layui-btn layui-btn-warm layui-btn-xs citrixAddList" data-param="2">
                        <i class="fa fa-plus-square" aria-hidden="true">&nbsp;新增</i>
                    </button>
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
        </table>
    </div>
    <div class="layui-form layui-col-sm8">
        <table class="layui-table">
            <colgroup>
                <col>
                <col width="500">
                <col width="80">
            </colgroup>
        <thead>
            <tr>
                <th>链接名称</th>
                <th>链接地址</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody id="citrixAddList3">
            <?php if(!(empty($getDataList3) || ($getDataList3 instanceof \think\Collection && $getDataList3->isEmpty()))): if(is_array($getDataList3) || $getDataList3 instanceof \think\Collection): $k1 = 0; $__LIST__ = $getDataList3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k1 % 2 );++$k1;if($k1 == 1): ?> 
            <tr>
                <td>
                    <input type="text" name="<?php echo aExplodeParam($vo['name_1']); ?>" class="citrix_sort" value="<?php echo $vo['value_1']; ?>">
                </td>
                <td>
                    <input type="text" name="<?php echo aExplodeParam($vo['name_2']); ?>" class="citrix_sort" value="<?php echo $vo['value_2']; ?>">
                </td>
                <td>
                    <button type="button" class="layui-btn layui-btn-warm layui-btn-xs citrixAddList" data-param="3">
                        <i class="fa fa-plus-square" aria-hidden="true">&nbsp;新增</i>
                    </button>
                </td>
            </tr>
            <?php else: ?>
            <tr id="<?php echo $vo['name_1']; ?>">
                <td>
                    <input type="text" name="<?php echo aExplodeParam($vo['name_1']); ?>" class="citrix_sort" value="<?php echo $vo['value_1']; ?>">
                </td>
                <td>
                    <input type="text" name="<?php echo aExplodeParam($vo['name_2']); ?>" class="citrix_sort" value="<?php echo $vo['value_2']; ?>">
                </td>
                <td>
                    <button type="button" class="layui-btn layui-btn-danger layui-btn-xs citrixDelList" data-param1="3" data-param2="<?php echo aGetParam($vo['name_2']); ?>">
                        <i class="fa fa-close" aria-hidden="true">&nbsp;删除</i>
                    </button>
                </td>
            </tr>
            <?php endif; endforeach; endif; else: echo "" ;endif; else: ?>
            <tr>
                <td>
                    <input type="text" name="name[3][1]" class="citrix_sort" value="">
                </td>
                <td>
                    <input type="text" name="link[3][1]" class="citrix_sort" value="">
                </td>
                <td>
                    <button type="button" class="layui-btn layui-btn-warm layui-btn-xs citrixAddList" data-param="3">
                        <i class="fa fa-plus-square" aria-hidden="true">&nbsp;新增</i>
                    </button>
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
        </table>
    </div>
    <div class="layui-form layui-col-sm8">
        <table class="layui-table">
            <colgroup>
                <col>
                <col width="500">
                <col width="80">
            </colgroup>
        <thead>
            <tr>
                <th>链接名称</th>
                <th>链接地址</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody id="citrixAddList4">
            <?php if(!(empty($getDataList4) || ($getDataList4 instanceof \think\Collection && $getDataList4->isEmpty()))): if(is_array($getDataList4) || $getDataList4 instanceof \think\Collection): $k1 = 0; $__LIST__ = $getDataList4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k1 % 2 );++$k1;if($k1 == 1): ?> 
            <tr>
                <td>
                    <input type="text" name="<?php echo aExplodeParam($vo['name_1']); ?>" class="citrix_sort" value="<?php echo $vo['value_1']; ?>">
                </td>
                <td>
                    <input type="text" name="<?php echo aExplodeParam($vo['name_2']); ?>" class="citrix_sort" value="<?php echo $vo['value_2']; ?>">
                </td>
                <td>
                    <button type="button" class="layui-btn layui-btn-warm layui-btn-xs citrixAddList" data-param="4">
                        <i class="fa fa-plus-square" aria-hidden="true">&nbsp;新增</i>
                    </button>
                </td>
            </tr>
            <?php else: ?>
            <tr id="<?php echo $vo['name_1']; ?>">
                <td>
                    <input type="text" name="<?php echo aExplodeParam($vo['name_1']); ?>" class="citrix_sort" value="<?php echo $vo['value_1']; ?>">
                </td>
                <td>
                    <input type="text" name="<?php echo aExplodeParam($vo['name_2']); ?>" class="citrix_sort" value="<?php echo $vo['value_2']; ?>">
                </td>
                <td>
                    <button type="button" class="layui-btn layui-btn-danger layui-btn-xs citrixDelList" data-param1="4" data-param2="<?php echo aGetParam($vo['name_2']); ?>">
                        <i class="fa fa-close" aria-hidden="true">&nbsp;删除</i>
                    </button>
                </td>
            </tr>
            <?php endif; endforeach; endif; else: echo "" ;endif; else: ?>
            <tr>
                <td>
                    <input type="text" name="name[4][1]" class="citrix_sort" value="">
                </td>
                <td>
                    <input type="text" name="link[4][1]" class="citrix_sort" value="">
                </td>
                <td>
                    <button type="button" class="layui-btn layui-btn-warm layui-btn-xs citrixAddList" data-param="4">
                        <i class="fa fa-plus-square" aria-hidden="true">&nbsp;新增</i>
                    </button>
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
        </table>
    </div>
    <input type="hidden" id="citrixParam1" value="<?php echo $citrixParam+2; ?>">
    <input type="hidden" id="citrixParam2" value="<?php echo $citrixParam+2; ?>">
    <input type="hidden" id="citrixParam3" value="<?php echo $citrixParam+2; ?>">
    <input type="hidden" id="citrixParam4" value="<?php echo $citrixParam+2; ?>">
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
                url:"<?php echo url('admin/linkUrl/publish'); ?>",
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
                        },2000);
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

        //新增
        $(".citrixAddList").click(function()
        {
            var param = $(this).attr('data-param');
            var citrixParam = $("#citrixParam"+param).val();
            var citrixHtml = '<tr id="name_'+param+'_'+citrixParam+'">';
               citrixHtml += '<td>';
               citrixHtml += '<input type="text" name="name['+param+']['+citrixParam+']" value="" class="citrix_sort">';
               citrixHtml += '</td>';
               citrixHtml += '<td>';
               citrixHtml += '<input type="text" name="link['+param+']['+citrixParam+']" value="" class="citrix_sort">';
               citrixHtml += '</td>';
               citrixHtml += ' <td>';
               citrixHtml += '<button type="button" class="layui-btn layui-btn-danger layui-btn-xs citrixDelList" data-param1="'+param+'" data-param2="'+citrixParam+'" >';
               citrixHtml += '<i class="fa fa-close" aria-hidden="true">&nbsp;删除</i>';
               citrixHtml += '</button>';
               citrixHtml += '</td>';
               citrixHtml += '</tr>';
            $("#citrixAddList"+param).append(citrixHtml);
            $("#citrixParam"+param).val(Number(citrixParam)+1);
            form.render();
        });
        //删除
        $(document).on('click', '.citrixDelList', function() 
        {
            var param1 = $(this).attr('data-param1');
            var param2 = $(this).attr('data-param2');
            layer.alert('你确定要删除么？', 
            {
                btn: ['确定', '取消']
                ,icon:3
                ,yes: function(index)
                {
                    $("#name_"+param1+"_"+param2).remove();
                    layer.closeAll();
                }
            });
        });
	});
</script>
</body>
</html>