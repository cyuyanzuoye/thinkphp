<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\phpStudy\WWW\thinkphp\public/../system/admin/admin\view\index\index.html";i:1473601393;}*/ ?>

<!DOCTYPE html>
<!-------统一的文档内容-------->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo \think\Config::get('object_name'); ?> | 后台管理系统</title>
    <link rel="icon" type="image/ico" href="/static/images/favicon.ico" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ============================================
    ================= Stylesheets ===================
    ============================================= -->
    <!-- vendor css files -->
    <link href="/static/assets/css/dpl-min.css?v=__VERSION__" rel="stylesheet" type="text/css" />
    <link href="/static/assets/css/bui-min.css?v=__VERSION__" rel="stylesheet" type="text/css" />
    <link href="/static/assets/css/main-min.css?v=__VERSION__" rel="stylesheet" type="text/css" />
    <!-- ==========================================
    ================= Modernizr ===================
    =========================================== -->
    <script type="text/javascript" src="/static/assets/js/jquery-1.11.2.js?v=__VERSION__"></script>
    <script type="text/javascript" src="/static/assets/js/bui.js?v=__VERSION__"></script>
    <script type="text/javascript" src="/static/assets/assets/js/config.js?v=__VERSION__"></script>
</head>
<body id="minovate" class="appWrapper">

<div class="header">

    <div class="dl-title">
        <a href="http://www.builive.com" title="文档库地址" target="_blank"><!-- 仅仅为了提供文档的快速入口，项目中请删除链接 -->
            <span class="lp-title-port">BUI</span><span class="dl-title-text">前端框架</span>
        </a>
    </div>

    <div class="dl-log">欢迎您，<span class="dl-log-user"><?php echo $name ?></span><a href="/admin/login/logout.html" title="退出系统" class="dl-log-quit">[退出]</a><a href="http://http://www.builive.com/" title="文档库" class="dl-log-quit">文档库</a>
    </div>
</div>
<div class="content">
    <div class="dl-main-nav">
        <div class="dl-inform"><div class="dl-inform-title">贴心小秘书<s class="dl-inform-icon dl-up"></s></div></div>
        <ul id="J_Nav"  class="nav-list ks-clear">
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">首页</div></li>
            <!--<li class="nav-item"><div class="nav-item-inner nav-order">表单页</div></li>-->
            <!--<li class="nav-item"><div class="nav-item-inner nav-inventory">搜索页</div></li>-->
            <!--<li class="nav-item"><div class="nav-item-inner nav-supplier">详情页</div></li>-->
        </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">
    </ul>
</div>

<!--编辑左侧的菜单项-->
<script>
    BUI.use('common/main',function(){
        var config ='<?php echo  $config ; ?>';
        config = eval('('+config+')');
        new PageUtil.MainPage({
            modulesConfig : config
        });
    });
</script>
