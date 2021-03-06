<?php
namespace app\admin\controller;

use think\Controller;
use \think\Request;


class Type extends Common
{
    public function index()
    {
        $this->isLogin();

        $list= model("Type")->order(["type_order","type_sort"],"asc")->paginate(100);
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
                'type_name'=>input("post.name"),
                'type_order'=>input("post.order"),
                'type_sort' => input("post.sort"),
                'type_desc'=>input("post.desc"),
                'type_create'=> $datetime
            ];
            $result = model("Type")->add($data);
            if($result==1){
                $this->success("添加成功","admin/Type/index");
            }else{
                $this->error($result);
            }
        }
        return $this->fetch("add");
    }
    public function edit()
    {
        $this->isLogin();
        $editData=model("Type")->find(input("id"));
        $this->assign("editInfo",$editData);

        $id= input("id");
        $this->assign("id",$id);

        if(request()->isPost()){
            $data=[
                'type_name'=>input("post.name"),
                'type_order'=>input("post.order"),
                'type_sort' => input("post.sort"),
                'type_desc'=>input("post.desc")
            ];
            $result = model("Type")->edit($data,$id);
            if($result==1){
                $this->success("添加成功","admin/Type/index");
            }else{
                $this->error($result);
            }
        }
        return $this->fetch("edit");

    }
    public function del()
    {
        $res=model("Type")->where("type_id","=",input("id"))->delete();
        if($res){
            $this->success("删除成功","admin/Type/index");
        }else{
            $this->error($res);
        }
    }
}
