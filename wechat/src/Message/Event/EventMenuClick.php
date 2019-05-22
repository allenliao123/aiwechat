<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/21
 * Time: 17:31
 */

namespace Wechat\Message\Event;

/******************************************
 * 类名： EventMenuClick
 * @package Wechat\Message\Event
 * 文件描述：自定义菜单点击事件
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/21
 * 时间: 17:31
 */
class EventMenuClick
{
    use EventTrait;

    private $eventKey =null;

    /**
     * @return null
     */
    public function getEventKey()
    {
        return $this->eventKey;
    }

    /**
     * @param null $eventKey
     */
    public function setEventKey($eventKey): void
    {
        $this->eventKey = $eventKey;
    }// 事件KEY值，与自定义菜单接口中KEY值对应


}