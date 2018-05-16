<?php
namespace app\index\controller;

use think\Db;
use think\Validate;
use think\Controller;
use think\facade\Session;

class Base extends Controller{
	/**
	 * 判断是否登录
	 */
    public function initialize(){
//  	$this->uid = Session::get('user');
    	if (!Session::has('user')) {
			$this->error('请先登录...', 'login/login');
		}
    }
}
?>