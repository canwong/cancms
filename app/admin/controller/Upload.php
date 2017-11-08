<?php
namespace app\admin\controller;

use think\Image;
use think\Request;
use app\admin\model\UserInfo;

class Upload extends Base
{
	protected $request;

	public function _initialize()
	{
		parent::_initialize();
		$this->request = Request::instance();
	}

	public function avatar()
	{
		if ($this->request->isPost()) {
			$params = $this->request->param(true);
			//验证文件
			$validate = validate('Upload');
			if (!$validate->check($params)) {
				$this->error($validate->getError());
				exit();
			}
			//获取扩展名
			$temp_ext = explode('.', $_FILES["avatar_img"]["name"]);
			$ext = end($temp_ext);
			//文件名
			$name = md5($params['avatar_img']).'_'.$params['id'].'.'.$ext;
			//组成路径
			$path = 'uploads'.DS.'avatar'.DS.$name;
			//打开图片
			$image = Image::open($params['avatar_img']);
			//翻转,x轴为上下翻，Y轴为左右翻
			if ($params['dataScaleX']!=1) {
				$image->flip(Image::FLIP_Y);
			}
			if ($params['dataScaleY']!=1) {
				$image->flip();
			}
			//旋转度数转换为顺时针
			$rotate = $params['dataRotate']<0?$params['dataRotate']+360:$params['dataRotate'];
			//截取&旋转
			$resault = $image->crop($params['dataWidth'],$params['dataHeight'],$params['dataX'],$params['dataY'])->rotate($rotate)->save($path);
			if (!$resault) {
				$this->error($image->getError());
			}
			else {
				//更新info
				$uiMod = new UserInfo;
				$uinfo = $uiMod->where('uid',$params['id'])->find();
				$oldavatar = $uinfo['avatar'];
				//新旧文件名对比，不同则更新数据库
				if ($oldavatar != $name) {
					$up_info = $uinfo->save(['avatar'=>$name]);
					//非默认头像时删除旧图片
					if ($oldavatar != 'avatar.png') {
						unlink(ROOT_PATH.'public'.DS.'uploads'.DS.'avatar'.DS.$oldavatar);
					}
					//当前用户时更新缓存头像
					if ($params['id'] == session('userId')) {
						cookie('avatar',$name);
					}
					if (!$up_info) {
						$callback = ['code'=>0,'msg'=>lang('ajax_fail').$uiMod->getError()];
						return $callback;
					}
				}
				$callback = ['code'=>1,'msg'=>lang('ajax_success')];
				return $callback;
				//删除旧头像				
			}		
		}
		else {
			$callback = ['code'=>0,'msg'=>lang('form_error')];
			return $callback;
		}
	}

	//个人签名插入图片
	public function infopic()
	{
		if ($this->request->isPost()) {
			$file = $this->request->file('infopic');
			if ($file) {
				$info = $file->validate(['size'=>1048576,'ext'=>'jpeg,jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'info');
				if ($info) {
					return $info->getSaveName();
				}
				else {
					return $file->getError();
				}
			}
			else {
				return 'Empty file';
			}	
		}
		else {
			$this->error(lang('form_error'));
		}
	}

	//缩略图选择
	public function thumbnail()
	{
		if ($this->request->isPost()) {
			$file = $this->request->file('thumbnail');
			if ($file) {
				$info = $file->validate(['size'=>1048576,'ext'=>'jpeg,jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'thumbnail');
				if ($info) {
					return $info->getSaveName();
				}
				else {
					return $file->getError();
				}
			}
			else {
				return 'Empty file';
			}	
		}
		else {
			$this->error(lang('form_error'));
		}
	}


}