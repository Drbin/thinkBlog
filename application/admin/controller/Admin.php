<?php
namespace app\admin\controller;

use think\Controller;
use \think\Request;


class Admin extends Common
{
    public function index()
    {
        $this->isLogin();
        $list= model("Admin")->paginate(10);
        $page=$list->render();
        $this->assign("list",$list);
        $this->assign("page",$page);
        return $this->fetch();
    }
    public function add()
    {
        $this->isLogin();
        $datetime = date('Y-m-d H:i:s',time());
        $request = Request::instance();
        if(request()->isPost()){
            $data=[
                'admin_name'=>input("post.name"),
                'admin_login_name'=>input("post.adminName"),
                'admin_password' => md5(input("post.password")),
                'admin_create'=> $datetime
            ];
            $result = model("Admin")->add($data);
            if($result==1){
                $this->success("添加成功","admin/Admin/index");
            }else{
                $this->error($result);
            }
        }
        return $this->fetch("add");
    }

    public function del()
    {
        $res=model("Admin")->where("admin_id","=",input("id"))->delete();
        if($res){
            $this->success("删除成功","admin/Admin/index");
        }else{
            $this->error($res);
        }
    }
}
