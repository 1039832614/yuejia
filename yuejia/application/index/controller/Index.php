<?php
namespace app\index\controller;
use think\Db;
use think\facade\Request;
use think\Validate;
use think\Controller;
use think\facade\Session;
class Index extends Controller{

    public function initialize(){
    	if (!Session::has('user')) {
			$this->error('请先登录...', 'login/login');
		}
    }
	/**
	 * 进入约驾首页
	 * @return [type] [description]
	 */
	public function index(){
		//1.查询出该用户的id
		$user = Session::get('user');
		//2.根据userid 查询出他的车辆信息。
		$id = $user['cid'];
		$usercar = Db::name('car')->where('id','=',$id)->find();
		$pid = $usercar['pid'];
		$brand = Db::name('car')->where('id','=',$pid)->find();
		$car = Db::name('car')
		       ->where('pid','=',0)
			   ->select();
	    $this->assign('brand',$brand);
		$this->assign('usercar',$usercar);
	    $this->assign('car',$car);
		return $this->fetch();
	}
	/*
	 * 约驾
	 * */
	public function sudu(){
		$data = request()->param();
		$data['username'] = Session::get('user')['username'];
		
		$res = Db::name('reserve_drive')
		       ->insert($data);
	    if($res){
	    	$this->success('约驾成功','index/index/list');
	    } else {
	    	$this->error('约驾失败','index/index/index');
	    }
	}
	/*
	 * 约驾信息列表页
	 * */
	public function list(){
		//1.查询出reserve_drive中所有的信息
		$data = Db::name('car')
		        ->alias('c')
				->Join('reserve_drive a','a.cid = c.id')
				->select();
		//2.将数据赋值给模板
	
		$this->assign('data',$data);
		return $this->fetch();	
	}
	public function addPeople(){
		$data = request()->param();
		$this->assign('data',$data);
		return $this->fetch();
	}
	public function doAddPeople(){
		$data = $_POST;
		$id = $data['id'];
		$people = $data['anumber'];
		//搜索当前约驾活动的信息
		$res = Db::name('reserve_drive')
		       ->where('id','=',$id)
			   ->update($data);
	    if($res){
	    	$this->success('加入成功','index/index/list');
	    } else {
	    	$this->error('加入失败','index/index/list');
	    }
		
	}
}
