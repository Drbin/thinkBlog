<?php
namespace app\admin\controller;

use think\Controller;
use \think\Request;


class About extends Common
{
    public function index()
    {
        $this->isLogin();
        $list= model("About")->select();


        $this->assign("list",$list);

        return $this->fetch();
    }

    public function edit()
    {
        $this->isLogin();
        $datetime = date('Y-m-d H:i:s',time());

        $editData=model("About")->find(1);
        $this->assign("editData",$editData);

        $id= 1;
        $this->assign("id",$id);

        if(request()->isPost()){

            $data=[
                'about_name'=>input("post.name"),
                'about_words'=>input("post.words"),
                'about_content'=>input("post.content"),
                'about_create'=>$datetime,
            ];

            $result = model("About")->edit($data,$id);

            if($result==1){

                $this->success("添加成功","admin/About/index");

            }else{

                $this->error($result);

            }
        }
        return $this->fetch("edit");

    }

}
