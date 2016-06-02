<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <script type="text/javascript" src='/Public/Js/jquery-1.7.2.min.js'></script>
    <link rel="stylesheet" href="/Public/Uploadify/uploadify.css"/>
    <script type="text/javascript" src='/Public/Uploadify/jquery.uploadify.min.js'></script>
    <script type='text/javascript'>
        var PUBLIC = '/Public';
        var uploadUrl = '<?php echo U("Common/uploadFace");?>';
        var ROOT = '';
    </script>

</head>


<body>
<div class="rightinfo">


    <form action="/admin.php/Home/Code/codeStatusEdit"  name="xgmm" id="xgmm" method="post">

        <table width="90%" border="0" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC" class="tablebg" id="table1">
            <tr>
                <td width="126" bgcolor="#FFFFFF" class="tbkey" >当前状态：</td>
                <td width="1028" bgcolor="#FFFFFF" class="tbval" ><?php echo ($statusTxt); ?></td>
            </tr>

            <!--會員折扣-->
            <!--基本信息-->

            <tr>
                <td bgcolor="#FFFFFF" class="tbkey" >设置状态：</td>
                <td bgcolor="#FFFFFF" class="tbval">
                    <select name="status">
                        <option value="0" <?php if($status == 0): ?>selected<?php endif; ?> >关闭</option>
                        <option value="1" <?php if($status == 1): ?>selected<?php endif; ?> >开启</option>
                    </select>
                </td>
            </tr>
            <!--微信填寫-->
        </table>
        <!--基本信息結束-->
        <div id="state_lockcon" ></div>
        <table class="tablebg" id="table3" style="clear:both">
            <TR>
                <td colspan="3" >
                    <input   type="submit" class="button_text"  id="btn" value="確定">
                </TD>
            </TR>
        </table>
    </form>



</div>

</body>

</html>