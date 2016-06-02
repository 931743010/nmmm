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
        _local_time2 = new Date();2016, 1-1, 14,
    11, 57, 19),
    _server_time2 = new Date(2016, 1-1, 14,
    11, 57, 19),
    _local_time = new Date(2016, 1-1, 14,
    11, 57, 19),
    _local_time2 = new Date(2016, 1-1, 14,
    11, 57, 19);
  
  _timer = setInterval(function(){
    var now = new Date();
    true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000);    //synchronize & increment 1 second
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
    true_elapsed = Math.round((now.getTime() - _gNow.getTime()) / 1000);    $('.maintain_remain_time').each(function(){
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
<link rel="stylesheet" href="/zTree_v3/css/zTreeStyle/zTreeStyle.css" type="text/css" />


<title>我的团队 |  索罗斯(中国)</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />


<!-- Favicons -->
<link rel="shortcut icon" href="/bitStyle/favicon.ico" type="image/x-icon">
<link href='google.h.c' rel='stylesheet' type='text/css'>

<link href='google.h.h' rel='stylesheet' type='text/css'>
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
     
                  <div class="container">
                    <div class="innerContent">
                      <div id="donationWrap">
                        
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
                                      申请完成后，请等待系统1-30日随机分配受善需求
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
                                      <p class="help-block">
                                        目前，每月增长50%-300%
                                      </p>
                                      <p class="help-block">
                                        警告，我已完全了解所有风险。我决定参与幸福国际互助,尊重幸福国际互助文化与传统。
                                      </p>
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
                                  value="索罗斯支出">
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
                                    <h4 class="heading">
                                      索罗斯收入
                                    </h4>
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
                                          您现有可出售余额： <?php echo ($userData['ue_money']); ?>RMB
                                        </p>
                                        <p class="help-block">
                                          您最低出售数量 <?php echo ($jj01s); ?>RMB
                                        </p>
                                        <p class="help-block">
                                          警告，我已完全了解所有风险。我决定参与幸福国际互助,尊重幸福国际互助文化与传统。
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="data-footer innerAll half text-right clearfix">
                                    <button value="继续" id="withdraw_btn" type="submit" class="btn btn-primary btn-sm">
                                      索罗斯收入
                                    </button>
                                  </div>
                                </fieldset>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>


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

var zNodes =[
  { id:1, pId:0, name:"父節點1 - 展開", open:true},
  { id:11, pId:1, name:"父節點11 - 摺疊"},
  { id:111, pId:11, name:"葉子節點111"},
  { id:112, pId:11, name:"葉子節點112"},
  { id:113, pId:11, name:"葉子節點113"},
  { id:114, pId:11, name:"葉子節點114"},
  { id:12, pId:1, name:"父節點12 - 摺疊"},
  { id:121, pId:12, name:"葉子節點121"},
  { id:122, pId:12, name:"葉子節點122"},
  { id:123, pId:12, name:"葉子節點123"},
  { id:124, pId:12, name:"葉子節點124"},
  { id:13, pId:1, name:"父節點13 - 沒有子節點", isParent:true},
  { id:2, pId:0, name:"父節點2 - 摺疊"},
  { id:21, pId:2, name:"父節點21 - 展開", open:true},
  { id:211, pId:21, name:"葉子節點211"},
  { id:212, pId:21, name:"葉子節點212"},
  { id:213, pId:21, name:"葉子節點213"},
  { id:214, pId:21, name:"葉子節點214"},
  { id:22, pId:2, name:"父節點22 - 摺疊"},
  { id:221, pId:22, name:"葉子節點221"},
  { id:222, pId:22, name:"葉子節點222"},
  { id:223, pId:22, name:"葉子節點223"},
  { id:224, pId:22, name:"葉子節點224"},
  { id:23, pId:2, name:"父節點23 - 摺疊"},
  { id:231, pId:23, name:"葉子節點231"},
  { id:232, pId:23, name:"葉子節點232"},
  { id:233, pId:23, name:"葉子節點233"},
  { id:234, pId:23, name:"葉子節點234"},
  { id:3, pId:0, name:"父節點3 - 沒有子節點", isParent:true}
];


$(document).ready(function(){
    var $user = "<?php echo ($userData['ue_account']); ?>";
      $.ajax({
          type: "post",
          dataType : "json",
          global : false,

          url : "/index.php/Home/Common/getTree",
          data : {
          user : $user
          },
          success : function(data, textStatus) {
            if (data.status == 0)
            {
            //alert(data.nr);
            
              zNodes1 = data.data;
              $.fn.zTree.init($("#treeDemo"), setting, zNodes1);
            } else {
              alert(data.data);
            }
            
            return ;
          }
          
        });


   $('#btn').click(function(){

    var $user = $('#user').val();
    $.ajax({
        type: "post",
        dataType : "json",
        global : false,

        url : "/index.php/Home/Common/getTreeso",
        data : {
        user : $user
        },
        success : function(data, textStatus) {
          if (data.status == 0)
          {
          //alert(data.nr);
          
            zNodes1 = data.data;
            $.fn.zTree.init($("#treeDemo"), setting, zNodes1);
          } else {
            alert(data.data);
          }
          
          return ;
        }
        
      });
  });



});



$(function(){





var $user = "<?php echo ($userData['ue_account']); ?>";
$.ajax({
    type: "post",
    dataType : "json",
    global : false,

    url : "/index.php/Home/Common/getMyTreeso",
    data : {
    user : $user
    },
    success : function(data, textStatus) {
      if (data.status == 0)
      {
      //alert(data.nr);
      
        zNodes1 = data.data;
        $.fn.zTree.init($("#treeDemo"), setting, zNodes1);
      } else {
        alert(data.data);
      }
      
      return ;
    }
    
  });

});




</script>

<div class="formbody">
    
    <div class="core_con">
  <div style="font-size:9pt;"><form action="" method="get"><input name="user1" id="user1"  type="hidden" value="<?php echo ($user); ?>" />我的团队树 : <input id="user" name="user" type="text"> <input name="" type="button" id="btn" value="搜索" class="btn btn-info btn-sm">
  <span id="daishu"></span></form></div>
    <div class="content_wrap">
  <div class="zTreeDemoBackground ">
    <ul id="treeDemo" class="ztree"></ul>
  </div>
  <!-- <div class="right">
    <ul class="info">
      <li class="title"><h2>1、setting 配置信息說明</h2>
        <ul class="list">
        <li class="highlight_red">是否顯示連接線請設置 setting.view.showLine 屬性，詳細請參見 API 文檔中的相關內容</li>
        </ul>
      </li>
      <li class="title"><h2>2、treeNode 節點數據說明</h2>
        <ul class="list">
        <li>是否顯示連線，不需要 treeNode 節點數據提供特殊設置</li>
        </ul>
      </li>
    </ul>
  </div> -->
</div>

































      <div class="row">
        <div class="col-md-12">
          <div class="widget">
            <div class="widget-head clearfix">
              <h4 class="heading">我的团队</h4>
            </div>
            <div class="widget-body innerAll overthrow">
              <table class="table table-bordered table-primary">
                <thead>
                  <tr class="tac">
                    <th>编号</th>
                    <th>昵称</th>
                    <th> 级别</th>
                    <th>邮箱</th>
                    <th>推荐人</th>
                    <th>注册人</th>
                    <th>加入时间</th>
                  </tr>
                </thead>
                <tbody>                
                                  
            
                  <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr role="row" class="odd">
                  <td class="sorting_1"><?php echo ($v["ue_id"]); ?></td>
                  <td><?php echo ($v["ue_theme"]); ?></td>
                  <td><?php echo ($v["levelname"]); ?></td>
                  <td><?php echo ($v["ue_account"]); ?></td>
                  <td><?php echo ($v["ue_accname"]); ?></td>
                  <td><?php echo ($v["zcr"]); ?></td>
                  <td><?php echo ($v["ue_regtime"]); ?></td>
                  </tr><?php endforeach; endif; ?>
              </tbody>
                      </table>
                      <div class="dataTables_info" id="example_info" role="status" aria-live="polite"><?php echo ($page); ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>