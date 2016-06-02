<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>无标题文档</title>
    <link href="/sncss/css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/zTree_v3/css/zTreeStyle/zTreeStyle.css" type="text/css"/>
    <script type=text/javascript src="/zTree_v3/js/jquery.min.js"></script>
    <script type="text/javascript" src="/zTree_v3/js/jquery.ztree.core-3.5.js"></script>

    <script type=text/javascript>
        var setting = {
            view: {
                showLine: true
            },
            data: {
                simpleData: {
                    enable: true
                }
            }
        };

        var zNodes = [
            {id: 1, pId: 0, name: "父節點1 - 展開", open: true},
            {id: 11, pId: 1, name: "父節點11 - 摺疊"},
            {id: 111, pId: 11, name: "葉子節點111"},
            {id: 112, pId: 11, name: "葉子節點112"},
            {id: 113, pId: 11, name: "葉子節點113"},
            {id: 114, pId: 11, name: "葉子節點114"},
            {id: 12, pId: 1, name: "父節點12 - 摺疊"},
            {id: 121, pId: 12, name: "葉子節點121"},
            {id: 122, pId: 12, name: "葉子節點122"},
            {id: 123, pId: 12, name: "葉子節點123"},
            {id: 124, pId: 12, name: "葉子節點124"},
            {id: 13, pId: 1, name: "父節點13 - 沒有子節點", isParent: true},
            {id: 2, pId: 0, name: "父節點2 - 摺疊"},
            {id: 21, pId: 2, name: "父節點21 - 展開", open: true},
            {id: 211, pId: 21, name: "葉子節點211"},
            {id: 212, pId: 21, name: "葉子節點212"},
            {id: 213, pId: 21, name: "葉子節點213"},
            {id: 214, pId: 21, name: "葉子節點214"},
            {id: 22, pId: 2, name: "父節點22 - 摺疊"},
            {id: 221, pId: 22, name: "葉子節點221"},
            {id: 222, pId: 22, name: "葉子節點222"},
            {id: 223, pId: 22, name: "葉子節點223"},
            {id: 224, pId: 22, name: "葉子節點224"},
            {id: 23, pId: 2, name: "父節點23 - 摺疊"},
            {id: 231, pId: 23, name: "葉子節點231"},
            {id: 232, pId: 23, name: "葉子節點232"},
            {id: 233, pId: 23, name: "葉子節點233"},
            {id: 234, pId: 23, name: "葉子節點234"},
            {id: 3, pId: 0, name: "父節點3 - 沒有子節點", isParent: true}
        ];


        $(document).ready(function () {
            var $user1 = $('#user1').val();
            $.ajax({
                type: "post",
                dataType: "json",
                global: false,
                url: "/admin.php/Home/Common/getTree",
                data: {
                    user1: $user1
                },
                success: function (data, textStatus) {
                    if (data.status == 0) {
                        zNodes1 = data.data;
                        $.fn.zTree.init($("#treeDemo"), setting, zNodes1);
                    } else {
                        alert("您還沒有");
                    }

                    return;
                }

            });

            //$.fn.zTree.init($("#treeDemo"), setting, zNodes);
        });


        $(function () {


            $('#btn').click(function () {

                var $user = $('#user').val();
                $.ajax({
                    type: "post",
                    dataType: "json",
                    global: false,

                    url: "/admin.php/Home/Common/getTreeso",
                    data: {
                        user: $user
                    },
                    success: function (data, textStatus) {
                        if (data.status == 0) {
                            //alert(data.nr);

                            zNodes1 = data.data;
                            $.fn.zTree.init($("#treeDemo"), setting, zNodes1);
                        } else {
                            alert(data.data);
                        }

                        return;
                    }

                });


            })


        })


    </script>
</head>
<style>
    input {
        border: 1px #cccccc solid;
        height: 25px;
        line-height: 25px;
    }
</style>
<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">提现设置</a></li>
    </ul>
</div>

<div class="rightinfo">
    <div class="tools"></div>
    <table class="tablelist">
        <form action="<?php echo U('Home/Index/txset');?>" method="post">
            <thead>
            <tr>
                <th width="15%">提现关闭</th>
                <th width="85%">
					<select name="txstatus">
						<option <?php if($txstatus == 1): ?>selected<?php endif; ?> value="1">开启</option>
						<option <?php if($txstatus == 0): ?>selected<?php endif; ?> value="0">关闭</option>
					</select>
				</th>
            </tr>
            <tr>
                <th width="15%">提现最低金额</th>
                <th width="85%"><input name="txthemin" value="<?php echo ($txthemin); ?>" type="number" />元</th>
            </tr>
            <tr>
                <th width="15%">提现费率</th>
                <th width="85%"><input name="txrate" value="<?php echo ($txrate); ?>" type="number" />%</th>
            </tr>
            <tr>
                <th width="15%">提现费封顶</th>
                <th width="85%"><input name="txthemax" value="<?php echo ($txthemax); ?>" type="number" />元</th>
            </tr>
            <tr>
                <th width="15%">提现倍数</th>
                <th width="85%">必须<input name="txthebeishu" value="<?php echo ($txthebeishu); ?>" type="number" />元的整倍数</th>
            </tr>
            <tr>
                <th width="15%">经理奖提现限制</th>
                <th width="85%"><input type="" value="<?php echo ($jl_start); ?>" name="jl_start">元 &mdash; <input type="" value="<?php echo ($jl_e); ?>" name="jl_e">元 必须<input type="" value="<?php echo ($jl_beishu); ?>" name="jl_beishu">元的整倍数</th>
            </tr>
            <tr>
                <th width="15%">推荐奖提现限制</th>
                <th width="85%"><input type="" value="<?php echo ($tj_start); ?>" name="tj_start">元 &mdash; <input type="" value="<?php echo ($tj_e); ?>" name="tj_e">元 必须<input type="" value="<?php echo ($tj_beishu); ?>" name="tj_beishu">元的整倍数</th>
            </tr>
            <tr>
                <th></th>
                <th><input name="submit" value="提交" type="submit"/></th>
            </tr>
            </thead>
        </form>
    </table>

</div>
</body>
</html>