<?php
/**
 * 自动加载类
 * Created by PhpStorm.
 * User: tioncico
 * Date: 2017/11/5 0005
 * Time: 17:15
 */

namespace Sphp\Core;


class Loader
{
    /**
     * 自动加载
     * @param $class
     */
    static function autoload()
    {
        spl_autoload_register('self::register_1');
//        spl_autoload_register('self::register_2');
//        spl_autoload_register('self::register_3');
    }

    static function register_1($class){
//        var_dump($class);
        $file=BASE_DIR.'/'.str_replace('\\','/',$class).'.php';
        if(file_exists($file)){
            require_once $file;
        }
    }
/*    static function register_2($class){
        $file=BASE_DIR.'/'.APP.'/Index/'.$class.'.php';
        if(file_exists($file)){
            require_once $file;
        }
    }*/
/*    static function register_3($class){
        $file=BASE_DIR.'/Sphp/Core/Lib/'.$class.'.php';
        if(file_exists($file)){
            require_once $file;
        }
    }*/


}