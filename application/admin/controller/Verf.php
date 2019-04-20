<?php
namespace app\index\controller;

use think\captcha\Captcha;

class Verf
{
    public function verify()
    {
        $captcha = new Captcha();
        return $captcha->entry();
    }

}