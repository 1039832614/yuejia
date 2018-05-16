<?php
namespace app\index\controller;

use think\Db;
use think\Validate;
use think\Controller;
use think\facade\Session;

class Login extends Controller{
	 /**
     * 登录界面
     * @return [type] [description]
     */
	public function login(){
		return $this->fetch();
	}

	/**
	 * 进行登录
	 * @return [type] [description]
	 */
	public function doLogin(){
		//1.获取传入的信息
		$data = request()->param();
		$username = $data['username'];
		$pwd = $data['pwd'];
		//2.查找数据库中是否有相应信息
		$res = Db::name('user')
		       ->where('username',"=",$username)
		       ->find();
		if($res && $res['pwd'] == $pwd){
			Session::set('user',$res);
			$this->success('登录成功','index/index/index');
		} else {
			if(!($res['pwd'] == $pwd)){
				$this->error('密码不匹配，请重新输入','index/login/login');
			} elseif(empty($res)) {
				$this->error('用户名不存在，请重新输入','index/login/login');
			}	
		}
	}
	/**
	 * 退出登录，销毁session
	 */
	public function goOut(){
		session('user', null);
		// 跳转到登录页面
		$this->redirect('index/login/login');
	}
}
?>