<?php
/**
 * 框架启动类
 * Created by PhpStorm.
 * User: tioncico
 * Date: 2017/11/7 0007
 * Time: 19:34
 */

namespace Sphp\Core;

use Sphp\Core\lib\Conf;

define('LOG_PATH',       BASE_RUN_TIME_DIR.'/Logs/'); // 应用日志目录
define('TEMP_PATH',      BASE_RUN_TIME_DIR.'/Temp/'); // 应用缓存目录
define('DATA_PATH',      BASE_RUN_TIME_DIR.'/Data/'); // 应用数据目录

class Sphp
{
    private static $module_name, $controller_name, $action_name;

    public static function run()
    {
        self::autoload();
        $route = \Sphp\Core\Factory::getRouteInstance();
        Factory::getLogInstance()->init();
        self::$module_name = $route->module;
        self::$controller_name = $route->controller;
        self::$action_name = $route->action;
        self::getConf();
        Db::setConfig(C('database'));
        $controller_file = BASE_DIR . DS . APP . DS . self:: $module_name . DS . 'Controller' . DS . self::$controller_name . '.php';
        if (is_file($controller_file)) {
            include $controller_file;
        } else {
            if (DEBUG) {
//                throw new Exception($route->controller . '控制器不存在');
            } else {
//                show404();
            }
        }
        $controller_path = '\\App' . '\\' . self::$module_name . '\\' . 'Controller' . '\\' . self:: $controller_name;
        $Controller = new $controller_path();
        try {
            $action_name = self::$action_name;
            $Controller->$action_name();
        } catch (\ReflectionException $e) {
            // 方法调用发生异常后 引导到__call方法处理
            $method = new \ReflectionMethod(self::$module_name,'__call');
            $method->invokeArgs(self::$module_name,array($action_name,''));
        }
    }

    private static function autoload()
    {
        include_once CORE_DIR . '/Loader.php';
        spl_autoload_register('\\Sphp\\Core\\Loader::autoload');
    }

    /**
     * 获取模块需要的配置
     */
    private static function getConf()
    {
        $conf_instance = Factory::getConfInstance();
        //注册data公共配置
        $conf_instance->setConfig('dataConf', BASE_DATA_DIR . '/Conf/config.php');
        //注册模块公共配置
        $conf_instance->setConfig('moduleCommonConf', APP_DIR . DS . self::$module_name . '/Common/config.php');
        //注册模块配置
        $conf_instance->setConfig('moduleConf', APP_DIR . DS . self::$module_name . '/Conf/config.php');
    }


}