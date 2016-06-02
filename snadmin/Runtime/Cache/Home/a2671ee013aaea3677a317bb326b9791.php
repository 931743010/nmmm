<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/sncss/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">表单</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
      <form id="form1" name="form1" method="post" action="/admin.php/Home/Index/usercl">
	  <input name="UE_account"  type="hidden" class="dfinput" value="<?php echo ($userdata['ue_account']); ?>" />
    <ul class="forminfo">
	<li><label>会员編号</label><input name="UE_account1" disabled="true " type="text" class="dfinput" value="<?php echo ($userdata['ue_account']); ?>" /><i>不可修改</i></li>
	<li><label>推荐人</label><input name="UE_accName" disabled="true " type="text" class="dfinput" value="<?php echo ($userdata['ue_accname']); ?>"/><i>不可修改</i></li>
	<li><label>报单中心</label><input name="UE_theme" disabled="true " type="text" class="dfinput" value="<?php echo ($userdata['ue_theme']); ?>"/><i>不可修改</i></li>
	<li style="display:none;"><label>是否激活</label><?php if($userdata['ue_check'] == 0): ?><cite><input name="UE_check" type="radio" value="1" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="UE_check" type="radio" value="0" checked="checked" />否</cite><?php else: ?><cite><input name="UE_check" type="radio" value="1" checked="checked" />
	是&nbsp;&nbsp;&nbsp;&nbsp;<input name="UE_check" type="radio" value="0" />
	否</cite><?php endif; ?></li>
    <li style="display:none;"><label>是否经理</label><?php if($userdata['sfjl'] == 0): ?><cite><input name="UE_stop" type="radio" value="1" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="UE_stop" type="radio" value="0" checked="checked" />否</cite><?php else: ?><cite><input name="UE_stop" type="radio" value="1" checked="checked" />
	是&nbsp;&nbsp;&nbsp;&nbsp;<input name="UE_stop" type="radio" value="0" />
	否</cite><?php endif; ?></li>
    <li><label>是否封號</label><?php if($userdata['UE_status'] == 0): ?><cite><input name="UE_status" type="radio" value="1" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="UE_status" type="radio" value="0" checked="UE_status" />否</cite><?php else: ?><cite><input name="UE_status" type="radio" value="1" checked="checked" />
	是&nbsp;&nbsp;&nbsp;&nbsp;<input name="UE_check" type="radio" value="0" />
	否</cite><?php endif; ?></li>
    <li><label>一級密码</label><input name="UE_password" type="text" class="dfinput" /><i>不修改请留空</i></li>
    <li><label>二級密码</label><input name="UE_secpwd" type="text" class="dfinput" /><i>不修改请留空</i></li>
    <li><label>姓名</label><input name="UE_truename" type="text" class="dfinput" value="<?php echo ($userdata['ue_truename']); ?>"/><i></i></li>
	<li><label>身份证</label><input name="UE_sfz" type="text" class="dfinput" value="<?php echo ($userdata['ue_sfz']); ?>"/><i></i></li>
	<li><label>邮箱</label><input name="email" type="text" class="dfinput" value="<?php echo ($userdata['email']); ?>"/><i></i></li>
	<li><label>QQ</label><input name="UE_qq" type="text" class="dfinput" value="<?php echo ($userdata['ue_qq']); ?>"/><i></i></li>
	<li><label>手機</label><input name="UE_phone" type="text" class="dfinput" value="<?php echo ($userdata['ue_phone']); ?>"/><i></i></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
    </ul>
      </form>
    
    </div>


</body>

</html>