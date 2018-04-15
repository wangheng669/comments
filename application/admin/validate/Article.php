<?php

namespace app\admin\validate;

use think\Validate;

class Article extends Validate
{
    //定义规则
    protected $rule    = [
        'id'          => 'number',
        'title' => 'require',
        'cate_id' => 'require',
        'content' => 'require',
    ];
    protected $message = [
        'title.require' => '标题不能为空',
        'cate_id.require' => '分类不能为空',
        'content.require' => '内容不能为空',
    ];
}
