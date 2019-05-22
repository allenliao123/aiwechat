<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/21
 * Time: 16:36
 */

namespace Wechat\Message\Entity;

/********************************
 * 类名： MessageVoice
 * @package Wechat\Message\Entity
 * 文件描述：语音消息
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/21
 * 时间: 16:36
 */
class MessageVoice
{

    use MessageTrait;
    private $mediaId = null;//语音消息媒体id，可以调用获取临时素材接口拉取数据。
    private $format = null;

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
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param null $format
     */
    public function setFormat($format): void
    {
        $this->format = $format;
    }//语音格式，如amr，speex等



}