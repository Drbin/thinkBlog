<?php
use think\Route;
// 注册路由到index模块的News控制器的read操作
Route::rule(
    [
        'type'=>'admin/Type/index',
        'addType'=>'admin/Type/add',
        'editType'=>'admin/Type/edit',
        'delType'=>'admin/Type/del',
        'text'=>'admin/Text/index',
        'addText'=>'admin/Text/add',
        'editText'=>'admin/Text/edit',
        'delText'=>'admin/Text/del',
        '/'=>'info/Index/index',
        'web'=>'info/Index/web',
        'web/:id'=>'info/Index/web',
        'random'=>'info/Index/random',
        'random/:id'=>'info/Index/random',
        'about'=>'info/Index/about',
    ]
);

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
