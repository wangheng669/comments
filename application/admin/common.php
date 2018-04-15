<?php

    function role($val){
        switch($val){
            case 0:return "超级管理员";
            case 1:return "编辑人员";
            case 2:return "宣传人员";
        }
    }
    function article($val){
        $article=model('Article')->get($val);
        return $article['title'];
    }