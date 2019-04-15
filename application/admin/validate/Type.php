<?php

namespace app\admin\validate;

use think\Validate;

class Type extends Validate
{
    protected $rule=[
        'type_name|分类名称'=>'require|unique:type_tbl',
        'type_order|所属栏目'=>'require|number',
        'type_sort|排序'=>'require|number',
    ];
    public function sceneAdd()
    {
        return $this->only(["type_name","type_order","type_sort"]);
    }
    public function sceneEdit()
    {
        return $this->only(["type_name","type_order","type_sort"]);
    }
}