<?php
namespace app\admin\model;

use think\Model;

class UserInfo extends Model
{
	protected $insert  = ['avatar'];

	public function setAvatarAttr($value)
	{
		return $value?$value:'avatar.png';
	}

}