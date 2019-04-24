<?php
namespace app\info\controller;

use think\Controller;


class Index extends Controller
{
    public function index()
    {
        $info= model("Text")
            ->order("news_create","desc")
            ->limit(10)
            ->select();
        $this->assign("info",$info);
        return $this->fetch();
    }
    public function web()
    {
        $this->assign("types",'');
        $this->assign("flag",1);
        $type= model("Type")->where('type_order','=',1)->select();

        $this->assign("type",$type);
        if (input("name")=="type"){
            $info= model("Text")
                ->where("news_order","=",1)
                ->where('news_type','=',input('type'))
                ->order("news_create","desc")
                -> paginate(6);
            $page=$info->render();
            $this->assign("types",input("type"));
            $this->assign("info",$info);
            $this->assign("page",$page);
        }else{
            if(input("id")){
                $editData=model("Text")->find(input("id"));
                $this->assign("editInfo",$editData);
                return $this->fetch('detail');
            }else{
                $info= model("Text")
                    ->where("news_order","=",1)
                    ->order("news_create","desc")->paginate(6);
                $page=$info->render();
                $this->assign("info",$info);
                $this->assign("page",$page);
            }
        }

        return $this->fetch("page");
    }
    public function random(){
        $this->assign("types",'');
        $this->assign("flag",2);
        $type= model("Type")->where('type_order','=',2)->select();
        $this->assign("type",$type);
        if (input("name")=="type"){
            $info= model("Text")
                ->where("news_order","=",2)
                ->where('news_type','=',input('type'))
                ->order(["news_create"],"desc")
                ->paginate(6);
            $page=$info->render();
            $this->assign("types",input("type"));

            $this->assign("info",$info);
            $this->assign("page",$page);
        }else{
            if(input("id")){
                $editData=model("Text")->find(input("id"));
                $this->assign("editInfo",$editData);
                return $this->fetch('detail');
            }else{
                $info= model("Text")
                    ->where("news_order","=",2)
                    ->order(["news_create"],"desc")
                    ->paginate(6);
                $page=$info->render();
                $this->assign("info",$info);
                $this->assign("page",$page);
            }
        }

        return $this->fetch("page");
    }

    public function about(){

        return $this->fetch("about");
    }
}
