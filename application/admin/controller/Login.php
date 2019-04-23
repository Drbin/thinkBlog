<?php
namespace app\admin\controller;

use think\Controller;

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
                    $this->success("登录成功","/thinkBlog/admin");
                }
            }

        }
        return $this->fetch();
    }
}
