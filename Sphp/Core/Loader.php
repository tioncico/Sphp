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
    static function autoload($class)
    {
        $file=BASE_DIR.'/'.str_replace('\\','/',$class).'.php';
        if(is_file($file)){
            require_once $file;
        }
    }
}