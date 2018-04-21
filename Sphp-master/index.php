<?php

/**
 * Created by PhpStorm.
 * User: tioncico
 * Date: 2017/11/7 0007
 * Time: 19:17
 */
define('DS', '/');
define('ROOT', realpath(' /'));
define('BASE_DIR', __DIR__);

define('APP', 'App');
define('APP_DIR', BASE_DIR . APP);

define('BASE_DATA_DIR', BASE_DIR . '/Data');//根目录Data
define('BASE_RUN_TIME_DIR', BASE_DIR . '/Runtime');//根目录Data

define('CORE_DIR', BASE_DIR . '/Sphp/Core');//Core目录
define('CORE_DIR_COMMON_DIR', CORE_DIR . '/Common');
define('CORE_DIR_LIB_DIR', CORE_DIR . '/Lib');

define('DEBUG', true);
include CORE_DIR_COMMON_DIR . '/Functions.php';
include CORE_DIR . '/Sphp.php';
\Sphp\Core\Sphp::run();
