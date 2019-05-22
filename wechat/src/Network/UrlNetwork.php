<?php
/************************************
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/20
 * Time: 16:06
 */

namespace Wechat\Network;


use Wechat\Utils\Constants;

class UrlNetwork
{

    const WECHAT_IP = "https://".Constants::HTTP_API."/cgi-bin/getcallbackip?access_token=%s";
    //网络检测
    const NETWORK = "https://".Constants::HTTP_API."/cgi-bin/callback/check?access_token=%s";

}