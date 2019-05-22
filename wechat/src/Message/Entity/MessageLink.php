<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/21
 * Time: 16:45
 */

namespace Wechat\Message\Entity;

/******************************************
 * 类名： MessageLink
 * @package Wechat\Message\Entity
 * 文件描述：消息链接信息
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/21
 * 时间: 16:45
 */
class MessageLink
{

    use MessageTrait;

    private $Title = null;//消息标题
    private $description = null;//消息描述
    private $url = null;

    /**
     * @return null
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * @param null $Title
     */
    public function setTitle($Title): void
    {
        $this->Title = $Title;
    }

    /**
     * @return null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param null $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param null $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }//消息链接



}