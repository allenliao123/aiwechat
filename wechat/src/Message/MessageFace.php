<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/21
 * Time: 16:51
 */

namespace Wechat\Message;

use Wechat\Message\Entity\MessageImage;
use Wechat\Message\Entity\MessageLink;
use Wechat\Message\Entity\MessageLocation;
use Wechat\Message\Entity\MessageShortVideo;
use Wechat\Message\Entity\MessageText;
use Wechat\Message\Entity\MessageVideo;
use Wechat\Message\Entity\MessageVoice;
use Wechat\Message\Event\EventLocation;
use Wechat\Message\Event\EventMenuClick;
use Wechat\Message\Event\EventScan;
use Wechat\Message\Event\EventSubscribe;
use Wechat\Message\Event\EventView;

/********************************
 * 类名： MessageFace
 * @package Wechat\Message
 * 文件描述：消息解析类
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/21
 * 时间: 16:51
 */
class MessageFace
{

    //解析XML的消息
    public static function parseXMl($xml){


        // 解析该xml字符串，利用simpleXML
        libxml_disable_entity_loader(true);
        //禁止xml实体解析，防止xml注入
        $res = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);


        $msg = null;
        //根据消息类型类型赋予不同处理类
        //如果是事件
        if($res->MsgType == MessageConstants::TYPE_EVENT){

            //如果是关注和取消关注时间
            if($res->Event == EventConstants::EVENT_SUBSCRIBE || $res->Event == EventConstants::EVENT_UNSUBSCRIBE){
                $msg = new EventSubscribe();
                if(!empty($res->EventKey)){
                    $msg->setEventKey($res->EventKey);
                    $msg->setTicket($res->ETicket);
                }
            }


            //如果是扫码
            if($res->Event == EventConstants::EVENT_SCAN ){
                $msg = new EventScan();
                $msg->setEventKey($res->EventKey);
                $msg->setTicket($res->ETicket);
            }


            //如果地理位置事件
            if($res->Event == EventConstants::EVENT_LOCATION ){
                $msg = new EventLocation();
                $msg->setLatitude($res->Latitude);
                $msg->setLongitude($res->setLongitude);
                $msg->setPrecision($res->Precision);
            }

            //如果自定义菜单事件
            if($res->Event == EventConstants::EVENT_CLICK ){
                $msg = new EventMenuClick();
                $msg->setEventKey($res->EventKey);
            }

            //如果菜单跳转链接时的事件
            if($res->Event == EventConstants::EVENT_VIEW ){
                $msg = new EventView();
                $msg->setEventKey($res->EventKey);
            }


        }else{

            //如果是文本消息
            if($res->MsgType == MessageConstants::TYPE_TEXT){
                $msg = new MessageText();
                $msg->setContent($res->Content);

                //设置问卷属性，参考客服消息中，发送菜单消息
                if(!empty($res->bizmsgmenuid)){
                    $msg->setBizmsgmenuid($res->bizmsgmenuid);
                }
            }


            //如果是图片
            if($res->MsgType == MessageConstants::TYPE_IMAGE){
                $msg = new MessageImage();
                $msg->setPicUrl($res->PicUrl);
            }

            //如果是语音
            if($res->MsgType == MessageConstants::TYPE_VOICE){
                $msg = new MessageVoice();
                $msg->setMediaId($res->MediaId);
                $msg->setFormat($res->Format);
            }

            //如果是视频
            if($res->MsgType == MessageConstants::TYPE_VIDEO){
                $msg = new MessageVideo();
                $msg->setMediaId($res->MediaId);
                $msg->setThumbMediaId($res->ThumbMediaId);
            }

            //如果是小视频
            if($res->MsgType == MessageConstants::TYPE_SHORTVIDEO){
                $msg = new MessageShortVideo();
                $msg->setMediaId($res->MediaId);
                $msg->setThumbMediaId($res->ThumbMediaId);
            }


            //如果是地理位置
            if($res->MsgType == MessageConstants::TYPE_LOCATION){
                $msg = new MessageLocation();
                $msg->setLocationX($res->Location_X);
                $msg->setLocationY($res->Location_Y);
                $msg->setScale($res->Scale);
                $msg->setLabel($res->Label);
            }

            //如果是小视频
            if($res->MsgType == MessageConstants::TYPE_LINK){
                $msg = new MessageLink();
                $msg->setTitle($res->Title);
                $msg->setDescription($res->Description);
                $msg->setUrl($res->Url);
            }

            $msg->setMsgId($res->MsgId);
        }


        //设置通用参数
        $msg->setToUserName($res->ToUserName);
        $msg->setFromUserName($res->FromUserName);
        $msg->setMsgType($res->MsgType);

        return $msg;


    }

}