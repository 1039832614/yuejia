<?php
namespace app\index\controller;

use think\Db;
use think\Validate;
use think\Controller;
use think\facade\Session;

class Index extends Base{
	
	/**
	 * 进入约驾首页
	 * @return $brand 用户车的品牌
	 * @return $usercar 用户车的型号
	 * @return $car 所有的车的品牌
	 */
	public function index(){
		//1.查询出该用户的id
		$user = Session::get('user');
		//2.根据userid 查询出他的车辆信息。
		$id = $user['cid'];
		//3.查询出用户的车的信息
		$usercar = Db::name('car')->where('id','=',$id)->find();
		//4.查询出这个车的品牌
		$pid = $usercar['pid'];
		$brand = Db::name('car')->where('id','=',$pid)->find();
		//5.查询出所有的车的品牌
		$car = Db::name('car')
		       ->where('pid','=',0)
			   ->select();
	    $this->assign('brand',$brand);
		$this->assign('usercar',$usercar);
	    $this->assign('car',$car);
		return $this->fetch();
	}
	/**
	 * 约驾操作
	 * */
	public function sudu(){
		$data = input();
		$data['username'] = Session::get('user')['username'];
		$res = Db::name('reserve_drive')
		       ->insert($data);
	    if($res){
	    	$this->success('约驾成功','index/index/list');
	    } else {
	    	$this->error('约驾失败','index/index/index');
	    }
	}
	/**
	 * 约驾信息列表页
	 * @return $data 所有的约驾信息
	 */
	public function list(){
		//1.查询出reserve_drive中所有的信息
		$data = Db::name('car')
		        ->alias('c')
				->join('reserve_drive a','a.cid = c.id')
				->select();
		//2.将数据赋值给模板
		$this->assign('data',$data);
		return $this->fetch();	
	}
	/**
	 *获取人数 
	 * @return $data 人数 和 id
	 */
	public function addPeople(){
		$data = input();
		return view('add_people')->assign([
          'data'  => $data
        ]);
	}
	/**
	 * 改变已经预约人数
	 */
	public function doAddPeople(){
		$data = input();
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
