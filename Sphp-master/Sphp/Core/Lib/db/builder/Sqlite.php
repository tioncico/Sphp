<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2017 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace Sphp\Core\Lib\db\builder;

use Sphp\Core\Lib\db\Builder;
use Sphp\Core\Lib\db\Query;

/**
 * Sqlite数据库驱动
 */
class Sqlite extends Builder
{

    /**
     * limit
     * @access public
     * @param Query     $query        查询对象
     * @param mixed     $limit
     * @return string
     */
    public function parseLimit(Query $query, $limit)
    {
        $limitStr = '';

        if (!empty($limit)) {
            $limit = explode(',', $limit);
            if (count($limit) > 1) {
                $limitStr .= ' LIMIT ' . $limit[1] . ' OFFSET ' . $limit[0] . ' ';
            } else {
                $limitStr .= ' LIMIT ' . $limit[0] . ' ';
            }
        }

        return $limitStr;
    }

    /**
     * 随机排序
     * @access protected
     * @param Query     $query        查询对象
     * @return string
     */
    protected function parseRand(Query $query)
    {
        return 'RANDOM()';
    }

    /**
     * 字段和表名处理
     * @access protected
     * @param Query     $query        查询对象
     * @param string    $key
     * @return string
     */
    protected function parseKey(Query $query, $key)
    {
        $key = trim($key);
        if (strpos($key, '.')) {
            list($table, $key) = explode('.', $key, 2);

            $alias = $query->getOptions('alias');

            if ('__TABLE__' == $table) {
                $table = $query->getOptions('table');
            }

            if (isset($alias[$table])) {
                $table = $alias[$table];
            }
        }

        if (isset($table)) {
            $key = $table . '.' . $key;
        }

        return $key;
    }
}
