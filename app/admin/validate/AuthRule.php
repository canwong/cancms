<?php
namespace app\admin\validate;

use think\Validate;

class AuthRule extends Validate
{
	protected $rule = [
		//验证规则['name','rule1|rule2','msg1|msg2']
		['pid','require|number','{%require}|{%number}'],
		['name','require|unique:auth_rule','{%require}|{%name_unique}'],
		['title','require','{%require}']
	];
}