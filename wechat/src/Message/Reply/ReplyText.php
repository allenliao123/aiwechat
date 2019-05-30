<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/22
 * Time: 14:28
 */

namespace Wechat\Message\Reply;

/********************************
 * 类名： ReplyText
 * @package Wechat\Message\Reply
 * 文件描述：文本消息
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/22
 * 时间: 14:28
 */
class ReplyText implements ReplyInterface
{

    use ReplyTrait;

    private $content = null;

    private $template = "<xml>
                          <ToUserName><![CDATA[%s]]></ToUserName>
                          <FromUserName><![CDATA[%s]]></FromUserName>
                          <CreateTime>%s</CreateTime>
                          <MsgType><![CDATA[%s]]></MsgType>
                          <Content><![CDATA[%s]]></Content>
                        </xml>";
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


    /*******************************
     * @return string
     * @throws \Exception
     * 描述: 获取系统的消息设置
     * 日期：2019/5/22
     * 时间：14:40
     * 创建者：36168
     */
    public function getMessageXml(){

        $this->setMsgType('text');
        //判断通用参数并设置通用的数据
        $this->isRightValueSet();

        if(empty($this->content)){
            throw  new \Exception('文本消息的内容不能为空');
        }
        $this->value[] = $this->content;
        return vsprintf($this->template,$this->value);

    }


}