<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/9/10
 * Time: 11:17
 */

namespace app\admin\controller;


use app\admin\model\Operator;
use think\Controller;
use think\Loader;

//主要是验证用户是否登录，如果没有登录则要求用户登录，
class BController  extends Controller{

    //配置不需要验证的controller和action
     var $not_check_config =[ 'login/index','login/dologin' ] ;
     protected function   _initialize( ){
//         parent::_initialize();

         $request = request();
         //session存在时，不需要验证的权限
         $not_check = $this->not_check_config;

         //当前操作的请求 模块名/方法名
         if(in_array($request->controller().'/'.$request->action(), $not_check) || $request->module() != 'admin'){
             return true;
         }

         //session不存在时，不允许直接访问
         if(!session('operator')){
             //未登陆跳转
             $this->error('还没有登录，正在跳转到登录页','/admin/login');
         }

         $operatorModel = Loader::model('Operator');
         $operator = $operatorModel->getuser('admin');

         //密码校验
         if(config('auth_password_check')){
             $this->auth_password_check();
         }

         //过期时间校验
         if(config('auth_expired_check')){
             $this->auth_expired_check();
         }
     }

    protected function auth_password_check(){
        $operatorLogic = new Operator;
        $operator = session('operator');
        $isvalid = $operatorLogic->checkpassword( $operator['id'], $operator['password'] );
        if (!$isvalid) {
            //注销当前账号
            session(null);
            $this->error('登录失效:用户密码已更改','/admin/login.html');
        }
    }

    //验证过期时间
    protected function auth_expired_check(){
        $operatorLogic = new Operator;
        $operator = session('operator');
        $lastactivetime = $operator['lastactivetime'];
        if(time() > $lastactivetime + config('auth_expired_time')){
            session(null, 'think');
            $this->error('账号已过期,请重新登录','/admin/login.html');
        }else{
            //活动时间
            $operator['lastactivetime'] = time();
            session('operator',$operator);
        }
    }

}