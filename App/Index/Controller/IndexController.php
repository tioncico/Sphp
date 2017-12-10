<?php
/**
 * Created by PhpStorm.
 * User: tioncico
 * Date: 2017/11/7 0007
 * Time: 21:16
 */

namespace App\Index\Controller;
use App\Index\Model\Users;
use Sphp\Core\Db;
use Sphp\Core\Factory;
use Sphp\Core\Lib\Controller;

class IndexController extends Controller
{
    public function index(){
        echo '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>^_^</h1><p>欢迎使用 <b>Sphp</b>！</p><br/>版本0.01</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>';
    }


}