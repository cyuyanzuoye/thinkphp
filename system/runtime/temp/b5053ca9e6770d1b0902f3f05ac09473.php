<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\phpStudy\WWW\thinkphp\public/../system/admin/admin\view\login\index.html";i:1473589660;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo \think\Config::get('object_name'); ?> | 后台管理系统</title>
    <link rel="icon" type="image/ico" href="/static/images/favicon.ico"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ============================================
    ================= Stylesheets ===================
    ============================================= -->
    <!-- vendor css files -->
    <link href="/static/assets/css/dpl-min.css?v=__VERSION__" rel="stylesheet" type="text/css"/>
    <link href="/static/assets/css/bui-min.css?v=__VERSION__" rel="stylesheet" type="text/css"/>
    <link href="/static/assets/css/main-min.css?v=__VERSION__" rel="stylesheet" type="text/css"/>
    <!-- ==========================================
    ================= Modernizr ===================
    =========================================== -->
    <script type="text/javascript" src="/static/assets/js/jquery-1.11.2.js?v=__VERSION__"></script>
    <script type="text/javascript" src="/static/assets/js/bui.js?v=__VERSION__"></script>
    <script type="text/javascript" src="/static/assets/assets/js/config.js?v=__VERSION__"></script>
</head>
<style>
    .login-container {
        width: 375px;
        margin: 0 auto;
    }
    .text-center {
        text-align: center;;
    }
    .block {
        display: block;
    }

    .clearfix {
        clear: both;
    }



    #login-box .input-icon {
        border-top-width: 10px;
        margin-top: 10px;

    }

    .input-icon {
        position: relative;
        width: 100%;;

    }

    span.input-icon {
        display: inline-block
    }

    .input-icon > input {
        padding-left: 24px;
        padding-right: 6px;
        border: none;
        width: 90%;;
    }

    .input-icon.input-icon-right > input {
        padding-left: 6px;
        padding-right: 24px
    }

    .input-icon > [class*="icon-"] {
        padding: 0 3px;
        z-index: 2;
        position: absolute;
        top: 1px;
        bottom: 1px;
        left: 3px;
        line-height: 28px;
        display: inline-block;
        color: #909090;
        font-size: 16px
    }

    .input-icon.input-icon-right > [class*="icon-"] {
        left: auto;
        right: 3px
    }

    .input-icon > input:focus + [class*="icon-"] {
        color: #579
    }

    .input-icon ~ .help-inline {
        padding-left: 8px
    }

    .btn {
        padding: 4px 24px;
    }

    .form-control {
        background-color: #fff;
        border: 1px solid #ccc;
        /*border-radius: 4px;*/
        /*box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;*/
        color: #555;
        display: block;
        font-size: 14px;
        height: 34px;
        line-height: 1.42857;
        padding: 6px 9px;
        transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        vertical-align: middle;
        width: 100%;
        margin-bottom: 10px;;
    }

    .space-6 {
        max-height: 1px;
        min-height: 1px;
        overflow: hidden;
        margin: 12px 0;
        margin: 6px 0 5px
    }

    .header {
        line-height: 28px;
        margin-bottom: 16px;
        margin-top: 18px;
        padding-bottom: 4px;
        padding-right: 20px;
        border-bottom: 1px solid #CCC
    }

    .header.blue {
        border-bottom-color: #d5e3ef
    }



    .widget-body {
        border: 1px solid #CCC;
        border-top: 0;
        background-color: #FFF
    }

    .widget-box {

        -webkit-box-shadow: none;
        box-shadow: none;
        padding-right: 20px;;
        /*margin: 3px 0;*/
        border-bottom: 1px solid #CCC
    }
    .x-icon-err{
        color:red; top:-4px;left:340px;
    }
</style>
<body>
<div id="containt">
    <div class="login-container">
        <!--登录box-->
           <div class="widget-box" id="login-box">
                   <h2 class="header blue lighter bigger  "><span>lya 后台管理中心</span></h2>
                   <div class="space-6"></div>
                   <form  id="login_form" class="form-horizontal "  method="post">
                           <div class="control-group">
                               <label class=" clearfix form-control ">
                                   <span class="block input-icon  ">
                                      <input class="input-normal control-text" id="user_name" name="user_name"    maxlength="16"  type="text" placeholder=" 请输入用户名" data-rules="{required : true}" data-messages="{required:'请输入用户名'}" >
                                       <i class="icon-user"></i>
                                   </span>
                               </label>
                           </div>
                           <div class="control-group">
                               <label class=" clearfix form-control  ">
                                   <span class="block input-icon ">
                                       <input class="input-normal control-text" id="user_password" name="user_password"  maxlength="16" type="password" placeholder=" 请输入登录密码" data-rules="{required : true}" data-messages="{required:'请输入登录密码'}" >
                                       <i class="icon-lock"></i>
                                   </span>
                               </label>
                           </div>
                          <div class="control-group">
                              <a  id="btn_login" class="button btn">
                                  登录
                                  <i class=""></i>
                              </a>
                          </div>
                   </form>
               </div>
    </div>
</div>
</body>
<script type="text/javascript">
    //使用jquery
    var Form = BUI.Form, Tooltip = BUI.Tooltip;

    new Form.Form({
        srcNode : '#login_form',
        errorTpl : '<span class="x-icon-err"  style="color:red; top:-4px;left:330px; font-weight: 600;"  data-title="{error}">!</span>'
    }).render();

    //不使用模板的，左侧显示
    var tips = new Tooltip.Tips({
        tip : {
            trigger : '.x-icon-err', //出现此样式的元素显示tip
            alignType : 'right', //默认方向
            elCls : 'tips tips-warning tips-no-icon tip1',
            offset : 10 //距离左边的距离
        }
    });
    tips.render();

   //使用ajax验证 action="/admin/login/dologin.html"
   $("#btn_login").click(function(){
       //前端验证
       if($('.x-icon-err').length>0){
           return false;
       }
       //验证通过发送ajax
       var username = $("#user_name").val();
       var userpassword = $("#user_password").val();

       $.ajax({
           'url':'/admin/login/dologin.html',
           'type':'post',
           'datatype':'json',
           'data':{
               'user_name':username,
               'user_password':userpassword
           },
           success: function( result ){
               result = eval(result);
               console.log(result);
               if(result.status==1){
                   //登录成功
//                   BUI.me
                   location.href = result.data;
               }else{
                   //返回错误信息
                   error(result.msg);
               }
           }
       });
   });

    //提示信息
    function error ( msg ) {
        BUI.Message.Show({
            title : 'lya后台管理中心',
            msg : msg,
            icon : 'error',
            buttons : [
                {
                    text:'yes',
                    elCls : 'button button-primary',
                    handler : function(){
                        this.close();
                    }
                },
            ]
        });
    }

</script>
</html>