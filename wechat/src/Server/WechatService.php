<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/22
 * Time: 16:29
 */

namespace Wechat\Server;

use Wechat\Common\Account;

/************************
 * 类名： WechatService
 * @package Wechat\Server
 * 文件描述：微信服务操作类
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/22
 * 时间: 16:29
 */
class WechatService
{

    /**************************************
     * 描述: 生成实例
     * 日期：2019/5/22
     * 时间：16:53
     * 创建者：36168
     */
    public static function instance($name,$arguments){
        $class = "\\Wechat\\Server\\".ucfirst($name);//具体的类
        return new $class($arguments[0]);//实例化
    }


    /**************************************
     * @param $name
     * @param $arguments
     * @return mixed
     * 描述: 调用静态方法
     * 日期：2019/5/22
     * 时间：20:59
     * 创建者：36168
     */
    public static function __callStatic($name, $arguments)
    {
        return self::instance($name,$arguments);
    }


}