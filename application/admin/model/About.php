<?php
/**
 * Created by PhpStorm.
 * User: Cool
 * Date: 2019/4/12
 * Time: 16:17
 */
namespace app\admin\model;

use think\Model;


class About extends Model
{
    protected $table= 'about_tbl';

    public function edit($data,$id){
        $result= $this->save(
            $data,["about_id"=>$id]
        );
        if ($result){
            return 1;

        }else{
            return "失败";
        }

    }

}