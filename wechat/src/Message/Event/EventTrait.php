<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/21
 * Time: 17:17
 */

namespace Wechat\Message\Event;


trait EventTrait
{

    private $toUserName = null;//开发者微信号
    private $fromUserName = null;//发送方帐号（一个OpenID）
    private $createTime = null;//消息创建时间 （整型）
    private $msgType = null;//消息类型
    private $event = null;

    /**
     * @return null
     */
    public function getToUserName()
    {
        return $this->toUserName;
    }

    /**
     * @param null $toUserName
     */
    public function setToUserName($toUserName): void
    {
        $this->toUserName = $toUserName;
    }

    /**
     * @return null
     */
    public function getFromUserName()
    {
        return $this->fromUserName;
    }

    /**
     * @param null $fromUserName
     */
    public function setFromUserName($fromUserName): void
    {
        $this->fromUserName = $fromUserName;
    }

    /**
     * @return null
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * @param null $createTime
     */
    public function setCreateTime($createTime): void
    {
        $this->createTime = $createTime;
    }

    /**
     * @return null
     */
    public function getMsgType()
    {
        return $this->msgType;
    }

    /**
     * @param null $msgType
     */
    public function setMsgType($msgType): void
    {
        $this->msgType = $msgType;
    }

    /**
     * @return null
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param null $event
     */
    public function setEvent($event): void
    {
        $this->event = $event;
    }//具体事件





}