<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/9/11
 * Time: 12:14
 */

namespace app\admin\model;


use think\Model;

class LoginLogic  extends Model{

    protected  $name = 't_login';
    //验证登录
//    function  validatedata( $login_name , $password ){
//
//    }


    //验证密码
    function checkpassword( $operatorid ,$password  ){

    }

    //登录成功的需要
    function updatelastinfo( $operatorid ,$ip ,$lasttime ){
        $lastinfo = [] ;
        $lastinfo['login_lastlogintime'] = $lasttime ;
        $lastinfo['login_lastloginip'] = $ip ;
        LoginLogic::update($lastinfo,['login_operatorid'=>$operatorid ]);
    }

}