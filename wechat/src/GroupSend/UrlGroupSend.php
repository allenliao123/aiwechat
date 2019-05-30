<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 9:31
 */

namespace Wechat\GroupSend;

use Wechat\Utils\Constants;

/****************************
 * 类名： UrlGroupSend
 * @package Wechat\GroupSend
 * 文件描述：群发消息的接口url
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/29
 * 时间: 9:31
 */
class UrlGroupSend
{

    //添加图片素材
    const GROUP_SEND_UPLOADIMG = "https://".Constants::HTTP_API."/cgi-bin/media/uploadimg?access_token=%s";

    //上传图文消息素材
    const GROUP_SEND_UPLOADNES = "https://".Constants::HTTP_API."/cgi-bin/media/uploadnews?access_token=%s";

    //上传视频素材
    const GROUP_SEND_UPLOADVIDEO = "https://".Constants::HTTP_API."/cgi-bin/media/uploadvideo?access_token=%s";

    //发送消息根据标签
    const GROUP_SEND_TAG = "https://".Constants::HTTP_API."/cgi-bin//message/mass/sendall?access_token=%s";

    //发送消息根据标签
    const GROUP_SEND_OPENID = "https://".Constants::HTTP_API."/cgi-bin//message/mass/send?access_token=%s";//根据OpenID列表群发

    //删除群发
    const GROUP_SEND_DEL = "https://".Constants::HTTP_API."/cgi-bin/message/mass/delete?access_token=%s";//

    //预览
    const GROUP_SEND_PREVIEW = "https://".Constants::HTTP_API."/cgi-bin/message/mass/preview?access_token=%s";//预览

    //查询群发消息发送状态
    const GROUP_SEND_STATUS = "https://".Constants::HTTP_API."/cgi-bin/message/mass/get?access_token=%s";//

    //获取群发速度
    const GROUP_SEND_SPEED_GET = "https://".Constants::HTTP_API."/cgi-bin/message/mass/speed/get?access_token=%s";//

    //设置群发速度
    const GROUP_SEND_SPEED_SET = "https://".Constants::HTTP_API."/cgi-bin/message/mass/speed/set?access_token=%s";//

}