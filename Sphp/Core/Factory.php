<?php
/**
 * 工厂类
 * Created by PhpStorm.
 * User: tioncico
 * Date: 2017/11/5 0005
 * Time: 19:38
 */

namespace Sphp\Core;

class Factory
{
    /**
     * 获取路由类
     * @return mixed
     */
    public static function getRouteInstance()
    {
        $alias = '\Sphp\Core\Lib\Route';
        $instance = self::createInstance($alias);
        return $instance;
    }

    /**
     * 获取配置类
     * @return mixed
     */
    public static function getConfInstance()
    {
        $alias = '\Sphp\Core\Lib\Conf';
        $instance = self::createStaticInstance($alias);
        return $instance;
    }

    /**
     * 获取缓存类
     * @return mixed
     */
    public static function getCacheInstance()
    {
        $alias = 'Sphp\Core\Lib\Cache';
        $instance = self::createStaticInstance($alias);
        return $instance;
    }

    /**
     * 获取日志类
     * @return mixed
     */
    public static function getLogInstance()
    {
        $alias = 'Sphp\Core\Lib\Log';
        $instance = self::createStaticInstance($alias);
        return $instance;
    }

    /**
     * 创建一个静态实例
     * @param $alias
     * @return mixed
     */
    private static function createStaticInstance($alias)
    {
        $instance = Register::_get($alias);
        if (!$instance) {
            $instance = $alias::getInstance();
            Register::_set($alias, $instance);
        }
        return $instance;
    }

    /**
     * 创建一个实例
     * @param $alias
     * @return mixed
     */
    private static function createInstance($alias)
    {
        $instance = Register::_get($alias);
        if (!$instance) {
            $instance = new $alias();
            Register::_set($alias, $instance);
        }
        return $instance;
    }

}