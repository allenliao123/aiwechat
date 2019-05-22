<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/21
 * Time: 17:22
 */

namespace Wechat\Message;

/******************************************
 * 类名： EventConstants
 * @package Wechat\Message
 * 文件描述：事件常量
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/21
 * 时间: 17:23
 */
class EventConstants
{
    const  EVENT_SUBSCRIBE = 'subscribe';//(订阅)
    const  EVENT_UNSUBSCRIBE = 'unsubscribe';//取消订阅

    const EVENT_SCAN = 'SCAN';//扫描类型
    const EVENT_LOCATION = 'LOCATION';//上报地理位置事件
    const EVENT_CLICK = 'CLICK';//自定义菜单事件
    const EVENT_VIEW = 'VIEW';//菜单跳转链接时的事件

}
