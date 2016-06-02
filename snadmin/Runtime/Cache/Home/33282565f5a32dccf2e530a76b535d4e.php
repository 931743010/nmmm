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
      <form action="/admin.php/Home/Index/tgbz_list_sd_cl"  name="xgmm" id="xgmm" method="post">

   
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php echo ($aab[c]=0); ?> 提供用户:<?php echo ($aab[a]=$tgbzuser["user"]); ?>  提供金额:<?php echo ($tgbzuser["jb"]); ?> </td>
    <td align="right"><span id="yxje" style="color:#FF0000;">已选金额和=0</span>
      <input name="arrid" id="arrid" type="hidden" value="" />
	  <input name="arrzs" id="arrzs" type="hidden" value="" />
	  <input name="user" id="user" type="hidden" value="<?php echo ($tgbzuser["user"]); ?>" />
	  <input name="jb" id="jb" type="hidden" value="<?php echo ($tgbzuser["jb"]); ?>" />
	  <input name="pid" id="pid" type="hidden" value="<?php echo ($tgbzuser["id"]); ?>" />
      <input name="" type="submit" class="btn" value="确认匹配"/></td>
  </tr>
</table>

    
<br />

    
   
    <table class="tablelist">
    	<thead>
    	<tr>
        <th>编号<i class="sort"><img src="/sncss/images/px.gif" /></i></th>
        <th>接受会员</th>
        <th>支付方式</th>
       
        <th>接受状态</th>
        <th>确认状态</th>
        <th>接受昵称</th>
		<th>接受时间</th>
		 <th>接受金额</th>
		 <th>是否匹配过</th>
		 <th>钱包</th>
		 <th>接受操作</th>
        </tr>
        </thead>
        <tbody>
		
		<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
		 <td><?php echo ($v["id"]); ?></td>
		 <td><?php echo ($aab[b]=$v["user"]); ?></td>
		  <td>
		  <?php if($v["zffs1"] == 1): ?>银行<?php endif; ?>
		  <?php if($v["zffs2"] == 1): ?>支付宝<?php endif; ?>
		  <?php if($v["zffs3"] == 1): ?>微信<?php endif; ?>		  </td>
		   
		    <td><?php if($v["zt"] == 0): ?>未匹配<?php else: ?>已匹配<?php endif; ?></td>
        
        <td>
		
		<?php if($v["qr_zt"] == 0): ?>等待中<?php endif; ?>
											<?php if($v["qr_zt"] == 1): ?>待付款<?php endif; ?>
											<?php if($v["qr_zt"] == 2): ?>待确认收款<?php endif; ?>
											<?php if($v["qr_zt"] == 3): ?>已确认<?php endif; ?>		</td>
        <td><?php echo ($v["user_nc"]); ?></td>
        <td><?php echo ($v["date"]); ?></td>
		<td><?php echo ($v["jb"]); ?></td>
        <td><?php echo (user_sfxt($aab)); ?></td>
        <td><?php if($v["qb"] == 0): ?>余额钱包<?php endif; ?>
		<?php if($v["qb"] == 2): ?>推荐钱包<?php endif; ?>
		<?php if($v["qb"] == 1): ?>经理钱包<?php endif; ?></td>
        <td><label><input name="id" type="checkbox" id="<?php echo ($v["jb"]); ?>" class="dfdfe" value="<?php echo ($v["id"]); ?>" /></label></td>
        </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
	</form>
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
	
	$(function(){ 
$(".dfdfe").change(function() { 

var obj = document.getElementsByName("id");//选择所有name="interest"的对象，返回数组    
            var s=[];//如果这样定义var s;变量s中会默认被赋个null值
			document.getElementById('arrid').value = '';
			
            for(var i=0;i<obj.length;i++){
                 if(obj[i].checked){ //取到对象数组后，我们来循环检测它是不是被选中
                 s[i]=obj[i].id;   //如果选中，将value添加到变量s中

				document.getElementById('arrid').value += obj[i].value+',';
				 
				 
                 }else{
			     s[i]=0;
			     }
	        }
var b=0;
for(var i=0;i<s.length;i++){
 b += s[i]/1.0;
}

document.getElementById('yxje').innerHTML = '已选金额和='+b;
document.getElementById('arrzs').value = b;
}); 
}); 
	
	
	
	
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

</body>

</html>