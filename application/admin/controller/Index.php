<?php

namespace app\admin\controller;

use app\admin\controller\Base;

class Index extends Base
{
    public function index()
    {
        return $this->fetch('index');
    }
    public function welcome(){
        return $this->fetch('welcome');
    }
}
