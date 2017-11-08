<?php
namespace app\admin\validate;

use think\Validate;

class Upload extends Validate
{
	protected $rule = [
		//验证规则['name','rule1|rule2','msg1|msg2']
		['avatar_img','file|image|max:2048000','文件与否|类型|尺寸错误'],
	];
}