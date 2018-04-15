<?php

namespace app\admin\controller;

use app\admin\Controller\Base;
class Member extends Base{
    public function index()
    {
        $memberCount=model('Member')->count();
        $memberList=model('Member')->select();
        return $this->fetch('member-list',[
            'memberCount'=>$memberCount,
            'memberList'=>$memberList,
        ]);
    }
    public function addMember(){
        return $this->fetch('member-add');
    }
    public function editMember($id){
        $memberEdit=model('Member')->get($id);
        return $this->fetch('member-edit',[
            'memberEdit'=>$memberEdit,
        ]);
    }
    public function saveMember(){
        $post_data=request()->post();
        $post_data['password']=md5($post_data['password']);
        if(isset($post_data['id']))
        {
            return $this->operate('Member',$post_data,true);
        }else{
            return $this->operate('Member',$post_data,false);
        }
    }
    public function deleteMember(){
        return $this->delete('member');
    }
    public function statusMember($id){
        return $this->status('member',$id);
    }
}
