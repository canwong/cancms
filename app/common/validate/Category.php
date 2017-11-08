<?php
namespace app\common\validate;

use think\Validate;

class Category extends Validate
{
	protected $rule = [
		//验证规则['name','rule1|rule2','msg1|msg2']
		['title','require','{%require}']
	];
}