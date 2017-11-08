<?php
namespace app\admin\controller;

use think\Request;
use app\common\model\Article as Articles;
use app\common\model\Category;
use Tree;

class Article extends Base
{
	private $mod;
	protected $request;

	public function _initialize()
	{
		parent::_initialize();
		$this->mod = new Articles;
		$this->request = Request::instance();
	}

	public function index()
	{
		$lists = $this->mod->field('id,type_id,title,thumbnail,status')->order('id DESC')->paginate(20);
		$this->assign('lists',$lists);
		$this->assign('page',$lists->render());
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
			$category = $this->cattree();
			$this->assign('category',$category);
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
			$category = $this->cattree();
			$this->assign('category',$category);
			$this->assign('info',$info);
			return $this->fetch();
		}
		else {
			$this->error();
		}
	}

	protected function cattree()
	{
		$catMod = new Category;
		$lists = $catMod->field('id,pid,title,status,sorts,thumbnail')->select();
		Tree::$treeList = [];
		$cattree = Tree::buildTree($lists);
		return $cattree;
	}

	//处理数据
	protected function update($data)
	{
		$data['status']=isset($data['status'])?1:0;
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