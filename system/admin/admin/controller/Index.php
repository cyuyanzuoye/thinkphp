<?php
namespace app\admin\controller;


class Index extends  BController
{

	//模块首页
    public function index()
    {
        //获取用户的权限，生成用户的菜单
        $operator = session('operator');

//        var_dump($operator);die;
        $this->assign('name',$operator['name']);
        $this->assign('ttt',$operator['name']);
        $this->assign('config',$this->createmenu( $operator  ) );
        $this->view->engine->layout(false);
       return  $this->fetch('index',['ttt'=>$operator['name']],[],config());
        return view();
    }


    function  hellow(){
        return  $this->fetch();
    }

    //创建模块化
    public  function create(){
        //获取系统的参数
         
       $builds = include APP_PATH. 'builds.php';
     
        \think\Build::run($builds);
    }

    protected    function createmenu( $operator ){
       //菜单项配置
       //系统元数据定义

        $menuconfig = [
            //第一节菜单
            [
                'id'=>'index',           //菜单模块编号
                'homepage'=>'index',      //默认打开的模块下的菜单主页
//                'collapsed'=>true,      //默认左侧菜单收缩
                'menu'=>[                //第二节菜单
                      [
                        'text'=>'首页内容',   //二级菜单的分类内容
                        'items'=>[            //三级菜单
                            ['id'=>'index','text'=>'首页内容','href'=>'admin/index/hellow.html'],
                            ['id'=>'meta','text'=>'元数据定义','href'=>'admin/index/meta.html'],
                        ]
                     ],
                    [
                        'text'=>'基础数据定义',
                        'items'=>[
                          ['id'=>'metadata','text'=>'元数据定义','href'=>'admin/metadata.html']
                        ],
                    ],
                    [
                    'text'=>'操作员管理',
                    'items'=>[
                        ['id'=>'operator','text'=>'操作员管理','href'=>'admin/operator.html']
                    ],
                   ]
                ]
            ],
            //二级菜单
                //第一节菜单
            [
            'id'=>'test',           //菜单模块编号
            'homepage'=>'meta',      //默认打开的模块下的菜单主页
//                'collapsed'=>true,      //默认左侧菜单收缩
            'menu'=>[                //第二节菜单
                [
                    'text'=>'首页内容',   //二级菜单的分类内容
                    'items'=>[            //三级菜单
                        ['id'=>'code','text'=>'首页内容','href'=>'admin/index/hellow.html'],
                        ['id'=>'meta','text'=>'元数据定义','href'=>'admin/index/meta.html'],
                    ]
                ],
                [
                    'text'=>'基础数据定义',
                    'items'=>[
                        ['id'=>'metadata','text'=>'元数据定义','href'=>'admin/metadata.html']
                    ],
                ]
            ]
        ]
        ];

        return json_encode( $menuconfig );


    }
}
