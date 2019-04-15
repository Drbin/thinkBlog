<?php
namespace app\info\controller;

use think\Controller;


class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function web()
    {
        $this->assign("flag",1);
        if(input("id")){
            $editData=model("Text")->find(input("id"));
            $this->assign("editInfo",$editData);
            return $this->fetch('detail');
        }else{
            $info= model("Text")->order(["news_type"],"asc")->paginate(10);
            $page=$info->render();
            $this->assign("info",$info);
            $this->assign("page",$page);
        }
        return $this->fetch("page");
    }
    public function random(){
        $this->assign("flag",2);
        if(input("id")){
            $editData=model("Text")->find(input("id"));
            $this->assign("editInfo",$editData);
            return $this->fetch('detail');
        }else{
            $info= model("Text")->order(["news_type"],"asc")->paginate(10);
            $page=$info->render();
            $this->assign("info",$info);
            $this->assign("page",$page);
        }
        return $this->fetch("page");
    }
    public function about(){

        return $this->fetch("about");
    }
}
