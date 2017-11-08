<?php
namespace app\admin\controller;

use think\Request;
use app\admin\model\AuthRule as AuthRules;
use Tree;

class AuthRule extends Base
{
	private $mod;
	protected $request;

	public function _initialize()
	{
		parent::_initialize();
		$this->mod = new AuthRules;
		$this->request = Request::instance();
	}

	public function index()
	{
		return $this->fetch();
	}

	public function create()
	{
		if ($this->request->isPost()) {
			$data = $this->request->param();
			$callback = $this->update($data);
			return $callback;
		}
		else {
			return $this->fetch('edit');
		}
	}

	public function edit()
	{
		if ($this->request->isPost()) {
			$data = $this->request->param();
			$callback = $this->update($data);
			return $callback;
		}
		else if ($this->request->param('id')) {
			$id = $this->request->param('id');
			$info = $this->mod->get($id);
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
		$data['ismenu']=isset($data['ismenu'])?1:0;
		$isupdate = isset($data['id'])?true:false;
		$resault = $this->mod->validate(true)->allowfield(true)->isupdate($isupdate)->save($data);
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
		if ($this->request->isPost() && $id=$this->request->param('id')) {
			$resault = $this->mod->get($id)->delete();
			if ($resault) {
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
}