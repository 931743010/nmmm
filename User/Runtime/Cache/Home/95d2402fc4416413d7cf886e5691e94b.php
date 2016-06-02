<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full sidebar sidebar-full sticky-sidebar"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 fluid top-full sticky-top sidebar sidebar-full sticky-sidebar"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 fluid top-full sticky-top sidebar sidebar-full sticky-sidebar"> <![endif]-->
<!--[if gt IE 8]> <html class="ie gt-ie8 fluid top-full sticky-top sidebar sidebar-full sticky-sidebar"> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
<head>


<script type="text/javascript" src="/bitStyle/js/jquery.js"></script>
<script type="text/javascript" src="/bitStyle/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/bitStyle/js/modernizr.js"></script>
<script type="text/javascript" src="/bitStyle/js/selectivizr.js"></script>
<script type="text/javascript" src="/bitStyle/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/bitStyle/js/scripts.js"></script>
<script type="text/javascript" src="/bitStyle/js/remaining.js"></script>
<script type="text/javascript" src="/bitStyle/js/fn_number_format.js"></script>
<script type="text/javascript" src="/bitStyle/js/9acba5c0d35076a1ccd574dfc21b8b2b.js"></script>
		<script type="text/javascript">
			var _gNow = new Date();
			
			setInterval(function(){
				$.ajax({
					url: '?aj=1&type=check_login',
					data: {'uid': 82662186},
					dataType: 'json',
					error: function(){},
					success: function(data){
						if(data.loggedout == '1'){
							window.location.href = "/bitStyle/zh-CN/";
						}
					}
				})
			}, 300000); //5min
		</script>
		

<script type="text/javascript">
jQuery(document).ready(function($){
	var gdBtn = $('#gdBtn');
	var pdBtn = $('#pdBtn');
	
	pdBtn.click(function(){
		$(this).toggleClass('active');
		gdBtn.removeClass('active');
		$('#pdWrap').stop(true, false).slideToggle('fast');
		$('#gdWrap').stop(true, false).slideUp('fast').removeClass('open');
		return false;
	});
	// if user status is freeze or just unblock and not yet do the maintain
	gdBtn.click(function(){
		$(this).toggleClass('active');
		pdBtn.removeClass('active');
		$('#gdWrap').stop(true, false).slideToggle('fast');
		$('#pdWrap').stop(true, false).slideUp('fast').removeClass('open');
		return false;
	});
		
	// Tooltips
	$('.tip').tooltip({placement: 'top'});
	$('.tipr').tooltip({placement: 'right'});
	$('.tipb').tooltip({placement: 'bottom'});
	$('.tipl').tooltip({placement: 'left'});
	
	$("a[href='#top']").click(function() {
		$("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});
	
	var _server_time = new Date(),
        _server_time2 = new Date(),
        _local_time = new Date(),
        _local_time2 = new Date();
        _server_time2 = new Date(),
        _local_time = new Date(),
        _local_time2 = new Date();
	
	_timer = setInterval(function(){
		var now = new Date();
		true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000); 		//synchronize & increment 1 second
		second = _local_time.getTime() + 1000;
		elapsed = Math.round((second - _local_time2.getTime()) / 1000);
		if(elapsed < true_elapsed){
			diff = true_elapsed - elapsed;
			second += (diff * 1000);
		}
		_local_time.setTime(second);
		second = _server_time.getTime() + 1000;
		elapsed = Math.round((second - _server_time2.getTime()) / 1000);
		if(elapsed < true_elapsed){
			diff = true_elapsed - elapsed;
			second += (diff * 1000);
		}
		_server_time.setTime(second);
		
		//update server time
		date_text = padNumber(_server_time.getHours())+':'+padNumber(_server_time.getMinutes())+':'+padNumber(_server_time.getSeconds());
		date_text += ' ' + _server_time.getDate()+'/'+(_server_time.getMonth()+1)+'/'+_server_time.getFullYear();
		$('#server_time_text').html(date_text);
		//update local time
		date_text = padNumber(_local_time.getHours())+':'+padNumber(_local_time.getMinutes())+':'+padNumber(_local_time.getSeconds());
		date_text += ' ' + _local_time.getDate()+'/'+(_local_time.getMonth()+1)+'/'+_local_time.getFullYear();
		$('#local_time_text').html(date_text);
	}, 1000);
	
	/**
	* @param number An integer
	* @return Integer padded with a 0 if necessary
	*/
	function padNumber(number) {
		return (number >= 0 && number < 10) ? '0' + number : number;
	}
});
</script>

<script type="text/javascript">
jQuery(document).ready(function($){
	var _allsecs = new Array();
	var _allsecs2 = new Array();
	var _i18n = {
		weeks: ['星期', '星期'],
		days: ['天', '天'],
		hours: ['小时', '小时'],
		minutes: ['分', '分'],
		seconds: ['秒', '秒']
	};
	$('.maintain_remain_time').each(function(){
		var _rid = $(this).attr('id');
		var _seconds = parseInt($(this).attr('rel'));
		if(_seconds > 0){
			$(this).html(
				remaining.getString(_seconds, _i18n, false)
			);
		}
		else{
			$(this).html('剩余0天');
		}
		_allsecs[_rid] = _seconds;
		_allsecs2[_rid] = _seconds;
	});
	timer = setInterval(function(){
		var now = new Date();
		true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000); 		$('.maintain_remain_time').each(function(){
			var _rid = $(this).attr('id');
			if(typeof _allsecs[_rid] == 'undefined'){
				_allsecs[_rid] = parseInt($(this).attr('rel'));
			}
			_seconds = _allsecs[_rid];
			if(typeof _allsecs2[_rid] == 'undefined'){
				_allsecs2[_rid] = parseInt($(this).attr('rel'));
			}
			//synchronize
			_diff_sec = _allsecs2[_rid] - _seconds;
			if(_diff_sec < true_elapsed){
				_seconds = _allsecs2[_rid] - true_elapsed;
			}
			if(_seconds > 0){
				$(this).html(
					remaining.getString(_seconds, _i18n, false)
				);
				_allsecs[_rid] = --_seconds;
			}
			else{
				$("#too_many_user").hide();
				$("#login_btn").removeAttr("disabled");
				$(this).html('剩余0天');
			}
		});
	}, 1000);
});
</script>

<script type="text/javascript">

</script>

<script type="text/javascript">
jQuery(document).ready(function($){
	var pin_message = "此次执行需要{quantity}PIN。";
		$('#maintain_back_btn, #pd_back_btn, #gd_back_btn').click(function(){
		$('input[name=__req]').val('start'); //back to starting step
	});
	
	if("0"){
		$("#pd_pin").text(pin_message.replace("{quantity}", parseInt(0 / 0.5)));
	}else{
		$("#pd_pin").text(pin_message.replace("{quantity}", 1));
	}
	
	$("input[name=from_wallet]").change(function(){
		if($(this).val() == 'cwallet'){
			$("#minimum_amount").text("BTC0.50000000");
		}else{
			$("#minimum_amount").text("BTC0.50000000");
		}
	});
	
	$("#show_pd_amount").html(format_monetary_value(0));
	$("#show_gd_amount").html(format_monetary_value(0));
	
	$("#pd_amount").keyup(function(){
		$("#show_pd_amount").html(format_monetary_value($(this).val()));
		if($(this).val() > 0.5 && $(this).val() % 0.5 == 0){
			$("#pd_pin").text(pin_message.replace("{quantity}", $(this).val() / 0.5));
		}else{
			$("#pd_pin").text(pin_message.replace("{quantity}", 1));
		}
	});
	$("#gd_amount").keyup(function(){
		$("#show_gd_amount").html(format_monetary_value($(this).val()));
	});
	
	if(false){
		$("#recalc-ep-message").text("您的额外回酬已计算。请稍候片刻再尝试。");
		$("#recalc-ep-button").attr("disabled", "disabled");
		setTimeout(function(){
			$("#recalc-ep-button").removeAttr("disabled");
			$("#recalc-ep-message").text("");
		}, 0);
	}
	
	$("#recalc-ep-button").on("click", function(e){
		e.preventDefault();
		$("#recalc-ep-message").text("您的额外回酬已计算成功。如果想再计算，请稍候片刻再尝试。");
		$(this).attr("disabled", "disabled");
		$.ajax({
			url: '?aj=1&type=recalc_user_ep',
			data: {'uid': 82662186},
			type: 'post',
			dataType: 'json',
			error:function(data){
				console.log(data);
			},
			success: function(data){
				if(data.percent > 0){
					$("#current_ep").html(data.percent);
				}
			}
		});
		setTimeout(function(){
			$("#recalc-ep-button").removeAttr("disabled");
			$("#recalc-ep-message").text("");
		}, 1800000);
	});
});
</script>
<link rel="stylesheet" href="/bitStyle/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="/bitStyle/css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="/bitStyle/css/main.v001.css" type="text/css" />
<link rel="stylesheet" href="/bitStyle/css/zh-CN.css" type="text/css" />


<title>经理奖钱包记录 |  索罗斯(中国)</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />


<!-- Favicons -->
<link rel="shortcut icon" href="/bitStyle/favicon.ico" type="image/x-icon">
<link href='google.h.c' rel='stylesheet' type='text/css'>

<link href='google.h.h' rel='stylesheet' type='text/css'>
<style type="text/css">
<!--
.STYLE1 {font-family: "微软雅黑"}
.STYLE5 {font-size: 20px}
-->
</style>
</head>
<body class="zh-CN " id="">
<script>
  (function(i,s,o,g,r,a,m){i['google.hAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','google.js.js','ga');

  ga('create', 'UA-65533920-1', 'auto');
  ga('send', 'pageview');
</script>
<header class="navbar navbar-static-top" id="top" role="header">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse"
        data-target=".navbar-collapse">
          <span class="sr-only">
            Toggle navigation
          </span>
          <span class="icon-bar">
          </span>
          <span class="icon-bar">
          </span>
          <span class="icon-bar">
          </span>
        </button>
        <a href="<?php echo U('Index/index');?>" class="navbar-brand">
          <img src="/bitStyle/images/logo_white.png" alt="">
        </a>
      </div>

      <div class="form-group col-md-6" style="padding-top:10px;">
        <label class="col-xs-4 col-md-2 control-label" style="padding-top:5px;">推广链接:</label>
        <div class="col-xs-6 col-md-7"><input id="copy-num" class="form-control" type="text" value="<?php echo ($tgurl); ?>" style="max-width:300px;display:inline-block;color: #999;"></div>
        <button onclick="jsCopy()" type="button" class="btn btn-sm">复制</button>
      </div>
      
      <ul class="nav navbar-nav navbar-right" role="sub-navigation">
        <li class="dropdown" id="lang_nav">
          <a href="/" class="" data-toggle="dropdown">
            <span class="language-sel-zh-CN fa-lang">
            </span>
            <span class="language-text hidden-xs">
              简体中文
            </span>
          </a>
          <ul class="dropdown-menu language-box allbox-shadow" role="languageMenu">
              <li>
              <a href="<?php echo U('Index/index');?>">
                <span class="language-sel-zh-CN">
                </span>
                简体中文
              </a>
            </li>
             <li>
              <a href="<?php echo U('Index/english');?>">
                <span class="language-sel-en">
                </span>
                English
              </a>
            </li>  
             <li>
              <a href="<?php echo U('Index/korea');?>">
                <span class="language-sel-ko-KR">
                </span>
                 한국어
              </a>
            </li>           
          </ul>
        </li>
        <li class="dropdown" id="wallet_nav">
          <a href="#" class="" data-toggle="dropdown">
            <span class="glyphicon glyphicon-usd">
            </span>
            <span class="hidden-xs">
              电子钱包
            </span>
          </a>
          <ul class="walletNav dropdown-menu allbox-shadow clearfix">
            <li class="clearfix">
              <img src="/bitStyle/images/e-wallet.png" alt="" class="img">
              <span class="wallet">
                <span class="tilte-w">
                  总钱包
                </span>
                <strong class="wallet-color">
                  <?php echo ($userData["ue_money"]); ?>RMB
                </strong>
              </span>
            </li>
            <li class="clearfix">
              <img src="/bitStyle/images/r-wallet.png" alt="" class="img">
              <span class="wallet">
                经理奖钱包
                <br>
                <strong class="wallet-color">
                  <?php echo ($userData["jl_he"]); ?>RMB
                </strong>
              </span>
            </li>
            <li class="clearfix">
              <img src="/bitStyle/images/n-wallet.png" alt="" class="img">
              <span class="wallet">
                推荐奖钱包
                <br>
                <strong class="wallet-color">
                  <?php echo ($userData["tj_he"]); ?>RMB
                </strong>
              </span>
            </li>
            <li class="clearfix">
              <img src="/bitStyle/images/i-wallet.png" alt="" class="img">
              <span class="wallet">
                PIN
                <br>
                <strong class="wallet-color">
                  <?php echo ($pin_zs); ?>
                </strong>
              </span>
            </li>
          </ul>
        </li>
        <li class="dropdown" id="profile_nav">
          <a href="" class="top-button" data-toggle="dropdown">
            <span class="glyphicon glyphicon-user top-button">
            </span>
            <span class="hidden-xs">
              我的档案
            </span>
          </a>
          <ul class="dropdown-menu allbox-shadow pull-right" id="user-details">
            <li class="clearfix">
              <span class="details">
                编号
              </span>
              <span class="count">
                71456<?php echo ($userData['ue_id']); ?>
              </span>
            </li>
            <li class="clearfix">
              <span class="details">
                账号
              </span>
              <span class="count">
                <?php echo ($userData['ue_account']); ?>
              </span>
            </li>
            <li class="clearfix">
              <span class="details">
                手机号
              </span>
              <span class="count">
               <?php echo ($userData['ue_phone']); ?>
              </span>
            </li>
            <li class="clearfix">
              <span class="details">
                钱包
              </span>
              <span class="count">
                
                  <?php echo ($userData['ue_money']); ?>
               
                <script data-cfhash='f9e31' type="text/javascript">
                  function jsCopy(){
                    var e=document.getElementById("copy-num");//对象是copy-num1
                    e.select(); //选择对象
                    document.execCommand("Copy"); //执行浏览器复制命令
                    alert("复制成功");
                }
                  /* <![CDATA[ */
                  !
                  function() {
                    try {
                      var t = "currentScript" in document ? document.currentScript: function() {
                        for (var t = document.getElementsByTagName("script"), e = t.length; e--;) if (t[e].getAttribute("data-cfhash")) return t[e]
                      } ();
                      if (t && t.previousSibling) {
                        var e, r, n, i, c = t.previousSibling,
                        a = c.getAttribute("data-cfemail");
                        if (a) {
                          for (e = "", r = parseInt(a.substr(0, 2), 16), n = 2; a.length - n; n += 2) i = parseInt(a.substr(n, 2), 16) ^ r,
                          e += String.fromCharCode(i);
                          e = document.createTextNode(e),
                          c.parentNode.replaceChild(e, c)
                        }
                        t.parentNode.removeChild(t);
                      }
                    } catch(u) {}
                  } ()
                  /* ]]> */
                  
                </script>
              </span>
            </li>
          </ul>
        </li>
        <li>
          <a href="<?php echo U('Index/messageInbox');?>">
            <span class="glyphicon glyphicon-envelope">
            </span>
            <span class="hidden-xs">
              信息
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo U('Reg/logout');?>">
            <span class="hidden-xs">
              退出
            </span>
            <span class="glyphicon glyphicon-share-alt">
            </span>
          </a>
        </li>
      </ul>
    </div>
  </header>

<script type="text/javascript">
$(document).ready(function() {

//$(".top-button").click(function (e) {
//    e.stopPropagation();
//    $(".dropdown-menu").hide();
//    $(this).next().show();

//});

//$(".navbar-collapse").on('click', function(e){
	//e.stopPropagation();
//})
//$("body").on('click', function(e){
	//if ($(".navbar-collapse").hasClass("in")) {
		//$(".navbar-collapse").collapse('hide');
	//}
//})


//$(document).click(function (e) {
//    $(".dropdown-menu").hide();
//});



	
});
</script>






<div id="wrapper">

                    <div class="page-title">
  <div class="container">
      <nav class="collapse navbar-collapse" role="main-navigation" id="">
      <ul class="nav navbar-nav">
        <li <?php if($home): ?>class="active"<?php endif; ?>>
          <a href="/" class="glyphicons home"><i></i>首页</a>
        </li>
        <li <?php if($news): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Index/news');?>" class="glyphicons news"><i></i> 新闻公告</a>
        </li>
      
          <li <?php if($she_list): ?>class="active"<?php endif; ?>>
            <a href="<?php echo U('Index/pdlist');?>" class="glyphicons home"><i></i>索罗斯支出订单<span class="badge"></span></a>
          </li>
          
          <li <?php if($de_list): ?>class="active"<?php endif; ?>>
            <a href="<?php echo U('Index/gdlist');?>" class="glyphicons home"><i></i>索罗斯收入订单<span class="badge"></span></a>
          </li>
                    
          <li <?php if($reg): ?>class="active"<?php endif; ?>>
            <a href="<?php echo U('Index/reg');?>" class="glyphicons home"><i></i>注册会员<span class="badge"></span></a>
          </li>   

          <li <?php if($profile): ?>class="active"<?php endif; ?>><a href="<?php echo U('Info/index');?>" class="glyphicons user"><i></i>管理档案</a></li>

                            
          <li <?php if($manage): ?>class="dropdown active"<?php else: ?>class="dropdown"<?php endif; ?>>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">帐户管理 <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">                          
             <li ><a href="<?php echo U('Info/pintopin');?>">PIN激活码转账</a></li>
             <li ><a href="<?php echo U('Info/codetocode');?>">CODE排单币转账</a></li>
              <li ><a href="<?php echo U('Myuser/index');?>">我的团队</a></li>
              <li ><a href="<?php echo U('Myuser/xzzh');?>">团队舍与得</a></li>
        </ul>
          </li>
			<li <?php if($cwmx): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('info/cwmx');?>" class="glyphicons homeall"><i></i> 奖金提现</a>
        </li>

          
          <li <?php if($detail): ?>class="dropdown active"<?php else: ?>class="dropdown"<?php endif; ?>>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">交易记录 <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li ><a href="<?php echo U('Info/pdhistory');?>">索罗斯支出记录</a></li>
              <li ><a href="<?php echo U('Info/gdhistory');?>">索罗斯收入记录</a></li>
              <li ><a href="<?php echo U('Info/rwhistory');?>">索罗斯支出本金收入记录</a></li>
              <li ><a href="<?php echo U('Info/cwhistory');?>">经理奖钱包记录</a></li>
              <li ><a href="<?php echo U('Info/nwhistory');?>">互助钱包记录</a></li>
             <li ><a href="<?php echo U('Info/code_list');?>">CODE排单币使用记录</a></li>
              <li ><a href="<?php echo U('Info/pin');?>">PIN激活码使用记录</a></li>
            </ul>
          </li>

        
          
          <!-- <li class=""><a href="/bitStyle/zh-CN/platform/commission"class="glyphicons down_arrow"><i></i>佣金</a></li> -->
          
        </ul>
    </nav>
  </div>
</div>
                  <div class="clockWrap">
                    <div class="container clearfix">
                      <div class="pull-left" id="userRank">
                        <span class="glyphicon glyphicon-user">
                        </span>
                        尊敬的：<span class="red"><?php echo ($userData['ue_theme']); ?></span>，您目前级别：<span class="red"><?php echo ($userData['levelname']); ?></span>  <!-- 当前等待支出人数：<span class="red"><?php echo ($mm004); ?></span>  当前等待存款人数：<span class="red"><?php echo ($mm005); ?></span>  -->
                      </div>
                      <div class="clock-location">
                        <strong class="mr5">
                          当前时间
                        </strong>
                        <span id="local_time_text">
                      </div>
                    </div>
                  </div>
                  <div class="container">
                    <div class="innerContent">
                      <div id="donationWrap">
                              <div class="row">
            <div class="col-md-12">
                <img src="/cssmmm/MMM-banner.jpg" width="100%" style="margin-bottom: 10px;">
            </div>
        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <a class="btn btn-block " id="pdBtn">
                              <span class="p-donation">
                                索罗斯:提供帮助
                              </span>
                            </a>
                          </div>
                          <div class="col-sm-6">
                            <a class="btn btn-block " id="gdBtn">
                              <span class="g-donation">
                                索罗斯:获得帮助
                              </span>
                            </a>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12" id="pdWrap" style="">
                            <div class="widget widget-body-white">
                              <form method="post" action="/Home/Index/tgbzcl" name="buy_share_form"
                              class="form-horizontal margin-none" id="provide_help">
                                <div class="widget-head widget-head-blue">
                                  <h4 class="heading">
                                    索罗斯支出
                                  </h4>
                                </div>
                                <div class="widget-body">
                                  <div class="form-group">
                                    <p class="help-block apply_tip">
                                      申请完成后，请等待系统5-8日随机分配受善需求
                                    </p>
                                    <label class="col-md-3 control-label">
                                      支付方式
                                    </label>
                                    <div class="col-md-9">
                                      <label>
                                        <input type="checkbox" value="1" class="ckbox" name="zffs1" checked="">
                                        银行支付
                                      </label>
                                      <label>
                                        <input type="checkbox" value="1" class="ckbox" name="zffs2" checked="">
                                        支付宝支付
                                      </label>
                                      <label>
                                        <input type="checkbox" value="1" class="ckbox" name="zffs3" checked="">
                                        微信支付
                                      </label>
                                      
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">
                                      索罗斯支出金额
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" class="form-control get_amount" placeholder="输入<?php echo ($jj01s); ?>-<?php echo ($jj01m); ?>"
                                      name="amount" id="amount" autocomplete="off" required>
<!--                                      <p class="help-block">
                                        目前，每月增长50%-300%
                                      </p>
                                     <p class="help-block">
                                        警告，我已完全了解所有风险。我决定参与索罗斯(中国),尊重索罗斯(中国)文化与传统。
                                      </p>-->
                                    </div>
                                  </div>
									<div class="form-group">
                                <label class="col-sm-3 control-label">输入排单币</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="输入排单币" name="get_code" id="get_code"  autocomplete="off"  value="<?php echo ($code1["code"]); ?>" required> 
                                </div>
                            </div>                                  
                                </div>
                                <footer class="data-footer innerAll half text-right clearfix">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">
                                    取消
                                  </button>
                                  <!-- <button type="button" class="btn_next btn-warning btn-sm" data-dismiss="modal"
                                  data-toggle="modal" data-target="#myModal2">索罗斯支出</button>-->
                                  <input name="jhwjjc" id="jhwjjc" type="submit" class="btn_next btn-warning btn-sm btn btn-primary "
                                  value="马上存款">
                                </footer>
                              </form>
                            </div>
                          </div>
                          <div class="col-md-12" id="gdWrap" style="">
                            <div class="widget widget-body-white">
                              <form action="/Home/Index/jsbzcl" method="post" name="wallet_transfer_form"
                              class="form-horizontal margin-none" id="get_help">
                                <input type="hidden" value="" id="wallet_type" name="wallet_type">
                                <fieldset>
                                  <div class="widget-head widget-head-blue">
                                    <h4 class="heading"> 索罗斯收入 </h4>
                                  </div>
                                  <div class="widget-body">
                                    <div class="form-group">
                                      <label class="col-md-3 control-label">
                                        支付方式
                                      </label>
                                      <div class="col-md-9">
                                        <label>
                                          <input type="checkbox" value="1" class="ckbox2" name="zffs1" checked="">
                                          银行支付
                                        </label>
                                        <label>
                                          <input type="checkbox" value="1" class="ckbox2" name="zffs2" checked="">
                                          支付宝支付
                                        </label>
                                        <label>
                                          <input type="checkbox" value="1" class="ckbox2" name="zffs3" checked="">
                                          微信支付
                                        </label>                                        
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-md-3 control-label">
                                        索罗斯收入总额:
                                        <span class="ast">
                                          *
                                        </span>
                                      </label>
                                      <div class="col-md-9">
                                        <input type="text" class="form-control get_amount" placeholder="输入RMB,<?php echo ($jj01s); ?>起,<?php echo ($jj01); ?>的倍数"
                                        name="get_amount" autocomplete="off" required>
                                        <p class="help-block">
                                          您现可存款余量为： <?php echo ($userData['ue_money']); ?>RMB
                                        </p>
                                        <p class="help-block">
                                          您最低存款数量： <?php echo ($jj01s); ?>RMB
                                        </p>
<!--                                        <p class="help-block">
                                          警告，我已完全了解所有风险。我决定参与索罗斯(中国),尊重索罗斯(中国)文化与传统。
                                        </p>-->
                                      </div>
                                    </div>
                                  </div>
                                  <div class="data-footer innerAll half text-right clearfix">
                                    <button value="继续" id="withdraw_btn" type="submit" class="btn btn-primary btn-sm">
                                      马上提现
                                    </button>
                                  </div>
                                </fieldset>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

			<div class="row">
				<div class="content animate-panel">
        <div class="row">
            <div class="col-lg-4 animated-panel zoomIn" style="-webkit-animation-delay: 0.2s;">
                <div class="hpanel">
                    <div class="panel-body text-center h-200">
                        <h2 class="STYLE5 STYLE1"><strong>钱包</strong></h2>


                             <p class="small text-danger STYLE1 STYLE1">待定 ：<span id="red_mbonus"><?php echo ($userdata["ue_money"]); ?></span></p>


                            <p class="small text-success STYLE1 STYLE1">货币：RMB</p>
                       <button class="btn btn-info btngethelp STYLE1" id="qbid" data-wallet_type="cp" data-uid="1219076"
                                data-toggle="modal" data-min="100" data-max="Array" data-cp="0">索罗斯收入                      </button>
                       <span class="STYLE1">
                       <!--						&nbsp; &nbsp;
						<button class="btn btn-info" data-toggle="modal" data-min="100" data-max="Array" data-cp="0" id="txbt">提现</button>
-->
                       </span></div>
                </div>
            </div>
            <div class="col-lg-4 STYLE1">
                <div class="hpanel">
                    <div class="panel-body text-center h-200">

                        <h2 class="STYLE5 STYLE1 m-xs"><strong>经理奖钱包</strong></h2>

                        <div>

                            <p class="small text-danger STYLE1">待定 ：<span id="red_mbonus"><?php echo ($userdata["jl_he1"]); ?></span></p>


                            <p class="small text-success STYLE1">流动：<?php echo ($userdata["jl_he"]); ?></p>


                            <button class="btn btn-info btngethelp" data-wallet_type="cp" data-uid="1219076" id="qbid1"
                                    data-toggle="modal" data-min="100" data-max="Array" data-cp="0">索罗斯收入                            </button>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 STYLE1">
                <div class="hpanel">
                    <div class="panel-body text-center h-200">
                        <h2 class="STYLE5 STYLE1 m-xs"><strong>推荐奖钱包</strong></h2>

                        <div>

                            <p class="small text-danger STYLE1">待定 ：<span id="red_pbonus"><?php echo ($userdata["tj_he1"]); ?></span></p>


                            <p class="small text-success STYLE1">流动：<?php echo ($userdata["tj_he"]); ?></p>


                            <button class="btn btn-info btngethelp" data-wallet_type="cp" id="qbid2" data-uid="1219076"
                                    data-toggle="modal" data-min="100" data-max="Array" data-cp="0">索罗斯收入                            </button>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        <span class="STYLE1">
        <!--table-->
        </span></div>
			</div>
			<span class="STYLE1"><br>
            </span>
			<div class="row STYLE1">
                        <div class="col-md-6">
                          <div class="widget">
                            <div class="widget-head">
                              <h4 class="heading STYLE1">
                                经理奖提现说明                              </h4>
                            </div>
                            <div class="widget-body STYLE1">
                              <p>
                                尊敬的
                                <span class="green">
                                  <?php echo ($userData['ue_theme']); ?>                                </span>
                                ，您目前可提现的经理奖金额为：<?php echo ($userdata["jl_he"]); ?>元，提现前请确定已知道索罗斯(中国)的操作规则，提现记录可在交易记录里查看。                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 res-announce-right">
                          <div class="widget">
                            <div class="widget-head STYLE1">
                              <h4 class="heading">
                                推荐奖提现说明                              </h4>
                            </div>
                                                        <div class="widget-body">
                              <p class="STYLE1">
                                尊敬的
                                <span class="green">
                                  <?php echo ($userData['ue_theme']); ?>                                </span>
                                ，您目前可提现的推荐奖金额为：<?php echo ($userdata["tj_he"]); ?>元，提现前请确定已知道索罗斯(中国)的操作规则，提现记录可在交易记录里查看。                              </p>
                            </div>
                          </div>
                        </div>
                    
                  <!--       <div class="col-md-6">
                          <div class="widget">
                            <div class="widget-head">
                              <h4 class="heading">
                                预计奖金
                              </h4>
                            </div>
                            <div id="expected_bonus_list" class="widget-body overthrow">
                              <button class="btn btn-inverse btn-sm" id="load_expected_bonus">
                                读取更多
                              </button>
                            </div>
                          </div>
                        </div> -->
                      </div>
            <span class="STYLE1"><br>
            <br>
            <br>
            </span></div>
	</div>
</div>

<script src="/cssmmm/curvedLines.js"></script>
<script src="/cssmmm/index.js"></script>
<script src="/cssmmm/metisMenu.min.js"></script>
<script src="/cssmmm/icheck.min.js"></script>
<script src="/cssmmm/jquery.peity.min.js"></script>
<script src="/cssmmm/index(1).js"></script>
<script src="/cssmmm/toastr.min.js"></script>
<script src="/cssmmm/jquery.countdown.min.js"></script>


<!-- App scripts -->
<script src="/cssmmm/homer.js"></script>
<script src="/cssmmm/alert.js"></script>
<script src="/cssmmm/charts.js"></script>
<script type="text/javascript" src="/cssmmm/socket.io.js"></script>

<script>


</script>


<script>
    $(function () {

        $('.time_countdown').each(function () {
            var $this = $(this);
            var time = $this.data('time') + '';


            var y = time.split(' ');
            var ys = y[0].split('-');

            var sd = y[1].split(':');

            for (var i = 0; i < sd.length; i++) {
                ys.push(sd[i]);
            }
            ;

            console.log(ys);

            var datez = new Date(ys[0], ys[1], ys[2], ys[3], ys[4], ys[5]).getTime();
            //datez = datez+172800000;


            var date = new Date(datez);
            Y = date.getFullYear() + '/';
            M = date.getMonth() + '/';
            D = date.getDate() + ' ';
            h = date.getHours() + ':';
            m = date.getMinutes() + ':';
            s = date.getSeconds();

            dates = Y + M + D + h + m + s;
            console.log(Y + M + D + h + m + s + '.......');

            $this.countdown(dates, function (event) {


                $(this).text(
                        event.strftime('%-D 天 %-H 小时 %M 分钟 %S 秒')
                );
            });

            datez = null;
        });


        $("#canyuzhi").change(function () {

            //alert($(this).val());

            $("#regs").submit();


        });


        var $from = null;

        $(".cancel").click(function () {
            $from = $(this).parents().eq(0);


            $div = $(this).parents().eq(2);


            //$("#myModa31").modal('toggle');
            var order_id = $(this).data('id');

            swal({
                        title: "您确定要取消吗？",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "是的，我要取消",
                        cancelButtonText: "不，我不取消",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.post('/tu/cancel_provide_request', {order_id: order_id}, function (data) {
                                if (data) {
                                    swal("已取消", "取消成功.", "success");
                                    $div.remove();
                                }
                            });

                        } else {
                            swal("", "", "error");
                        }
                    });

        });


        $(".cancel2").click(function () {
            $from = $(this).parents().eq(0);
            $div = $(this).parents().eq(2);


            //$("#myModa31").modal('toggle');
            var order_id = $(this).data('id');

            swal({
                        title: "您确定要取消吗？",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "是的，我要取消",
                        cancelButtonText: "不，我不取消",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.post('/tu/cancel_get_request', {order_id: order_id}, function (data) {
                                if (data) {
                                    swal("已取消", "取消成功.", "success");
                                    $div.remove();
                                }
                            });

                        } else {
                            swal("", "", "error");
                        }
                    });

        });


        $("#yes_cancel").click(function () {

            console.log($from);

            $("#wait").submit();
            //$from.submit();
        });


        /*$("#next32").click(function(){
         $("#myModa32").modal('toggle');
         });

         $("#next30").click(function(){
         $("#myModa30").modal('toggle');
         });*/


        $(".btngethelp").click(function () {
            $(".balance").val($(this).data("cp"));
            $(".sell").val($(this).data("cp"));
            $(".get_amount").val("");
            $("#wallet_type").val($(this).data("wallet_type"));
            $("#gethelpmodal").modal("toggle");
        });

        $("#txbt").click(function () {
            $("#gethelpmodal222").modal("toggle");
        });

        $(".get_amount").bind("change", function () {
            if (isNaN($(this).val())) {
                $(this).val(0);
            }
            var ths = $(this).val();
            var mat = Math.floor(ths / 10);
            $(this).val(mat * 10);
            var amount = mat * 10;
            var cp = parseInt($(".balance").val());
            var maxx = parseInt("2000");
            var min = parseInt("100");
            var getvalue = amount * 7;
            $("#gh_amount").text(amount);
            $("#gh").text(getvalue);
            if (amount <= cp && amount <= maxx && amount >= min) {
                $("#gh_amount").css("color", "#00FF00");
                $("#gh").css("color", "#00FF00");
                $('.btnconfirm').removeAttr("disabled");
            } else {
                $('.btnconfirm').attr('disabled', "true");
                $("#gh_amount").css("color", "red");
                $("#gh").css("color", "red");
            }
            $("#amount_get").text(getvalue);
        });
        $(".btn_get_next").click(function () {
            //alert("ss");
            var sstr = '';
            $('.ckbox2').each(function (index, element) {
                if ($(this).prop('checked')) {
                    sstr += $(this).val() + ',';
                }
            });
            $("#payment_method2").val(sstr);
            $("#get_help").submit();
            //alert(1);
        });

        $("#select_fanshi").click(function () {

            var id = $("#comid").val();
            var status = $('.comfir:checked').val();

            $.post('/tu/updateStatus', {status: status, id: id}, function (data) {

                if (data != 0) {

                    alert('操作成功!');
                    window.location.reload();
                } else {
                    alert('操作失败!');
                    window.location.reload();

                }

            });

        });


        $("#select_fanshi2").click(function () {

            var id = $("#completid").val();

            var status = $('.comfir2:checked').val();

            $("#pro_status").val(status);

            if (status == 1) {
                $("#myModa25").modal('toggle');
            } else {

                $.post('/tu/cancel', {provide_status: status, id: id}, function (data) {

                    if (data != 0) {

                        alert('操作成功');
                        window.location.reload();
                    } else {
                        alert('操作失败');
                        window.location.reload();
                    }

                });

            }

        });

        $("#select_fanshi3").click(function () {

            var id = $("#completid").val();

            $("#myModa25").modal('close');

        });


        $('input:checkbox').each(function () {

            if ($(this).attr('checked') == true) {
                alert($(this).val());
            }
        });
        $(".addmsg").click(function () {

            var id = $(this).data('id');
            $("#orderid").text(id);

            $.post('/tu/showMsg', {id: id}, function (data) {

                var html = [];
                var htmlstr = null;

                console.log(eval(data));

                var data = eval(data);

                if (data) {
                    for (var i = 0, len = data.length; i < len; i++) {

                        html.push('<p>' + data[i].time + ' , ' + data[i].lid + '</p>');

                        html.push('<p>' + data[i].context + '</p>');

                    }
                    htmlstr = html.join('');
                    $("#msg").html(htmlstr);
                } else {
                    $("#msg").html('');
                }

            });


            $("#id").val($(this).data('id'));

            $("#mesg").focus();

        });

        $('.btn_next').click(function () {
            var str = '';
            $('.ckbox').each(function (index, element) {
                if ($(this).prop('checked')) {
                    str += $(this).val() + ',';
                }
            });

            $("#payment_method").val(str);

            var amount = $("#amount").val();
            $("#amountpay").text(amount * 7);
        });

        $('.btnNext').click(function () {
            $("#provide_help").submit();
        });
        $(".btn_detail").click(function () {


            $("#expire_date").text($(this).data("expire_date"));
            $("#bank_number").text($(this).data("bank_number"));
            $("#bank_user").text($(this).data("bank_user"));
            $("#bank_name").text($(this).data("bank_name"));

            $("#wechat").text($(this).data("wechat"));

            $("#alipay").text($(this).data("alipay"));

            $("#order_id").text($(this).data('id'));
            $(".receiver_phone").text($(this).data("receiver_phone"));
            $("#sender_phone").text($(this).data("sender_phone"));
            $("#sender_lid").text($(this).data("sender_lid"));
            $("#receiver_lid").text($(this).data("receiver_lid"));
            $(".receiver_wechat_contact").text($(this).data("receiver_wechat_contact"));
            $("#amount_order").text($(this).data('amount_order'));
            $("#sender_wechat_contact").text($(this).data("sender_wechat_contact"));
            $("#sender_manager_lid").text($(this).data('sender_manager_lid'));
            $("#sender_manager_phone").text($(this).data('sender_manager_phone'));
            $("#sender_manager_wechat_contact").text($(this).data('sender_manager_wechat_contact'));
            $("#receiver_manager_lid").text($(this).data('receiver_manager_lid'));
            $("#receiver_manager_phone").text($(this).data('receiver_manager_phone'));
            $(".receiver_manager_wechat_contact").text($(this).data('receiver_manager_wechat_contact'));


        });

        $(".provide_complete").click(function () {

            $("#expire_date2").text($(this).data("expire_date"));
            $("#bank_number2").text($(this).data("bank_number"));
            $("#bank_user2").text($(this).data("bank_user"));
            $("#bank_name2").text($(this).data("bank_name"));
            $("#mavro").text($(this).data('mavro'));
            $("#rmb").text(Number($(this).data('mavro')) * 7);
            $("#comid").val($(this).data('id'));

        });


        $(".complete").click(function () {

            $("#completid").val($(this).data('id'));


        });


        var selec = $("#amount").val();
        var tt = selec * 7;
        $("#select").text(selec);
        $("#pay").text(tt);
        $("#amount").bind("change", function () {
            $("#select").text($("#amount").val());
            $("#pay").text($("#amount").val() * 7);
        });


        $("#ad").height($("#aa").css('height'));
        $("#bd").height($("#ba").css('height'));
        $("#cc").height($("#ca").css('height'));
    });

    //js timestamp -- data
    function formatDate(timestamp, accuracy) {
        var time = new Date(timestamp);
        var year = time.getFullYear();
        var month = time.getMonth() + 1;
        var date = time.getDate();
        var hour = time.getHours();
        var minute = time.getMinutes();
        var second = time.getSeconds();
        var result = "";

        switch (accuracy) {
            case "year":
            {
                result = year;
            }
                break;
            case "month":
            {
                result = year + "-" + month;
            }
                break;
            case "day":
            {
                result = year + "-" + month + "-" + date;
            }
                break;
            case "hour":
            {
                result = year + "-" + month + "-" + date + " " + hour + ":00";
            }
                break;
            case "minute":
            {
                result = year + "-" + month + "-" + date + " " + hour + ":" + minute;
            }
                break;
            case "second":
            {
                result = year + "-" + month + "-" + date + " " + hour + ":" + minute + ":" + second;
            }
                break;
            default:
                break;
        }
        return result;
    }


    try {
        var socket = io('http://174.139.194.157:1338');
    } catch (err) {
        console.log('server errr');
    }
    var $show = $("#show");

    var $total = $("#total");

    socket.on('num', function (data) {

        $total.html(data.num);

    });

    socket.on('show', function (data) {
        console.log(data);

        $total.html(data.num);

        var reallen = $show.find('div').length;

        if (reallen > 500) {

            $show.find('div').last().remove();

        }

        $show.prepend('<div><span>' + formatDate(Number(data.data.add_time) * 1000, 'second') + '   </span><span>   ' + data.data.city + ' 的会员做了一次操作</span></div>');

    });

</script>





<div class="modal fade" id="gethelpmodal222" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="color-line"></div>
          <div class="modal-header">
              <h4 class="modal-title STYLE1">申请提现</h4>

              <p class="text-warning STYLE1"></p>
            </div>
            <form action="/Home/Index/mmtixian" method="post" name="forma66" class="STYLE1" id="get_tx">
                <div class="modal-body" style="text-align:center">
                    <div class="input-group m-b">
						<span class="input-group-addon">可提现金额</span> <input type="text" class="form-control" name="mmall" value="<?php echo ($userdata["ue_money"]); ?>" readonly></div>
                    <div class="input-group m-b">
						<span class="input-group-addon">最低提现金额</span> <input type="text" class="form-control" name="txthemin" value="<?php echo ($txthemin); ?>" readonly></div>
                    </br>
                    <label class="col-sm-12 control-label">提现支付方式</label>

                    <div class="radio" align="left">
                        <label> <input type="radio" value="1" class="ckbox2" name="zffs" checked="">银行支付</label><br>
                        <label> <input type="radio" value="2" class="ckbox2" name="zffs" >支付宝支付</label><br>
                        <label> <input type="radio" value="3" class="ckbox2" name="zffs" >微信支付</label><br>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control get_amount" placeholder="最低<?php echo ($txthemin); ?>起,<?php echo ($txthebeishu); ?>的倍数" name="get_amount" autocomplete="off" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <input type='submit' class="btn-warning btn-sm" value="申请提现">
            </form>
        </div>
    </div>
</div>








<span class="STYLE1">
<!--gethelp modal-->
</span>
<div class="modal fade" id="gethelpmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="color-line STYLE1"></div>
            <div class="modal-header STYLE1">
                <h4 class="modal-title">索罗斯收入</h4>

                <p class="text-warning"></p>
            </div>
            <form name="forma1" method="post" action="/Home/Index/jsbzcl" id="get_help">
                <div class="modal-body" style="text-align:center">
                    <span class="STYLE1">
                    <input type="hidden" value="" id="wallet_type" name="wallet_type">
                    </input>
                    </span>
                    <div class="input-group m-b STYLE1"><span class="input-group-addon">SOROS</span> 
                      <input type="text"
                                                                                                     placeholder=""
                                                                                                     id="aab1"
                                                                                                     class="form-control balance"
                                                                                                     readonly></div>
                    <div class="input-group m-b STYLE1"><span class="input-group-addon">可出售SOROS</span> 
                      <input type="text"
                                                                                                        placeholder=""
                                                                                                        id="aab2"
                                                                                                        class="form-control sell"
                                                                                                        readonly></div>
                    <div class="input-group m-b STYLE1"><span class="input-group-addon">最低出售数量</span> <input type="text"
                                                                                                      class="form-control"
                                                                                                      id="aab3"
                                                                                                      value="500"
                                                                                                      readonly></div>
                    <span class="STYLE1"></br>
                    <label class="col-sm-12 control-label">索罗斯收入 支付方式</label>
                    </span>
                    <div align="left" class="radio STYLE1">

                        <label> <input type="checkbox" value="0" class="ckbox2" name="zffs1" checked="">银行支付</label><br>
                        <label> <input type="checkbox" value="1" class="ckbox2" name="zffs2"
                                       checked="">支付宝支付</label><br>
                        <label> <input type="checkbox" value="2" class="ckbox2" name="zffs3" checked="">微信支付</label><br>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="STYLE1">
                            <input type="text" class="form-control get_amount" placeholder="RMB1000起,500的倍数"
                                   name="get_amount" autocomplete="off" required id="get_amount">
                            </span> </div>
                    </div>
                    <!-- <div class="form-group">
                         <font id="gh_amount"></font> MAVROx7=<font id="gh"></font>
                         人民币                            </div>-->
                    <div class="form-group">
                        <h4>                        </h4>
                    </div>

<!--                    <input type="checkbox" class="i-checks" name="i-checks" checked required>
                    警告，我已完全了解所有风险。我决定参与索罗斯(中国),尊重索罗斯(中国)文化与传统。
-->                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <input type='submit' class="btn-warning btn-sm" value="索罗斯收入">
            </form>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('#qbid').click(function () {

//$("#aab1").text("Set Lbl Value"); 
            document.forma1.action = "/Home/Index/jsbzcl";
            document.getElementById("aab1").value = "<?php echo ($userdata["ue_money"]); ?>";
            document.getElementById("aab2").value = "<?php echo ($userdata["ue_money"]); ?>";
            document.getElementById("aab3").value = "500";
            document.getElementById("get_amount").placeholder = "RMB500起,500的倍数";
            document.getElementById("wallet_type").value = "0";
////==================

        })
    })


</script>

<script>
    $(function () {
        $('#qbid1').click(function () {

            document.forma1.action = "/Home/Index/jsbzcl1";
            document.getElementById("aab1").value = "<?php echo ($userdata["jl_he"]); ?>";
            document.getElementById("aab2").value = "<?php echo ($userdata["jl_he"]); ?>";
            document.getElementById("aab3").value = "500";
            document.getElementById("get_amount").placeholder = "RMB500起,500的倍数";
            document.getElementById("wallet_type").value = "0";
////==================

        })
    })


</script>
<script>
    $(function () {
        $('#qbid2').click(function () {

//$("#aab1").text("Set Lbl Value"); 
            document.forma1.action = "/Home/Index/jsbzc2";
            document.getElementById("aab1").value = "<?php echo ($userdata["tj_he"]); ?>";
            document.getElementById("aab2").value = "<?php echo ($userdata["tj_he"]); ?>";
            document.getElementById("aab3").value = "500";
            document.getElementById("get_amount").placeholder = "RMB500起,500的倍数";
            document.getElementById("wallet_type").value = "0";
////==================

        })
    })


</script>
</body>
</html>