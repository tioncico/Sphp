<?php
/**
 * 注册器类,用于保存工厂类的实例
 * Created by PhpStorm.
 * User: tioncico
 * Date: 2017/11/5 0005
 * Time: 19:45
 */

namespace Sphp\Core;


class Register
{
    private static $objects;

    /**
     * 注册一个实例
     * @param $alias
     * @param $object
     */
    static function _set($alias, $object)
    {
        self::$objects[$alias] = $object;
    }

    /**
     * 获取一个实例
     * @param $alias
     * @return mixed
     */
    static function _get($alias)
    {
        if(isset($objects[$alias])){
            return self::$objects[$alias];
        }else{
            return null;
        }
    }

    /**
     * 删除一个实例
     * @param $alias
     */
    static function _unset($alias)
    {
        unset(self::$objects[$alias]);
    }

}