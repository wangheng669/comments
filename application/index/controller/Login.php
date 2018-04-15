<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch('index');
    }
    public function verifyMember(){
        $post_data=request()->post();
        $member=model('Member')->where(['username'=>$post_data['username']])->find();
        if($member){
            //判断密码是否正确
            if(md5($post_data['password'])==$member['password']&&$member['status']){
                session('user_id',$member['id']);
                session('user_name',$member['username']);
                return ['message'=>'登录成功','status'=>3];
            }
        }
        return ['message'=>'登录失败','status'=>0];
    }
    public function exitLogin(){
        session(null);
        return $this->success('退出成功');
    }
}
