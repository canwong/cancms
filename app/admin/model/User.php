<?php
namespace app\admin\model;

use think\Model;

class User extends Model
{
	protected $readonly = ['username'];

	protected $insert = ['reg_ip', 'last_time', 'last_ip'];

    //关联
    public function userInfo()
    {
        return $this->hasOne('UserInfo','uid');
    }

	protected function setPasswordAttr($value)
	{
		return md5($value);
	}

	protected function setRegIpAttr()
    {
        return request()->ip();
    }

    protected function setLastTimeAttr()
    {
        return time();
    }

    protected function setLastIpAttr()
    {
        return request()->ip();
    }

    //登陆模型
    public function login(array $data)
    {
        //验证信息
        $user = $this->where('username',$data['username'])->find();
        if (!$user) {
            return -2;
        }
        else {
            if (md5($data['password'])!=$user['password']) {
                return -1;
            }
            else {
                //set Session & cacha
                session('userId',$user['id']);
                $showname = $user['name']?$user['name']:$user['username'];
                cookie('uid',$user['id']);
                cookie('name',$showname);
                cookie('avatar',$user->userInfo->avatar);
                //update last_time & last_ip
                $this->loginInfo($user['id'],$user['logins']);
                //insert login log

                //undone
                return 1;
            }
        }
    }

    //update login info
    protected function loginInfo($id,$logins)
    {
        $data = [
            'logins'    => $logins+1,
            'last_ip'   => request()->ip(),
            'last_time' => time()
        ];
        $this->where('id',$id)->update($data);
    }
    //insert login Log
    protected function loginLog()
    {
        # code...
    }

}