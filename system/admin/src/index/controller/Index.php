<?php
namespace app\index\controller;

use think\View;
class Index
{

	//模块首页
    public function index()
    {
        $view = new View();
        //使用 相对路径部署 ./../application/index/view/index/index.html
        $this->_cjv = '1.0.0.1';
        return $view->fetch('index',['_cjv'=>'1.0.0.0','_site_url'=>'']);
    }


    //创建模块化
    public  function create(){
        //获取系统的参数
         
       $builds = include APP_PATH. 'builds.php';
     
        \think\Build::run($builds);
    }
}
