<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\facade\Request;

class Car extends Controller{
	

	/*
	 * 根据选取的一级品牌，显示出所有的汽车型号
	 * */
	public function carTwo(){
		$id = request()->param()['id'];

		$carType = Db::name('car')
		           ->where('pid','=',$id)
				   ->select();
		
		return json_encode($carType);
	}
	
}
?>