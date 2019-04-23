<?php
namespace app\index\controller;



class Verf
{
    public function verify()
    {
        $captcha = new Captcha();
        return $captcha->entry();
    }

}