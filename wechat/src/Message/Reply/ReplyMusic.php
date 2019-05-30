<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/22
 * Time: 14:52
 */

namespace Wechat\Message\Reply;

/*******************************
 * 类名： ReplyMusic
 * @package Wechat\Message\Reply
 * 文件描述：音乐消息
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/22
 * 时间: 14:52
 */
class ReplyMusic implements ReplyInterface
{

    use ReplyTrait;

    private $title = null;
    private $description = null;
    private $musicURL = null;
    private $hQMusicUrl = null;
    private $thumbMediaId = null;

    private $template = "<xml>
                          <ToUserName><![CDATA[%s]]></ToUserName>
                          <FromUserName><![CDATA[%s]]></FromUserName>
                          <CreateTime>%s</CreateTime>
                          <MsgType><![CDATA[%s]]></MsgType>
                          <Music>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                            <MusicUrl><![CDATA[%s]]></MusicUrl>
                            <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
                            <ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
                          </Music>
                        </xml>";

    /**
     * @return null
     */
    public function getMusicURL()
    {
        return $this->musicURL;
    }

    /**
     * @param null $musicURL
     */
    public function setMusicURL($musicURL): void
    {
        $this->musicURL = $musicURL;
    }

    /**
     * @return null
     */
    public function getHQMusicUrl()
    {
        return $this->hQMusicUrl;
    }

    /**
     * @param null $hQMusicUrl
     */
    public function setHQMusicUrl($hQMusicUrl): void
    {
        $this->hQMusicUrl = $hQMusicUrl;
    }

    /**
     * @return null
     */
    public function getThumbMediaId()
    {
        return $this->thumbMediaId;
    }

    /**
     * @param null $humbMediaId
     */
    public function setThumbMediaId($thumbMediaId): void
    {
        $this->thumbMediaId = $thumbMediaId;
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

        $this->setMsgType('music');
        //判断通用参数并设置通用的数据
        $this->isRightValueSet();

        if(empty($this->title)){
            $this->setTitle('');
        }

        if(empty($this->description)){
            $this->setDescription('');
        }

        if(empty($this->musicURL)){
            $this->musicURL('');
        }

        if(empty($this->hQMusicUrl)){
            $this->setHQMusicUrl('');
        }


        if(empty($this->thumbMediaId)){
            throw  new \Exception('通过素材管理中的媒体ID');
        }

        $this->value[] = $this->title;
        $this->value[] = $this->description;
        $this->value[] = $this->musicURL;
        $this->value[] = $this->hQMusicUrl;
        $this->value[] = $this->thumbMediaId;

        return vsprintf($this->template,$this->value);

    }

}