<?php
namespace Home\Controller;

use Think\Controller;

class CodeController extends CommonController
{
	
	const SCHEDULE_NAME = 'schedule_status';
	//生成排单币
	public function code_add(){
		if (IS_POST) {
            $data_P = I('post.');
            //dump($data_P);die;

            $user = M('user')->where(array(
                UE_account => $data_P['user']
            ))->find();

            if (!$user) {
                $this->error('用户 不存在！');
            } elseif (!preg_match('/^[0-9.]{1,10}$/', $data_P ['sl'])) {
                $this->error('请填生成数量！');
            } else {
                $cgsl = 0;
                for ($i = 0; $i < $data_P ['sl']; $i++) {
                    $pin = uniqid().rand(1000,9999);
                    //$pin=0;
                    if (!M('code')->where(array('code' => $pin))->find()) {
                        $data['onwer'] = $data_P['user'];
                        $data['code'] = $pin;
                        $data['status'] = 1;
                        $data['addtime'] = date('Y-m-d H:i:s', time());
                        if (M('code')->add($data)) {
                            $cgsl++;
                        }
                    }
                }
                $this->success('成功添加激活码' . $cgsl . '个');
            }
        }else{
			  $this->display();
		}
		
	}
	
	
	//排单币列表
	public function code_list(){
		
		$User = M('code'); // 實例化User對象
        $data = I('post.user');

        $User->count();
        //$map ['UG_dataType'] = array('IN',array('mrfh','tjj','kdj','mrldj','glj'));
       
        if ($data <> '') {
            $map['onwer'] = $data;
        }
		$cz=I('cz');
		if($cz != ''){
			$map['status']=$cz;
		}
        $count = $User->where($map)->count(); // 查詢滿足要求的總記錄數
        //$page = new \Think\Page ( $count, 3 ); // 實例化分頁類 傳入總記錄數和每頁顯示的記錄數(25)

        $p = getpage($count, 20);

        $list = $User->where($map)->order('id DESC')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('list', $list); // 賦值數據集
        $this->assign('page', $p->show()); // 賦值分頁輸出
		$this->display();
		
	}
	
	//删除排单币
	
	public function code_del(){
		$id=I('id');
		$map['id']=$id;
		$query=M('code')->where($map)->delete();
		if($query){
			
			 $this->success("删除排单币成功");
		}else{
			
			 $this->error("删除排单币失败");
		}
		
	}


    //排币单开关
    function codeStatus(){
        $status = $this->getConfig(self::SCHEDULE_NAME);
        $statusTxt = $status ? '开启' : '关闭';
        $this->assign("statusTxt" ,$statusTxt);
        $this->assign("status" ,$status);
        $this->display();
    }

    function codeStatusEdit(){
        $status = intval($_POST['status']);
        $this->updateConfig(self::SCHEDULE_NAME,$status);
        $this->success("配置成功");
    }
	
	
	
	
}