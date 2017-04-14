<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:25
 */


$p = !empty($_GET['p']) ? $_GET['p'] : "front";//确定使用哪个平台。
define("PLAT", $p);	//

define("DS", DIRECTORY_SEPARATOR);//DIRECTORY_SEPARATOR表示“目录分隔符”，
						//只有2个：'/'（unix系统）, '\'(window系统)

define("ROOT", __DIR__ . DS);	//当前的根目录：
//echo ROOT;
define("APP", ROOT . 'Application' . DS);	//application的完整路径
define("FRAMEWORK", ROOT . 'Framework' . DS);	//框架基础类所在路径
define("PLAT_PATH", APP . PLAT . DS);	//当前平台所在目录
define("CTRL_PATH", PLAT_PATH . "Controllers" . DS);//当前控制器所在目录
define("MODEL_PATH", PLAT_PATH . "Models" . DS);//当前模型所在目录
define("VIEW_PATH", PLAT_PATH . "Views" . DS);//当前视图所在目录

$c = !empty($_GET['c']) ? $_GET['c'] : "User";//它也可能是"User",或其他。。		。
	//我们这里，把“user”当做默认要使用的控制器

function __autoload($class){
    $base_class = array('MySQLDB','BaseModel','ModelFactory','BaseController');
    if( in_array( $class, $base_class) ){
        require FRAMEWORK . $class . '.class.php';	//加载基础模型类
    }
    else if( substr($class, -5) == "Model"){//所需要的类的名字最后5个字符是"Model”时
        require  MODEL_PATH  .  $class  . ".class.php";
    }
    else if( substr($class, -10) == "Controller"){//所需要的类的名字最后10个字符是"Controller”时
        require  CTRL_PATH  .  $class  . ".class.php";
    }
}


$controller_name = $c . "Controller";		//构建控制器的类名
$controller = new  $controller_name ();	//可变类

$a = !empty($_GET['a']) ? $_GET['a'] : "index";
$action = $a . "Action";
$controller->$action();