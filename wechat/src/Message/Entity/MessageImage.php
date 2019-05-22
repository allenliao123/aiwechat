<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/21
 * Time: 16:34
 */

namespace Wechat\Message\Entity;

/******************************************
 * 类名： MessageImage
 * @package Wechat\Message\Entity
 * 文件描述：图片消息
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/21
 * 时间: 16:34
 */
class MessageImage
{

    use MessageTrait;

    private $picUrl = null;
    private $mediaId = null;


    /**
     * @return null
     */
    public function getPicUrl()
    {
        return $this->picUrl;
    }

    /**
     * @param null $picUrl
     */
    public function setPicUrl($picUrl): void
    {
        $this->picUrl = $picUrl;
    }

    /**
     * @return null
     */
    public function getMediaId()
    {
        return $this->mediaId;
    }

    /**
     * @param null $mediaId
     */
    public function setMediaId($mediaId): void
    {
        $this->mediaId = $mediaId;
    }


}