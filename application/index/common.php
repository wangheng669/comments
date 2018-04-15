<?php
    function comments($value){
       return  model('Comments')->where(['id'=>$value])->count();
    }