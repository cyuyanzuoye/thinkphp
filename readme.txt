//系统的目录结构

application :
 所有的程序应用的存放的地方

thinkcore
 thinkphp的框架代码

log:
  所有应用程序的存放的日记目录
  目录结构
  appname/log/yearmonth/day.log









//需要修改thinkphp 目录遍历

//thinkphp 的框架代码目录
defined('THINK_PATH') or define('THINK_PATH', __DIR__ . DS);

//应用目录
defined('APP_PATH') or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . DS);
