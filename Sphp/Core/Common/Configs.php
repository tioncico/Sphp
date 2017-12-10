<?php
/**
 * 框架默认配置
 * Created by PhpStorm.
 * User: tioncico
 * Date: 2017/11/7 0007
 * Time: 20:30
 */
$config = array(
    /*系统路由默认配置*/
    'MODULE' => 'Index',
    'CONTROLLER' => 'Index',
    'ACTION' => 'Index',
    'APP_NAME' => APP,

    /*函数配置*/
    'DEFAULT_FILTER' => 'htmlspecialchars', // 默认参数过滤方法 用于I函数...

    'cache' => [
        'DATA_CACHE_TIME' => 0,      // 数据缓存有效期 0表示永久缓存
        'DATA_CACHE_COMPRESS' => false,   // 数据缓存是否压缩缓存
        'DATA_CACHE_CHECK' => false,   // 数据缓存是否校验缓存
        'DATA_CACHE_PREFIX' => '',     // 缓存前缀
        'DATA_CACHE_TYPE' => 'File',  // 数据缓存类型,支持:File|Memcache|redis|
        'DATA_CACHE_PATH' => TEMP_PATH,// 缓存路径设置 (仅对File方式缓存有效)
        'DATA_CACHE_SUBDIR' => false,    // 使用子目录缓存 (自动根据缓存标识的哈希创建子目录)
        'DATA_PATH_LEVEL' => 1,        // 子目录缓存级别
    ],

    'database' => [
        // 数据库类型
        'type' => '',
        // 服务器地址
        'hostname' => '',
        // 数据库名
        'database' => '',
        // 用户名
        'username' => '',
        // 密码
        'password' => '',
        // 端口
        'hostport' => '',
        // 连接dsn
        'dsn' => '',
        // 数据库连接参数
        'params' => [],
        // 数据库编码默认采用utf8
        'charset' => 'utf8',
        // 数据库表前缀
        'prefix' => '',
        // 数据库调试模式
        'debug' => false,
        // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
        'deploy' => 0,
        // 数据库读写是否分离 主从式有效
        'rw_separate' => false,
        // 读写分离后 主服务器数量
        'master_num' => 1,
        // 指定从服务器序号
        'slave_no' => '',
        // 是否严格检查字段是否存在
        'fields_strict' => true,
        // 数据集返回类型
        'resultset_type' => '',
        // 自动写入时间戳字段
        'auto_timestamp' => false,
        // 时间字段取出后的默认时间格式
        'datetime_format' => 'Y-m-d H:i:s',
        // 是否需要进行SQL性能分析
        'sql_explain' => false,
        // Builder类
        'builder' => '',
        // Query类(请勿删除)
        'query' => '\\Sphp\\Core\\Lib\\db\\Query',
        // 是否需要断线重连
        'break_reconnect' => true,
        // 数据字段缓存路径
        'schema_path' => '',
        // 模型类后缀
        'class_suffix' => false,],
    'log' => [
        'LOG_RECORD' => false,   // 默认不记录日志
        'LOG_TYPE' => 'File', // 日志记录类型 默认为文件方式
        'LOG_PATH' => LOG_PATH, // 日志存储文件夹
        'LOG_LEVEL' => 'EMERG,ALERT,CRIT,ERR',// 允许记录的日志级别
        'LOG_EXCEPTION_RECORD' => false,    // 是否记录异常信息日志
    ],

);
return $config;