<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/9/11
 * Time: 21:22
 */

namespace app\admin\controller;


class Operator extends BController {

   function lists( ){

       return $this->fetch('lists',[],[],config());
   }
}