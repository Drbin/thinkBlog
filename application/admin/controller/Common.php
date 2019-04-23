<?php
namespace app\admin\controller;

use think\Controller;
use think\Session;

class Common extends Controller
{
    public function isLogin(){
        $this->assign("username",Session::get('username'));
        if(!Session::get('isLogin')){
            $this->success("请您先登录","/thinkBlog/login");
        }
    }
    public function loginOut(){
        Session::clear();
        $this->success("请您登录","/thinkBlog/login");

    }

}
