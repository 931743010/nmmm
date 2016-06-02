<?php

namespace Home\Controller;

use Think\Controller;

class RegController extends Controller {

    public function index(){
        $this->tjmail = I('uname');
        $this->display('reg');

    }

     public function Post($curlPost,$url){
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_NOBODY, true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
			$return_str = curl_exec($curl);
			curl_close($curl);
			return $return_str;
		}
		
		public function xml_to_array($xml){
			$reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
			if(preg_match_all($reg, $xml, $matches)){
				$count = count($matches[0]);
				for($i = 0; $i < $count; $i++){
				$subxml= $matches[2][$i];
				$key = $matches[1][$i];
					if(preg_match( $reg, $subxml )){
						$arr[$key] = $this->xml_to_array( $subxml );
					}else{
						$arr[$key] = $subxml;
					}
				}
			}
			return $arr;
		}
		
		public function random($length = 6 , $numeric = 0) {
			PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
			if($numeric) {
				$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
			} else {
				$hash = '';
				$chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
				$max = strlen($chars) - 1;
				for($i = 0; $i < $length; $i++) {
					$hash .= $chars[mt_rand(0, $max)];
				}
			}
			return $hash;
		}
		
		
    public function send_sms()
     {
		 	
			$target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
			$mobile = $_POST['mobile'];
			
			//exit($mobile);
			
			$send_code = rand(1,999999);
			//exit($send_code);
			$mobile_code = rand(4,1);
			if(empty($mobile)){
				exit('手机号码不能为空');
			}

			$have_code=M('mobile_code')->where(array('phone'=>$mobile))->find();
			
			if(empty($have_code))
			{
				$Dao = M("mobile_code"); // 实例化模型类
				$data["phone"] = $mobile;
				$data["code"] = $send_code;
				$data["add_time"] = time();
				if($lastInsId = $Dao->add($data))
				{
					echo "插入数据 id 为：$lastInsId";
				} else {
					$this->error('数据写入错误！');
				}
		
			}
			else
			{
				$Data = M('mobile_code');
				$data["code"] = $send_code;
				$data["add_time"] = time();
				$Data->where("phone=".$mobile."")->save($data); 
				
			}
			
			
			
/*			if(empty($_SESSION['send_code']) or $send_code!=$_SESSION['send_code']){
				//防用户恶意请求
				exit('请求超时，请刷新页面后重试');
			}
*/			
			$post_data = "account=cf_cngsoros&password=3324408aa&mobile=".$mobile."&content=".rawurlencode("您的验证码是：".$send_code."。请不要把验证码泄露给其他人。");
			//密码可以使用明文密码或使用32位MD5加密
			$gets =  $this->xml_to_array($this->Post($post_data, $target));
			if($gets['SubmitResult']['code']==2){
				//$_SESSION['mobile'] = $mobile;
				//$_SESSION['mobile_code'] = $mobile_code;
			}
			echo $gets['SubmitResult']['msg'];
	 }

    

    
    

    


    

    

    public function logincl() {

    	header("Content-Type:text/html; charset=utf-8");

    	//echo I('post.ip');die;

    	if (IS_POST) {

    		//$this->error('系統暫未開放!');die;

	    	$username=trim(I('post.account'));

			$pwd=trim(I('post.password'));

			//$verCode = trim(I('post.verCode'));//驗證碼

			//dump($pwd);die;

			//

			

			if(false){

				die("<script>alert('账号或密码错误,或被禁用！');history.back(-1);</script>");

				//$this->ajaxReturn( array('nr'=>'賬號或密碼錯誤,或被禁用!','sf'=>0) );

			}else{

			$user=M('user')->where(array('UE_account'=>$username))->find();

 			

			if(!$user || $user['ue_password']!=md5($pwd)){ 

				//$this->ajaxReturn('賬號或密碼錯誤,或被禁用!');

				//$this->ajaxReturn( array('nr'=>'賬號或密碼錯誤,或被禁用!','sf'=>0) );

				die("<script>alert('账号或密码错误,或被禁用！');history.back(-1);</script>");

			}elseif($user['ue_status']=='1'){

				//$this->ajaxReturn('賬號或密碼錯誤,或被禁用!');

				//$this->ajaxReturn( array('nr'=>'賬號或密碼錯誤,或被禁用!','sf'=>0) );

				die("<script>alert('账号或密码错误,或被禁用！');history.back(-1);</script>");

				

			}else{

				

			//	$lifeTime = 60;

				//session_set_cookie_params($lifeTime);

			//	session_start();

				//$_session["uid"]=$user[ue_id];

				

			//	$_session["uname"]=$user[ue_account];

				

 				session('uid',$user[ue_id]);

				session('uname',$user[ue_account]);

				//cookie('uid2',$user[ue_id],array('expire'=>5,'prefix'=>'think_'));

				$record1['date']= date ( 'Y-m-d H:i:s', time () );

				$record1['ip'] = I('post.ip');

				$record1['user'] = $user[ue_account];

				$record1['leixin'] = 0;

				M ( 'drrz' )->add ( $record1 );

				

				$_SESSION['logintime'] = time();

				

				

				$this->error('登入成功！','/Home/Index/home/',2);




    	}}

    	}

    	

    

    }

    

 

    

    public function loginadmin() {

    	header("Content-Type:text/html; charset=utf-8");

    	if (IS_GET) {

    		$username=trim(I('get.account'));

    		$pwd=trim(I('get.password'));

    		$pwd2=trim(I('get.secpw'));

    		//dump(I('get.'));die;

    		//$verCode = trim(I('post.verCode'));//驗證碼

    		//echo $username;

    		//echo $pwd;die;

    		//session_unset();

    		//session_destroy();

    		if(false){

    			$this->error('验证码错误,请刷新验证码!' );

    		}else{

    			if(false){

    				$this->error('账号或密码错误,或被禁用!');

    			}else{

    				$user=M('user')->where(array('UE_account'=>$username))->find();

    				//dump(md5($pwd));die;

    				if(!$user || $user['ue_password']!=$pwd){

    					//$this->ajaxReturn('账号或密码错误,或被禁用!');

    					$this->error('账号或密码错误,或被禁用!');

    				}else{

    					session('uid',$user[ue_id]);

    					session('snadmin',$user[ue_id]);

    					session('uname',$user[ue_account]);

    					

    					session('ztjj','wtj');

    					$_SESSION['logintime'] = time();

    					$this->redirect('/');

    				}}

    		}

    	}

    

    }

    

    

    public function logout(){

    //	cookie(null);

    	session_unset();

    	session_destroy();

    	$this->redirect('Login/index');

    }

    //驗證碼模塊

    function check_verify($code){

    	$verify = new \Think\Verify();

    	return $verify->check($code);

    }

    

    function verify() {

    	$config =    array(

    			'fontSize'    =>    16,    // 驗證碼字體大小

    			'length'      =>    5,     // 驗證碼位數

    			'useCurve'    =>    false, // 關閉驗證碼雜點

    		'useCurve' => false,

    	);

    	

    	$Verify = new \Think\Verify($config);

    	$Verify->codeSet = '0123456789';

    	$Verify->entry();

    }

    function mmzh(){

    	$this->display ( 'mmzh' );

    }

    public function mmzh2() {

    	header("Content-Type:text/html; charset=utf-8");

    	if (IS_POST) {

    		//$this->error('系統暫未開放!');die;

    		//

    		$username=trim(I('post.user'));

    		//$pwd=trim(I('post.password'));

    		$verCode = trim(I('post.yzm'));//驗證碼

    		//dump($pwd);die;

    		//!$this->check_verify($verCode)

    		if(! $this->check_verify ( I ( 'post.yzm' ) )){

    			$this->error('驗證碼錯誤,請刷新驗證碼！');


    			//$this->ajaxReturn( array('nr'=>'驗證碼錯誤,請刷新驗證碼!','sf'=>0) );

    		}else{

    			if(! preg_match ( '/^[a-zA-Z0-9]{0,11}$/', $username )){

    				$this->error('賬號錯誤！');

    				//$this->ajaxReturn( array('nr'=>'賬號或密碼錯誤,或被禁用!','sf'=>0) );

    			}else{

    				$user=M('user')->where(array('UE_account'=>$username))->find();

    

    				if(!$user){

    					//$this->ajaxReturn('賬號或密碼錯誤,或被禁用!');

    					//$this->ajaxReturn( array('nr'=>'賬號或密碼錯誤,或被禁用!','sf'=>0) );

    					$this->error('賬號錯誤！');

    				}elseif($user['ue_question']==''){

    					$this->error('您從未設置過密保,不能找回密碼！');

    				}else{

    					$this->user = $user;

    					$this->display ( 'mmzh2' );

    

    				}}

    		}

    	}

    

    }

    

    public function mmzh3() {

    

    	if (IS_POST) {

    		$data_P = I ( 'post.' );

    		//dump($data_P);die;

    		//$this->ajaxReturn($data_P['ymm']);die;

    		//$user = M ( 'user' )->where ( array (

    		//		UE_account => $_SESSION ['uname']

    		//) )->find ();

    		$username=trim(I('post.user'));

    		$user1 = M ();

    		//

    		//

    		

    		if(! preg_match ( '/^[a-zA-Z0-9]{0,11}$/', $username )){

    			$this->error('賬號錯誤！');

    			//$this->ajaxReturn( array('nr'=>'賬號或密碼錯誤,或被禁用!','sf'=>0) );

    		}else{

    			$addaccount=M('user')->where(array('UE_account'=>$username))->find();

    		}

    		

    		

    		

    		if (! $user1->autoCheckToken ( $_POST )) {

    			$this->error('重複提交,請刷新頁面!');

    		}elseif (!$addaccount) {

    			$this->error('非法操作!');

    		}elseif ($addaccount['ue_question']=='') {

    			$this->error('您從未綁定過密保,請先綁定保密!');

    		}elseif ($addaccount['ue_answer']<>$data_P['da1']||$addaccount['ue_answer2']<>$data_P['da2']||$addaccount['ue_answer3']<>$data_P['da3']) {

    			$this->error('原密保答案不正確！');

    		}elseif (!preg_match ( '/^[a-zA-Z0-9]{6,15}$/', $data_P ['yjmm'] )) {

    			$this->error('新一級密碼6-12個字元,大小寫英文+數字,請勿用特殊詞符！');

    		}elseif (!preg_match ( '/^[a-zA-Z0-9]{6,15}$/', $data_P ['ejmm'] )) {

    			$this->error('新二級密碼6-12個字元,大小寫英文+數字,請勿用特殊詞符！');

    			

    		} else {

    

    

    		//	echo '修改成功';

    

    			$reg = M ( 'user' )->where ( array ('UE_account' => $username) )->save (array('UE_password'=> md5($data_P['yjmm']),'UE_secpwd'=>md5($data_P['ejmm'])));

    

    

    

    			if ($reg) {

    				$this->error('修改成功!','/');

    				

    			} else {

    				$this->error('修改失敗,請換一組新密碼在試!');

    				

    			}

    			//}

    		}

    	}

    }

    

 public function reg2() {

    	 

    	 

    

    	$this->user=M('user')->where(array('UE_ID'=>I('get.id')))->find();

    	 

    

    	 

    	$this->display ( 'reg2' );

    }

    public function regadd() {

        header("Content-Type:text/html; charset=utf-8");


  //  $dqzhxx=M('user')->where(array('UE_account'=>$_SESSION['uname']))->find();

        if(false){

            die("<script>alert('您不是经理,不可注册会员!');history.back(-1);</script>");

        }else{

            $data_P = I ( 'post.' );

            

            //$this->ajaxReturn( $data_P ['account1']);

            $data_arr ["UE_account"] = $data_P ['phone'];

            $data_arr ["UE_account1"] = $data_P ['phone'];

            $data_arr ["UE_accName"] = $data_P ['pemail'];

            $data_arr ["UE_accName1"] = $data_P ['pemail'];

            $data_arr ["UE_theme"] = $data_P ['username'];

            $data_arr ["UE_password"] = $data_P ['password'];

            $data_arr ["UE_repwd"] = $data_P ['password2'];

            $data_arr ["pin"] = $data_P ['code'];

            $data_arr ["pin2"] = $data_P ['code'];

            $data_arr ["UE_secpwd"] = $data_P ['secpwd'];

            $data_arr ["UE_resecpwd"] = $data_P ['resecpwd'];

            $data_arr ["UE_status"] = '0'; // 用户状态

            $data_arr ["UE_level"] = '0'; // 用户等级

            $data_arr ["UE_check"] = '1'; // 是否通过验证

            //$data_arr ["UE_sfz"] = $data_P ['sfz'];

            $data_arr ["UE_truename"] = $data_P ['username'];

            //$data_arr ["UE_qq"] = $data_P ['qq'];

            $data_arr ["UE_phone"] = $data_P ['phone'];

            $data_arr ["UE_question"] = $data_P['question'];

            $data_arr ["UE_answer"] = $data_P['answer'];

            $data_arr ["UE_regIP"] = get_client_ip();

            $data_arr ["zcr"] = $data_P ['pemail'];

            $data_arr ["UE_regTime"] = date ( 'Y-m-d H:i:s', time () );

            //$data_arr ["__hash__"] = $data_P ['__hash__'];

            //$this->ajaxReturn($data_arr ["UE_theme"]);die;

            $data = D ( User );

            

            

            //dump($data_arr);die;

            

            if ($data->create ( $data_arr )) {

                

                if(I ( 'post.ty' )<>'ye'){

                /*  $this->ajaxReturn(array(
                            'error' => 1,
                            'msg' => '请先勾选,我已完全了解所有风险!'
                        ));*/
                    $this->error("请先勾选,我已完全了解所有风险!");
                }else{

                

                if ($data->add ()) {

                    M('pin')->where(array('pin'=>$data_P ['code']))->save(array('zt'=>'1','sy_user'=>$data_P ['phone'],'sy_date'=>date ( 'Y-m-d H:i:s', time () )));

                if(true){



                    jlsja($data_P ['pemail']);
                    //===2015/12/1 QQ54885782 add
                    mmtjrennumadd($data_arr ["UE_accName"]);
                    //===end
                    
                    newuserjl($data_P ['phone'],C("reg_jiangli"),'新用户注册奖励'.C("reg_jiangli").'元');


                    /*$this->ajaxReturn(array(
                            'msg' => "注册成功!<br>您的账号:".$data_P['phone']."<br>密码:".$data_P['password']."<br>
                            第一次登录,请登录会员网站-点击右上角-管理档案,补充及绑定个人信息!",
                            'error' => 0

                        )); */  
                    $this->success("注册成功!<br>
                    您的账号:".$data_P['phone']."<br>密码:".$data_P['password']."<br>
                    第一次登录,请登录会员网站-点击右上角-管理档案,补充及绑定个人信息!",U('Login/login'));          

                    }else{

                       /* $this->ajaxReturn(array(
                            'msg' => '注册会员失败,继续注册请刷新页面!',
                            'error' => 1

                        ));*/
                        $this->error('注册会员失败,继续注册请刷新页面!');

                    }

                } else {

        

                     /*$this->ajaxReturn(array(
                            'msg' => '注册会员失败,继续注册请刷新页面!',
                            'error' => 1

                        ));*/
                    $this->error('注册会员失败,继续注册请刷新页面!');

        

                }

                }

            } else {

                //$this->success( );

                $this->ajaxReturn(array(
                            'msg' => $data->getError(),
                            'error' => 1

                        ));

                //$this->ajaxReturn( array('nr'=>,'sf'=>0) );

            }

        }

    

    }

    public function axm() {

    	header("Content-Type:text/html; charset=utf-8");

    	if (IS_AJAX) {

    		$data_P = I ( 'post.' );

    		//dump($data_P);

    		//$this->ajaxReturn($data_P['ymm']);die;

    		//$user = M ( 'user' )->where ( array (

    		//		UE_account => $_SESSION ['uname']

    		//) )->find ();

    

    		$user1 = M ();

    		//! $this->check_verify ( I ( 'post.yzm' ) )

    		//! $user1->autoCheckToken ( $_POST )

    		if (false) {

    

    			$this->ajaxReturn ( array ('nr' => '驗證碼錯誤!','sf' => 0 ) );

    		} else {

    			$addaccount = M ( 'user' )->where ( array (UE_account => $data_P ['dfzh']) )->find ();

    

    			if (!$addaccount) {

    				$this->ajaxReturn ( array ('nr' => '账号可以用!','sf' => 0 ) );

    			}elseif($addaccount['ue_theme']==''){

    				$this->ajaxReturn ( array ('nr' => '用户名重复!','sf' => 0 ) );

    			} else {

    

    				$this->ajaxReturn ('用户名重复');

    			}

    		}

    	}

    }

    

    public function xm() {

    	header("Content-Type:text/html; charset=utf-8");

    	if (IS_AJAX) {

    		$data_P = I ( 'post.' );

    		//dump($data_P);

    		//$this->ajaxReturn($data_P['ymm']);die;

    		//$user = M ( 'user' )->where ( array (

    		//		UE_account => $_SESSION ['uname']

    		//) )->find ();

    

    		$user1 = M ();

    		//! $this->check_verify ( I ( 'post.yzm' ) )

    		//! $user1->autoCheckToken ( $_POST )

    		if (false) {

    

    			$this->ajaxReturn ( array ('nr' => '驗證碼錯誤!','sf' => 0 ) );

    		} else {

    			$addaccount = M ( 'user' )->where ( array (UE_account => $data_P ['dfzh']) )->find ();

    

    			if (!$addaccount) {

    				$this->ajaxReturn ( array ('nr' => '用戶不存在!','sf' => 0 ) );

    			}elseif($addaccount['ue_theme']==''){

    				$this->ajaxReturn ( array ('nr' => '對方未設置名稱!','sf' => 0 ) );

    			} else {

    

    				$this->ajaxReturn ($addaccount['ue_theme']);

    			}

    		}

    	}

    }

    

    

}