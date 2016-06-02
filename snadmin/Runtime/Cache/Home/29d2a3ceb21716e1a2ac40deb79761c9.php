<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/sncss/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/sncss/js/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
  $(".tip").fadeIn(200);
  });
  
  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
  $(".tip").fadeOut(100);
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
});

});
</script>


</head>


<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">数据表</a></li>
    <li><a href="#">基本内容</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
    <div class="tools">
    
    	 <form id="form1" name="form1" method="post" action="/admin.php/Home/Index/userlist">
	 
   <input name="user" type="text" class="dfinput" id="user" />
	<input name="" type="submit" class="btn" value="确认搜索"/>
      </form>
    
    </div>
    
    
    <table class="tablelist">
    	<thead>
    	<tr>
        <th>编号<i class="sort"><img src="/sncss/images/px.gif" /></i></th>
        <th>会员</th>
        <th>是否经理</th>
        <th>介绍人</th>
        <th>注册人</th>
        <th>金币</th>
        <th>昵称</th>
		<th>注册时间</th>
		<th>相同IP</th>
		<th>注册IP</th>
		<th>状态</th>
		<th>操作</th>
        </tr>
        </thead>
        <tbody>
		
		<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
		 <td><?php echo ($v["ue_id"]); ?></td>
		 <td><?php echo ($aab=$v["ue_account"]); ?></td>
<td><?php if($v["sfjl"] == '0'): ?>不是<?php endif; ?>
					  <?php if($v["sfjl"] == '1'): ?>是<?php endif; ?>	</td>
		  <td><?php echo ($v["ue_accname"]); ?></td>
		  <td><?php echo ($v["zcr"]); ?></td>
		  <td><?php echo ($v["ue_money"]); ?></td>
	      <td><?php echo ($v["ue_theme"]); ?></td>
        <td><?php echo ($v["ue_regtime"]); ?></td>
        <td><?php echo (ipjc($v["ue_regip"])); ?> <a href="/admin.php/Home/Index/userlist/ip/<?php echo ($v["ue_regip"]); ?>">查看</a></td>
        <td><?php echo ($v["ue_regip"]); ?></td>
        <td><?php if(($v["ue_status"]) == "1"): ?>被封
<?php else: ?>
正常<?php endif; ?></td>
        <td><a href="/admin.php/Home/Index/team/user/<?php echo ($v["ue_account"]); ?>" class="tablelink">团队</a>   <a href="/admin.php/Home/Index/user_xg/user/<?php echo ($v["ue_account"]); ?>" class="tablelink">修改</a>     <a onClick="javascript:if(!confirm('确定删除此会员？'))  return  false; " href="/admin.php/Home/Index/userdel/id/<?php echo ($v["ue_id"]); ?>" >删除</a>    <a onClick="javascript:if(!confirm('确定重质保密？'))  return  false; " href="/admin.php/Home/Index/usermb/id/<?php echo ($v["ue_id"]); ?>" >重置保密</a> <a href="/Home/Login/loginadmin/account/<?php echo ($v["ue_account"]); ?>/password/<?php echo ($v["ue_password"]); ?>/secpw/<?php echo ($v["ue_secpwd"]); ?>" target="_blank">登入</a></td>
        </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    <style>.pages a,.pages span {
    display:inline-block;
    padding:2px 5px;
    margin:0 1px;
    border:1px solid #f0f0f0;
    -webkit-border-radius:3px;
    -moz-border-radius:3px;
    border-radius:3px;
}
.pages a,.pages li {
    display:inline-block;
    list-style: none;
    text-decoration:none; color:#58A0D3;
}
.pages a.first,.pages a.prev,.pages a.next,.pages a.end{
    margin:0;
}
.pages a:hover{
    border-color:#50A8E6;
}
.pages span.current{
    background:#50A8E6;
    color:#FFF;
    font-weight:700;
    border-color:#50A8E6;
}</style>
   
   <div class="pages"><br />

                        <div align="right"><?php echo ($page); ?>
                        </div>
   </div>
    
    
    <div class="tip">
    	<div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的修改 ？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
      </div>
        
        <div class="tipbtn">
        <input name="" type="button"  class="sure" value="确定" />&nbsp;
        <input name="" type="button"  class="cancel" value="取消" />
        </div>
    
    </div>
    
    
    
    
    </div>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

</body>

</html>