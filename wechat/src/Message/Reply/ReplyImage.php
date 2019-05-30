<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/22
 * Time: 14:42
 */

namespace Wechat\Message\Reply;

/*******************************
 * 类名： ReplyImage
 * @package Wechat\Message\Reply
 * 文件描述： 图片消息回复
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/22
 * 时间: 14:42
 */
class ReplyImage implements ReplyInterface
{

    use ReplyTrait;

    private $mediaId = null;


    private $template = "<xml>
                          <ToUserName><![CDATA[%s]]></ToUserName>
                          <FromUserName><![CDATA[%s]]></FromUserName>
                          <CreateTime>%s</CreateTime>
                          <MsgType><![CDATA[%s]]></MsgType>
                          <Image>
                            <MediaId><![CDATA[%s]]></MediaId>
                          </Image>
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


    /*******************************
     * @return string
     * @throws \Exception
     * 描述: 获取系统的消息设置
     * 日期：2019/5/22
     * 时间：14:40
     * 创建者：36168
     */
    public function getMessageXml(){

        $this->setMsgType('image');
        //判断通用参数并设置通用的数据
        $this->isRightValueSet();

        if(empty($this->mediaId)){
            throw  new \Exception('通过素材管理中的媒体ID');
        }
        $this->value[] = $this->mediaId;
        return vsprintf($this->template,$this->value);

    }

}