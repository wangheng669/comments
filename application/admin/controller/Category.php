<?php

namespace app\admin\controller;

use app\admin\controller\Base;

class Category extends Base
{
    public function index()
    {
        $categoryList=model('category')->select();
        $categoryCount=model('category')->count();
        return $this->fetch('category-list',[
            'categoryList'=>$categoryList,
            'categoryCount'=>$categoryCount,
        ]);
    }
    public function addCategory(){
        return $this->fetch('category-add');
    }
    public function editCategory($id){
        $categoryEdit=model('Category')->get($id);
        return $this->fetch('category-edit',[
            'categoryEdit'=>$categoryEdit
        ]);
    }
    public function saveCategory(){
        $post_data=request()->post();
        if(isset($post_data['id']))
        {
            return $this->operate('Category',$post_data,true);
        }else
        {
            return $this->operate('Category',$post_data,false);
        }
    }
    public function deleteCategory(){
        return $this->delete('Category');
    }
}
