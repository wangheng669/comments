<?php
namespace app\index\controller;

use \think\Controller;

class Index extends Controller
{
    public function index($id=2)
    {
        $articleList=model('Article')->where(['cate_id'=>$id])->select();
        $cateList=model('Category')->select();
        $username=session('user_name');
        return $this->fetch('index',[
            'articleList'=>$articleList,
            'cateList'=>$cateList,
            'username'=>$username,
        ]);
    }
}
