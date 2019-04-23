<?php
namespace app\admin\controller;

use think\Controller;
use \think\Request;


class Text extends Common
{
    public function index()
    {
        $this->isLogin();
        $list= model("Text")
            ->field('news_id,news_name,news_desc,news_keywords,news_url,w.type_name')
            ->alias("a")
            ->join('type_tbl w','a.news_type = w.type_id')
            ->order(["news_type"],"asc")
            ->paginate(10);

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
        $order= model("Type")->select();
        $this->assign("order",$order);
        if(request()->isPost()){
            $file = request()->file('file');
            $fileUrl="";
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'upload');
                if($info){
                    $fileUrl= '/thinkBlog/public/upload/'.$info->getSaveName();

                }else{
                    // 上传失败获取错误信息
                    return $file->getError();
                }
            }

            $data=[
                'news_order'=>input("post.news_order"),
                'news_name'=>input("post.name"),
                'news_keywords'=>input("post.keywords"),
                'news_type'=>input("post.type"),
                'news_content' => input("post.content"),
                'news_desc'=>input("post.desc"),
                'news_url'=>$fileUrl,
                'news_create'=> $datetime
            ];
            $result = model("Text")->add($data);
            if($result==1){
                $this->success("添加成功","admin/Text/index");
            }else{
                $this->error($result);
            }
        }
        return $this->fetch("add");
    }
    public function edit()
    {
        $this->isLogin();
        $order= model("Type")->select();
        $this->assign("order",$order);
        $editData=model("Text")->find(input("id"));
        $this->assign("editInfo",$editData);

        $id= input("id");
        $this->assign("id",$id);

        if(request()->isPost()){
            $file = request()->file('file');
            $fileUrl="";
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'upload');
                if($info){
                    $fileUrl= '/thinkBlog/public/upload/'.$info->getSaveName();

                }else{
                    // 上传失败获取错误信息
                    return $file->getError();
                }
            }
            $data=[
                'news_order'=>input("post.news_order"),
                'news_name'=>input("post.name"),
                'news_keywords'=>input("post.keywords"),
                'news_type'=>input("post.order"),
                'news_content' => input("post.content"),
                'news_desc'=>input("post.desc"),

            ];
            if($fileUrl!=""){
                $data["news_url"]=$fileUrl;
            }
            $result = model("Type")->edit($data,$id);
            if($result==1){
                $this->success("添加成功","admin/Text/index");
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
            $this->success("删除成功","admin/Text/index");
        }else{
            $this->error($res);
        }
    }
}
