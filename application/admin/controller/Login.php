<?php
namespace app\admin\controller;

use think\Controller;
use think\Session;
class Login extends Controller
{
    public function index()
    {
        if(request()->isPost()){
            $data=[
                'username'=>input("post.username"),
                'password'=>md5(input("post.password")),
                'captcha'=>input("post.captcha"),

            ];
            $result= model("Login")->login($data);
            if($result==9999){
               $this->error("验证码错误");
            }else{
                if ($result==1){
                    Session::set("username",input("post.username"));
                    Session::set('isLogin',true);
                    $this->success("登录成功","/thinkBlog/panel");
                }
            }

        }
        return $this->fetch();
    }
}
