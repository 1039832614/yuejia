<?php
namespace app\index\validate;

use think\Validate;
/**
 * 用户验证器
 */
class User extends Validate
{
	// 验证规则
	protected $rule = [
		// 字段名1 => '规则1|规则2|....'
		'username'   => 'require|length:2,100|unique:user',
		'pwd'   => 'require|min:6',
		'phone'     => "require|number|length:11|mobile",
	];
	
	// 提示消息
	protected $message = [
		'username.require'   => '用户名必须填写',
		'username.length'    => '用户名长度非法(2-100位)',
		'username.unique'    => '用户名已存在，请换一个',
		'pwd.require'   => '密码必须填写',
		'pwd.min'       => '密码最短是6位',
		'phone.require' => '手机号必须填写',
		'phone.number'  => '手机号请输入数字',
  		'phone.mobile'  => '手机号非法',	
	];
}
