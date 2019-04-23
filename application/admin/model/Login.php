<?php
/**
 * Created by PhpStorm.
 * User: Cool
 * Date: 2019/4/12
 * Time: 16:17
 */
namespace app\admin\model;

use think\Model;


class Login extends Model
{
    protected $table= 'admin_tbl';

    public function login($data){
        if(!captcha_check($data["captcha"])){
           return 9999; //验证失败
        }else{
            $result= $this
                ->where('admin_login_name','=',$data["username"])
                ->where('admin_password','=',$data["password"])
                ->count("admin_id");
            if ($result==1){
                return 1;

            }else{
                return "失败";
            }
        }

    }

}