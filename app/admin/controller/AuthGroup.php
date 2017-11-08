<?php
namespace app\admin\controller;

use think\Request;
use app\admin\model\AuthGroup as AuthGroups;
use app\admin\model\AuthGroupAccess;
use app\admin\model\AuthRUle;
use app\admin\model\User;
use Tree;

class AuthGroup extends Base
{
	private $mod;
	protected $request;

	public function _initialize()
	{
		parent::_initialize();
		$this->mod = new AuthGroups;
		$this->request = Request::instance();
	}

	public function index()
	{
		$lists = $this->mod->field('id,title,status')->select();
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
		return $this->fetch('edit');
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
		$isupdate = isset($data['id'])?true:false;
		$data['rules'] = implode(',', $data['rule']);
		$resault = $this->mod->allowfield(true)->isupdate($isupdate)->save($data);
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

	//成员分配
	public function member($id)
	{
		$accessMod = new AuthGroupAccess;
		$group_id = $this->request->param('id');
		if ($this->request->isPost()) {
			//获取表单
			$params = $this->request->param();
			//删除原成员
			$accessMod->where('group_id',$params['group_id'])->delete();
			foreach ($params['uid'] as $key => $value) {
				$data[] = ['group_id'=>$params['group_id'],'uid'=>$value];
			}
			$resault = $accessMod->saveAll($data);
			if ($resault) {
				$callback = ['code' => 1, 'msg' => lang('ajax_success')];
			}
			else {
				$callback = ['code' => 0, 'msg' => lang('ajax_fail').$accessMod->getError()];
			}
			return $callback;
		}
		else {
			//返回成员配置
			$userMod = new User;
			$alluser = $userMod->field('id,username')->select();
			$members = $accessMod->where('group_id',$group_id)->column('uid');
			$member = implode(',', $members);
			$this->assign('userlist',$alluser);
			$this->assign('member',$member);
			$this->assign('id',$id);
			return $this->fetch();
		}
	}
}