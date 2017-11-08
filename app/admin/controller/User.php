<?php
namespace app\admin\controller;

use think\Request;

use app\admin\model\User as Users;

class User extends Base
{
	private $mod;
	protected $request;

	public function _initialize()
	{
		parent::_initialize();
		$this->mod = new Users;
		$this->request = Request::instance();
	}

	public function index()
	{
		$lists = $this->mod->field('id,username,name,email,mobile,logins,status')->select();
		$this->assign('lists',$lists);
		return $this->fetch();
	}

	public function create()
	{
		if ($this->request->isPost()) {
			$data = $this->request->param();
			$callback = $this->update($data);
			return $callback;
		}
		return $this->fetch();
	}

	public function edit()
	{
		if ($this->request->isPost()) {
			$data = $this->request->param();
			switch ($data['action']) {
				case 'psw':
					$callback = $this->resetpsw($data);
					break;
				case 'moreinfo':
					$callback = $this->adventure($data);
					break;
	
				default:
					$callback = $this->update($data);
					break;
			}
			return $callback;
		}
		else if ($this->request->param('id')) {
			$id = $this->request->param('id');
			$info = $this->mod->field('id,username,name,email,mobile,sex,status')->find($id);
			if (!$info) {
				$this->error(lang('id_not_exist'));
			}
			$this->assign('info',$info);
			return $this->fetch();
		}
		else {
			$this->error();
		}
	}

	//处理数据
	protected function update($data)
	{
		$data['status']=isset($data['status'])?1:0;
		$isupdate = isset($data['id'])?true:false;
		if (!isset($data['id'])) {
			//不存在id,为插入操作
			$resault = $this->mod->validate(true)->allowfield(true)->save($data);
			$newid = $this->mod->id;

			//同步创建info记录
			$uinfo = $this->mod->userInfo()->save(['uid'=>$newid]);
		}
		else {
			//存在id,为更新数据
			$resault = $this->mod->validate('user.edit')->allowfield(true)->isupdate(true)->save($data);
		}
		if ($resault) {
			$callback = ['code'=>1,'msg'=>lang('ajax_success')];
		}
		else {
			$callback = ['code'=>0,'msg'=>lang('ajax_fail').$this->mod->getError()];
		}
		return $callback;
	}

	//删除数据
	public function delete()
	{
		if ($this->request->isPost() && $this->request->param('id')) {
			$id=$this->request->param('id');
			$user = $this->mod->get($id);
			if ($user->delete()) {
				//关联信息删除
				$user->userInfo->delete();
				$callback = ['code'=>1,'msg'=>lang('ajax_success')];
			}
			else {
				$callback = ['code'=>0,'msg'=>lang('ajax_fail').$this->mod->getError()];
			}
			return $callback;
		}
		else {
			$this->error();
		}
	}

	//修改密码
	protected function resetpsw()
	{
		if ($this->request->isPost()) {
			$data = $this->request->param();
			$data['status']=isset($data['status'])?1:0;
			$isupdate = isset($data['id'])?true:false;
			$where = [
				'id' => $data['id'],
				'password' => md5($data['oldpassword'])
			];
			$findold = $this->mod->where($where)->find();
			if ($findold) {
				//对比新旧密码
				if (md5($data['password'])==$findold['password']) {
					$callback = ['code'=>0,'msg'=>lang('same_psw')];
					return $callback;
				}
				$resault = $this->mod->validate('user.psw')->allowfield(true)->save($data,$data['id']);
				if ($resault) {
					$callback = ['code'=>1,'msg'=>lang('ajax_success')];
				}
				else {
					$callback = ['code'=>0,'msg'=>lang('ajax_fail').$this->mod->getError()];
				}
				return $callback;
			}
			else {
				$callback = ['code'=>0,'msg'=>lang('wrong_psw')];
				return $callback;
			}
		}
		else {
			$callback = ['code'=>0,'msg'=>lang('form_error')];
			return $callback;
		}
	}

	//修改进阶信息
	protected function adventure($data)
	{
		$user = $this->mod->get($data['id']);
		$resault = $user->userInfo->allowfield(true)->save($data);
		if ($resault) {
			$callback = ['code'=>1,'msg'=>lang('ajax_success')];
		}
		else {
			$callback = ['code'=>0,'msg'=>lang('ajax_fail')];
		}
		return $callback;
	}


}