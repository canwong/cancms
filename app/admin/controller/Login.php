<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\User;

class Login extends Controller
{

    public function index()
    {
        return $this->fetch();
    }

    //登陆
    public function login()
    {
        if ($this->request->isPost()) {
            $params = $this->request->param();
            $rule = [
                ['username','require','{%require}'],
                ['password','require','{%require}'],
                ['code','require|captcha','{%require}|{%captcha_error}']
            ];
            $validate = $this->validate($params,$rule);
            if (true !== $validate) {
                $callback = ['code'=>0,'msg'=>$validate];
                return $callback;
            }
            $userMod = new User;
            $resault = $userMod->login($params);
            if ($resault!=1) {
                switch ($resault) {
                case '-2':
                    $callback = ['code'=>0,'msg'=>'user not exist'];
                    break;
                case '-1':
                    $callback = ['code'=>0,'msg'=>'password wrong'];
                    break;              
                default:
                    $callback = ['code'=>0,'msg'=>'unknow error:'.$resault];
                    break;
                }
            }
            else {
                $callback = ['code'=>1,'msg'=>lang('ajax_success')];
            }
            return $callback;
        }
        //非法表单
        else {
            $callback = ['code'=>0,'msg'=>lang('form_error')];
            return $callback;
        }
    }

    public function logout()
    {
        session('userId', null);
        cookie('name', null);
        cookie('uname', null);
        cookie('uid', null);
        cookie('avatar', null);
        $this->redirect('login/index');
    }
}
