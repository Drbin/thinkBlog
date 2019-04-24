<?php
namespace app\admin\controller;

use think\Controller;


class Index extends Controller
{
    public function index()
    {
        $list= model("Text")
            ->field('news_id,news_name,news_desc,news_keywords,news_url')
            ->order(["news_type"],"asc")
            ->select();
        $list= json_encode($list,JSON_UNESCAPED_UNICODE );
        return $list;
    }
}
