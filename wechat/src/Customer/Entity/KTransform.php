<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/26
 * Time: 13:03
 */

namespace Wechat\Customer\Entity;


use Wechat\Message\Reply\ReplyInterface;
use Wechat\Message\Reply\ReplyTrait;

class KTransform implements ReplyInterface
{

    use ReplyTrait;

    private $KfAccount = null;

    private $template = "<xml>
                          <ToUserName><![CDATA[%s]]></ToUserName>
                          <FromUserName><![CDATA[%s]]></FromUserName>
                          <CreateTime>%s</CreateTime>
                          <MsgType><![CDATA[%s]]></MsgType>
                        </xml>";

    private $template_point = "<xml>
                          <ToUserName><![CDATA[%s]]></ToUserName>
                          <FromUserName><![CDATA[%s]]></FromUserName>
                          <CreateTime>%s</CreateTime>
                          <MsgType><![CDATA[%s]]></MsgType>
                        </xml><TransInfo><KfAccount><![CDATA[%s]]></KfAccount></TransInfo> ";

    /**
     * @return null
     */
    public function getKfAccount()
    {
        return $this->KfAccount;
    }

    /**
     * @param null $KfAccount
     */
    public function setKfAccount($KfAccount): void
    {
        $this->KfAccount = $KfAccount;
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

        $this->value = [];

        $this->setMsgType('transfer_customer_service');
        //判断通用参数并设置通用的数据
        $this->isRightValueSet();

        //指定客服
        if(!empty($this->getKfAccount())){
            $this->value[] = $this->getKfAccount();
            return vsprintf($this->template_point,$this->value);
        }

        return vsprintf($this->template,$this->value);

    }


}