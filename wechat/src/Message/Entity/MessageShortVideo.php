<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/21
 * Time: 16:40
 */

namespace Wechat\Message\Entity;

/********************************
 * 类名： MessageShortVideo
 * @package Wechat\Message\Entity
 * 文件描述：
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/21
 * 时间: 16:40
 */
class MessageShortVideo
{

    use MessageTrait;

    private $mediaId = null;//视频消息媒体id，可以调用获取临时素材接口拉取数据。
    private $thumbMediaId = null;

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

    /**
     * @return null
     */
    public function getThumbMediaId()
    {
        return $this->thumbMediaId;
    }

    /**
     * @param null $thumbMediaId
     */
    public function setThumbMediaId($thumbMediaId): void
    {
        $this->thumbMediaId = $thumbMediaId;
    }//视频消息缩略图的媒体id，可以调用获取临时素材接口拉取数据。



}