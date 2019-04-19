<?php
/**
 * Created by PhpStorm.
 * User: Cool
 * Date: 2019/4/12
 * Time: 16:17
 */
namespace app\admin\model;

use think\Model;


class Admin extends Model
{
    protected $table= 'admin_tbl';

    public function add($data){

        $result= $this->allowField(true)->save($data);
        if ($result){
            return 1;

        }else{
            return "失败";
        }
    }

}