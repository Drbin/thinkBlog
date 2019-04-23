<?php
namespace app\admin\controller;

use think\Controller;


class Panel extends Controller
{
    public function index()
    {
        $list= model("Text")
            ->alias("a")
            ->field('news_type,w.type_name,count(news_type) AS count')
            ->join('type_tbl w','a.news_type = w.type_id')
            ->group('news_type')
            ->select();
        $info= model("Text")
            ->field('news_name')
            ->limit(10)
            ->select();
        $this->assign("list",$list);
        $this->assign("info",$info);
        return $this->fetch();
    }

}
