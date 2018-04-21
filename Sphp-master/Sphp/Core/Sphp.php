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
use Sphp\Core\Lib\Controller;

define('LOG_PATH',       BASE_RUN_TIME_DIR.'/Logs/'); // 应用日志目录
define('TEMP_PATH',      BASE_RUN_TIME_DIR.'/Temp/'); // 应用缓存目录
define('DATA_PATH',      BASE_RUN_TIME_DIR.'/Data/'); // 应用数据目录

class Sphp
{
    private static $module_name, $controller_name, $action_name;

    public static function run()
    {
        self::autoload();//自动加载
        self::error();//错误处理
        $route = \Sphp\Core\Factory::getRouteInstance();//路由
        Factory::getLogInstance()->init();//日志初始化

        self::$module_name = $route->module;
        self::$controller_name = $route->controller;
        self::$action_name = $route->action;
        self::getConf();//加载配置
        Db::setConfig(C('database'));//设置mysql.兼容tp3.2 orm
        $controller = '\\'.APP . '\\' . self::$module_name . '\\' . 'Controller' . '\\' . self:: $controller_name;
//        var_dump($a = new Controller());
        try {
            $controller_reflection = new \ReflectionClass($controller);
            if($controller_reflection->isSubclassOf('\\Sphp\\Core\\Lib\\Controller')===false){
                throw new \ReflectionException('该类不是controller');
            }
            $method = $controller_reflection->getMethod(self::$action_name);
            $action = self::$action_name;
            $controller_instance = new $controller;
            $controller_instance->$action();
        } catch (\ReflectionException $e) {//反射方法不存在,则抛出该异常
            Error::appException($e);
        }catch (\Exception $e){
            Error::appException($e);
        }
    }

    private static function autoload()
    {
        include_once CORE_DIR . '/Loader.php';
        Loader::autoload();
    }

    private static function error(){
        error_reporting(0);//关闭错误报告,全部交给框架处理
        // 设定错误和异常处理
        register_shutdown_function('\\Sphp\\Core\\Error::fatalError');//致命错误
        set_error_handler('\\Sphp\\Core\\Error::appError');
        set_exception_handler('\\Sphp\\Core\\Error::appException');
//        echo '错误处理注册完成';
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