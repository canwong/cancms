<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\AuthRule as AuthRules;
use Tree;
use Auth;

class Base extends Controller
{
	
	function _initialize(){
		//验证登陆
		$userId = session('userId');
		if (empty($userId)) {
			$this->redirect('login/index');
		}

		//取得左侧菜单
		$this->setMenu();

		//Auth验证
		$auth = new Auth;
		if (!$auth->check(request()->controller().'/'.request()->action(),$userId)) {
			$this->error(lang('auth_error'));
		}
		
	}

	//获取左侧菜单树&绑定标题
	protected function setMenu()
	{
		$mod = new AuthRules;
		$lists = $mod->field('create_time,update_time',true)->where('status',1)->order('pid ASC,sorts ASC')->select();
		$current = request()->controller().'/'.request()->action();
		$page_title = $mod->where('name',$current)->value('title');
		$this->assign('page_title',$page_title);
		$this->assign('trees',Tree::buildTree($lists));
	}
}