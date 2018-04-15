<?php

namespace app\admin\controller;

use app\admin\Controller\Base;

class Comments extends Base
{
    public function index()
    {
        $commentsList=model('comments')->select();
        $commentsCount=model('comments')->count();
        return $this->fetch('comments-list',[
            'commentsList'=>$commentsList,
            'commentsCount'=>$commentsCount
        ]);
    }
    public function deleteComments(){
        return $this->delete('comments');
    }
    public function topComments($id,$article_id){
        model('comments')->where(['article_id'=>$article_id])->where('id','NEQ',$id)->setField(['is_top'=>0]);
        $comments=model('comments')->get($id);
        $comments->is_top=!$comments->is_top;
        if($comments->save()){
            return [
                'status'  => 2,
                'message' => '成功',
            ];
        }
    }
}
