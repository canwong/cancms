<?php
namespace app\common\model;

use think\Model;

class Category extends Model
{
	public function setDescriptionAttr($value)
	{
		return htmlspecialchars($value);
	}
}