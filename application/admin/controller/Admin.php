<?php

namespace app\admin\controller;

use app\admin\controller\Base;

class Admin extends Base
{
    public function index()
    {
        $adminList=model('admin')->select();
        $adminCount=model('admin')->count();
        return $this->fetch('admin-list',[
            'adminList'=>$adminList,
            'adminCount'=>$adminCount,
        ]);
    }
    public function addAdmin(){
        return $this->fetch('admin-add');
    }
    public function editAdmin($id){
        $adminEdit=model('Admin')->get($id);
        return $this->fetch('admin-edit',[
            'adminEdit'=>$adminEdit,
        ]);
    }
    public function saveAdmin(){
        $post_data=request()->post();
        $post_data['password']=md5($post_data['password']);
        if(isset($post_data['id']))
        {
            return $this->operate('Admin',$post_data,true);
        }else{
            return $this->operate('Admin',$post_data,false);
        }
    }
    public function deleteAdmin(){
        return $this->delete('admin');
    }
    public function statusAdmin($id){
        return $this->status('admin',$id);
    }
}
