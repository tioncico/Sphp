<?php
/**
 * Created by PhpStorm.
 * User: tioncico
 * Date: 2017/11/7 0007
 * Time: 19:17
 */
$i = 100;
ob_start();//php-cli模式下,默认关闭buffer,主要测试缓冲区的作用
while ($i > 0) {
    echo $i . "\n";
    $i--;
    sleep(1);
    if ($i % 2 == 0) {
        echo 'T' . time() . "\n";
        ob_end_flush();
        ob_start();
    }
}
echo '完成';
die;
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
