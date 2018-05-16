<?php
namespace app\index\controller;

use think\Db;
use think\facade\Request;
use think\Validate;
use think\Controller;
use think\facade\Session;

class Register extends Controller{
	/**
	 * 注册界面
	 * @return [type] [description]
	 */
	public function register(){
		$car = Db::name('car')
		       ->where('pid','=',0)
			   ->select();
	    $this->assign('car',$car);
		return $this->fetch();
	}
	/**
	 * 进行注册
	 * @return [type] [description]
	 */
	public function doRegister(){
		//1.获取表单提交信息
		$data = request()->param();
		//2.验证数据
		$result = $this->validate(
            $data,
            'app\index\validate\User');

        if (true !== $result) {
            // 验证失败 输出错误信息
            
			$this->error("$result");
        } else {
        //3.插入数据
		$res = Db::name('user')->insert($data);
		if($res){
			$this->success('注册成功','index/login/login');
		} else {
			$this->error('注册失败','index/register/register');
		}
        }
		
	}
}
?>