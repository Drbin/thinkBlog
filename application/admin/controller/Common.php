<?php
namespace app\admin\controller;

use think\Controller;


class Common extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}
