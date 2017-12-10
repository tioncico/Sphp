<?php
/**
 * 配置类
 * Created by PhpStorm.
 * User: tioncico
 * Date: 2017/11/7 0007
 * Time: 20:35
 */

namespace Sphp\Core\lib;


class Conf
{
    public static $instance, $configs = array(), $config_arr = array();

    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new static();
            self::$instance->getSystemConf();
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

    /**
     * 加载配置文件(直接加载整个配置文件),如果之前已经加载过,那么就直接返回
     * @param string $name 配置名
     * @param string $file 文件名
     * @return mix
     */
    private function all($name, $file)
    {
        if (isset(self::$config_arr[$name])) {
            return self::$config_arr[$name];
        }
        if (is_file($file)) {
            self::$config_arr[$name] = include_once $file;
            self::configMerge(self::$config_arr[$name]);
        } else {
            return false;
        }
    }

    public function setConfig($name, $file)
    {
        self::all($name, $file);
        if (!empty(self::$configs['LOAD_EXT_CONFIG'])) {
            $file_arr = explode(',', self::$configs['LOAD_EXT_CONFIG']);
            $file_path = substr($file, 0, strripos($file, '/'));
            foreach ($file_arr as $va) {
                self::all($va,$file_path.'/'.$va.'.php');
            }
            unset(self::$configs['LOAD_EXT_CONFIG']);
        }
        return self::$configs;
    }

    public function getSystemConf()
    {
        $config_file = CORE_DIR_COMMON_DIR . '/Configs.php';
        return self::setConfig('system', $config_file);
    }

    public function getConfig($offset = null, $value = null)
    {
        if (empty($offset)) {
            return self::$configs;
        }
        if (is_string($offset)) {
            if (is_null($value)) {
                return isset(self::$configs[$offset])?self::$configs[$offset]:null;
            } else {
                self::$configs[$offset] = $value;
                return self::$configs[$offset];
            }
        }
        if (is_array($offset)) {
            self::configMerge(array_change_key_case($offset, CASE_UPPER));
            return self::$configs;
        }
        return null;
    }

    private function configMerge($configs){
        foreach($configs as $key=>$va){
            if(is_array($va)&&isset(self::$configs[$key])){
                $configs[$key] = array_merge(self::$configs[$key], $configs[$key]);
            }
        }
        self::$configs = array_merge(self::$configs, $configs);
    }
}