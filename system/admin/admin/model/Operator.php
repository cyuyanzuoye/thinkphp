<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/9/11
 * Time: 12:16
 */

namespace app\admin\model;


use think\Model;

class Operator  extends  Model{

    protected  $name = 't_operator';
    function getuser( $username  ){
       $operator = Operator::where('operator_name','=',$username)->find();;
       return $operator;
    }


    //验证操作员密码: 用户名修改密码需要，验证其密码
    function  checkpassword( $operatorid , $password ){

        $loginLogic = new LoginLogic ;
        $logininfo =  $loginLogic->where(['login_operatorid'=> $operatorid])->find();
        if( empty( $logininfo)) return false;
        //表密码是否一致
        return  $password!==$logininfo['login_password'] ?  false : true ;
    }

    //检查有效时间: 不需要到数据 查询，有session 查询
    function  checkexpired( $operatorid , $password  ){
//        $lastacivitytime = Operator::where(['ope'])


        //die;
    }

    //更新用户的最后活动时间
    function  updateLastActiveTime( $operatorid  ){
       return Operator::update(['operator_lastactivetime'=> time()],['operator_id'=>$operatorid]);
    }


}