<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/21
 * Time: 17:24
 */

namespace Wechat\Message\Event;

/******************************************
 * 类名： EventScan
 * @package Wechat\Message\Event
 * 文件描述：扫描事件
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/21
 * 时间: 17:21
 */
class EventScan
{

    use EventTrait;
    private $eventKey = null;//事件KEY值，qrscene_为前缀，后面为二维码的参数值
    private $ticket = null;

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
    }

    /**
     * @return null
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * @param null $ticket
     */
    public function setTicket($ticket): void
    {
        $this->ticket = $ticket;
    }//二维码的ticket，可用来换取二维码图片



}