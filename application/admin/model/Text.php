<?php
/**
 * Created by PhpStorm.
 * User: Cool
 * Date: 2019/4/12
 * Time: 16:17
 */
namespace app\admin\model;

use think\Model;


class Text extends Model
{
    protected $table= 'news_tbl';
    public function typeName(){
        return $this->hasOne("Type","type_id","news_type")->field("type_name");
    }
    public function add($data){
//        $validate= new \app\admin\validate\Type();
//        $va=$validate->scene("add")->check($data);
//        if($va){
//            return $validate->getError();
//        }
        $result= $this->allowField(true)->save($data);
        if ($result){
            return 1;

        }else{
            return "失败";
        }
    }
    public function edit($data,$id){
        $validate= new \app\admin\validate\Type();
//        $va=$validate->scene("edit")->check($data);
//        if($va){
//            return $validate->getError();
//        }

        $result= $this->save(
            $data,["type_id"=>$id]
        );
        if ($result){
            return 1;

        }else{
            return "失败";
        }
    }

}