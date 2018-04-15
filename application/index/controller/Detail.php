<?php
namespace app\index\controller;

use \think\Controller;

class Detail extends Controller
{
    public function index($id)
    {
        $article=model('Article')->get($id);
        $article['content']=htmlspecialchars_decode($article['content']);
        $commentsList=model('Comments')->where(['article_id'=>$article['id']])->order(['is_top'=>'desc'])->select();
        return $this->fetch('index',[
            'article'=>$article,
            'commentsList'=>$commentsList
        ]);
    }
    public function comments(){
        $post_data=request()->post();
        if(!session('user_id')){
            $this->success('你没有登录,请先登录','login/index');
        }
        $post_data['article_id']=$post_data['article_id'];
        $post_data['user_id']=session('user_id');
        $post_data['username']=session('user_name');
        if(model('comments')->save($post_data)){
            $this->success('评论成功');
        }
    }
}
