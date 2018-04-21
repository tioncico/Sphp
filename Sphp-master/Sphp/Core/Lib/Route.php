<?php
/**
 * Created by PhpStorm.
 * User: tioncico
 * Date: 2017/11/7 0007
 * Time: 19:38
 */

namespace Sphp\Core\lib;


use Sphp\Core\Factory;

class Route
{
    public $module,$controller,$action;
    public function __construct()
    {
        $config = Factory::getConfInstance()->getConfig();
        $this->module = !empty($_REQUEST['m'])?$_REQUEST['m']:$config['MODULE'];
        $this->controller = !empty($_REQUEST['c'])?$_REQUEST['c'].'Controller':$config['CONTROLLER'].'Controller';
        $this->action = !empty($_REQUEST['a'])?$_REQUEST['a']:$config['ACTION'];
    }


}