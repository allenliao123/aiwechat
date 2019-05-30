<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/22
 * Time: 14:48
 */

namespace Wechat\Message\Reply;

/*******************************
 * 类名： ReplyVideo
 * @package Wechat\Message\Reply
 * 文件描述：回复消息类
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/22
 * 时间: 14:48
 */
class ReplyVideo implements ReplyInterface
{
    use ReplyTrait;

    private $mediaId = null;
    private $title = null;
    private $description = null;


    private $template = "<xml>
                          <ToUserName><![CDATA[%s]]></ToUserName>
                          <FromUserName><![CDATA[%s]]></FromUserName>
                          <CreateTime>%s</CreateTime>
                          <MsgType><![CDATA[%s]]></MsgType>
                          <Video>
                            <MediaId><![CDATA[%s]]></MediaId>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                          </Video>
                        </xml>";

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
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




    /*******************************
     * @return string
     * @throws \Exception
     * 描述: 获取系统的消息设置
     * 日期：2019/5/22
     * 时间：14:40
     * 创建者：36168
     */
    public function getMessageXml(){

        $this->setMsgType('video');
        //判断通用参数并设置通用的数据
        $this->isRightValueSet();

        if(empty($this->mediaId)){
            throw  new \Exception('通过素材管理中的媒体ID');
        }

        if(empty($this->title)){
            $this->setTitle('');
        }

        if(empty($this->description)){
            $this->setDescription('');
        }

        $this->value[] = $this->mediaId;
        $this->value[] = $this->title;
        $this->value[] = $this->description;

        return vsprintf($this->template,$this->value);

    }


}