<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Base extends Controller
{
    public function _initialize(){
        $this->isAlreadyLogin();
    }
    //判断是否登录
    public function isAlreadyLogin(){
        if(session('id')==null){
            $this->success('请登录','login/index');
        }
    }
    public function operate($model,$data,$where)
    {
        $status    = 0;
        $message   = '操作失败';
        $validate=validate($model);
        if(!$validate->check($data)){
            $message = $validate->getError();
        }else if($where&&model($model)->allowField(true)->save($data, ['id' => $data['id']])){
                $status  = 1;
                $message = '操作成功';
        } else if(model($model)->allowField(true)->save($data)) {
                $status  = 1;
                $message = '操作成功';
        }
        $result_data = [
            'status'  => $status,
            'message' => $message,
        ];
        return $result_data;
    }
    public function delete($model)
    {
        $status    = 0;
        $message   = '删除失败';
        $post_data = request()->post();
        if (!empty($post_data)) {
            $id = intval($post_data['id']);
            if (model($model)->destroy(['id' => $id])) {
                $status  = 2;
                $message = '删除成功';
            };
        }
        $data = [
            'status'  => $status,
            'message' => $message,
        ];
        return $data;
    }
    public function status($model,$id){
        $admin=model($model)->get($id);
        $admin->status=!$admin->status;
        if($admin->save()){
            return [
                'status'  => 2,
                'message' => '成功',
            ];
        }else{
            return [
                'status'  => 0,
                'message' => '失败',
            ];
        }
    }
}
