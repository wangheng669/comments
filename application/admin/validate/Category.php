<?php

namespace app\admin\validate;

use think\Validate;

class Category extends Validate
{
    //定义规则
    protected $rule    = [
        'id'          => 'number',
        'cate_name' => 'require',
    ];
    protected $message = [
        'cate_name.require' => '分类名称不能为空',
    ];
}
