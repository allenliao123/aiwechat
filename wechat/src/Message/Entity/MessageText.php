<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/21
 * Time: 16:31
 */

namespace Wechat\Message\Entity;

/******************************************
 * 类名： MessageText
 * @package Wechat\Message\Entity
 * 文件描述： 文本消息
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/21
 * 时间: 16:31
 */
class MessageText
{
    use MessageTrait;

    private $content = null;//文本消息内容
    private $bizmsgmenuid = null;//发送的是客服问卷等信息时，有该属性
    /**
     * @return null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param null $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return null
     */
    public function getBizmsgmenuid()
    {
        return $this->bizmsgmenuid;
    }

    /**
     * @param null $bizmsgmenuid
     */
    public function setBizmsgmenuid($bizmsgmenuid): void
    {
        $this->bizmsgmenuid = $bizmsgmenuid;
    }

}