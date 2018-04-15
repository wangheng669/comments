<?php

namespace app\admin\controller;

use app\admin\controller\Base;

class Article extends Base
{
    public function index()
    {
        $articleList=model('Article')->select();
        $articleCount=model('Article')->count();
        return $this->fetch('article-list',[
            'articleList'=>$articleList,
            'articleCount'=>$articleCount,
        ]);
    }
    public function addArticle(){
        $cateList=model('Category')->select();
        return $this->fetch('article-add',[
            'cateList'=>$cateList,
        ]);
    }
    public function editArticle($id){
        $articleEdit=model('article')->get($id);
        $cateList=model('Category')->select();
        $articleEdit['content']=htmlspecialchars_decode($articleEdit['content']);
        return $this->fetch('article-edit',[
            'articleEdit'=>$articleEdit,
            'cateList'=>$cateList,
        ]);
    }
    public function saveArticle(){
        $post_data=request()->post();
        if(isset($post_data['id']))
        {
            return $this->operate('Article',$post_data,true);
        }else
        {
            return $this->operate('Article',$post_data,false);
        }
    }
    public function deleteArticle(){
        $post_data=request()->post();
        model('comments')->where(['article_id'=>$post_data['id']])->delete();
        return $this->delete('Article');
    }
}
