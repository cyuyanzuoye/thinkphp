<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/9/10
 * Time: 16:20
 */

namespace app\admin\controller;


use app\admin\controller\BController;
use app\admin\model\Operator;
use app\admin\model\LoginLogic  ;
use think\Validate;

class Login extends BController {

    var $password = '123456';
    var $user = 'admin';

    //用户登录模块
    function  index( ){
        //已经登录的不能再进入
        if(session('operator')){
            return $this->redirect('/');
        }
        return $this->fetch('index',[],[],config() );
    }

    function dologin($user_name='' ,$user_password=''){
       $result = ['status'=>0 ,'code'=>'1000','msg'=>'未知错误', 'data'=>''] ;
        $operatorLogic = new Operator;

        //验证输入的数据
        $rule = [];
        $validate = new Validate;

        $data = input('post.');
        $rule = [
            //管理员登陆字段验证
             'user_name|管理员账号' => 'require|min:5|max:18',
            'user_password|管理员密码' => 'require|min:5|max:18',
        ];
        // 数据验证
        $validate = new Validate($rule);
        $validate_result   = $validate->check($data);

        if(!$validate_result){
            $result['msg'] = $validate->getError();
            return  $result;
        }

        $operator= $operatorLogic->where(['operator_name'=>$data['user_name'],'operator_status'=>1])->find();
        if(!$operator){
            $result['msg'] ="账号不存在";
            return  $result;
        }

        //验证用户密码
        $loginLogic = new LoginLogic();
        $logininfo = $loginLogic->where(['login_operatorid'=>$operator['operator_id']])->find( );
        $login_password = $logininfo['login_password'];
        $login_paswwordsalt = $logininfo['login_passwordsalt'];

        $loginpsword = !empty($login_paswwordsalt)? md5(  $data['user_password'].$login_paswwordsalt ) : md5(  $data['user_password'] ) ;

        if(  $loginpsword!= $login_password){
            $result['msg'] ="登录失败:账号或密码错误";
            return  $result;
        }
        //用户的身份正确 ： todo  获取用户的权限信息 ， 目前为所有权限

        //执行其他的逻辑
        //更新用户的登录时间和活动时间
        //更新用户的登录ip地址
        $lastloginip = $this->request->ip();
        $loginLogic->updatelastinfo( $operator['operator_id'] ,$lastloginip ,date('Y-m-d') );
        $operatorLogic->updateLastActiveTime(  $operator['operator_id']  );

        //登录成功,执行其他，的业务逻辑，也即是查找用户的角色和权限和其他的信息，封装到一个operator 对象中
        $_operator = [] ;
        $_operator['id']   =  $operator['operator_id'];
        $_operator['name'] =  $operator['operator_name'];
        $_operator['password'] = $login_password;
        $_operator['roles'] = ['admin'] ;                       //以管理员身份登录 ,其他
        $_operator['lastactivetime'] = time() ;                 //以管理员身份登录 ,其他
        session('operator',$_operator );
        $result['status'] = 1;
        $result['msg'] ="登录成功";
        $result['data'] = '/' ;

        return $result;

    }


    //登出
    function logout( ){
        //清空session
        // TODO 其他操作
        session(null);
       return $this->redirect('/admin/login.html');
    }
}