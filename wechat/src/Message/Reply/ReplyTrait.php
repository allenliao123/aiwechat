<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/22
 * Time: 14:18
 */

namespace Wechat\Message\Reply;

/*******************************
 * 类名： ReplyTrait
 * @package Wechat\Message\Reply
 * 文件描述：消息回复
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/22
 * 时间: 14:18
 */
Trait ReplyTrait
{

    private $toUserName= null;
    private $fromUserName = null;
    private $createTime = null;
    private $msgType = null;
    private $value = [];

    /**
     * @return null
     */
    public function getToUserName()
    {
        return $this->ToUserName;
    }

    /**
     * @param null $ToUserName
     */
    public function setToUserName($ToUserName): void
    {
        $this->toUserName = $ToUserName;
    }

    /**
     * @return null
     */
    public function getFromUserName()
    {
        return $this->fromUserName;
    }

    /**
     * @param null $FromUserName
     */
    public function setFromUserName($FromUserName): void
    {
        $this->fromUserName = $FromUserName;
    }

    /**
     * @return null
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * @param null $CreateTime
     */
    public function setCreateTime($CreateTime): void
    {
        $this->createTime = $CreateTime;
    }

    /**
     * @return null
     */
    public function getMsgType()
    {
        return $this->msgType;
    }

    /**
     * @param null $MsgType
     */
    public function setMsgType($MsgType): void
    {
        $this->msgType = $MsgType;
    }

    /**
     * @return array
     */
    public function getValue(): array
    {
        return $this->value;
    }

    /**
     * @param array $value
     */
    public function setValue(array $value): void
    {
        $this->value = $value;
    }


    /*****************************************
     * 描述: 数据是否正确设置，判断
     * 日期：2019/5/22
     * 时间：14:32
     * 创建者：36168
     */
    public function isRightValueSet(){

        if(empty($this->toUserName)){
            throw new \Exception('接受方账号必填');
        }

        if(empty($this->fromUserName)){
            throw new \Exception('开发者微信号必填');
        }

        if(empty($this->createTime)){
            throw new \Exception('消息创建时间必填');
        }

        if(empty($this->msgType)){
            throw new \Exception('消息类型必填');
        }

        $this->value[] = $this->toUserName;
        $this->value[] = $this->fromUserName;
        $this->value[] = $this->createTime;
        $this->value[] = $this->msgType;

    }


}