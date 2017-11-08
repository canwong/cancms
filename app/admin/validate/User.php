<?php
namespace app\admin\validate;

use think\Validate;

class User extends Validate
{
	protected $rule = [
		//验证规则['name','rule1|rule2','msg1|msg2']
		['username','require|unique:user','{%require}|{%user_unique}'],
		['password','require|confirm|min:6','{%require}|{%psw_confirm}|{%psw_too_short}'],
		['email','email','{%email_format_error}'],
		['mobile','number','{%mobile_format_error}'],
		['sex','require|in:0,1','{%require}|{%sex_error}'],
		['status','require|in:0,1','{%require}|{%status_error}'],
	];

	protected $scene = [
		'edit'  =>  ['email','mobile','sex','status'],
		'psw'	=>  ['password'],
	];
}