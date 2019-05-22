<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/21
 * Time: 16:26
 */

namespace Wechat\Message;

/******************************************
 * 类名： MessageConstants
 * @package Wechat\Message\Entity
 * 文件描述：消息常量
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/21
 * 时间: 16:26
 */
class MessageConstants
{

    const TYPE_TEXT = 'text';//文本消息
    const TYPE_IMAGE = 'image';//图片消息
    const TYPE_VOICE = 'voice';//语音消息
    const TYPE_VIDEO = 'video';//视频消息
    const TYPE_SHORTVIDEO = 'shortvideo';//小视频消息
    const TYPE_LOCATION = 'location';//地理位置消息
    const TYPE_LINK = 'link';//链接消息
    const TYPE_EVENT = 'event';//事件消息

}