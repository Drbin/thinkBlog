<?php
namespace app\admin\controller;

use think\Controller;
use think\Session;

class LoginOut extends Controller
{

    public function index(){
        Session::clear();
        $this->success("请您登录","/thinkBlog/login");

    }

}
