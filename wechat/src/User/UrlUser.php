<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/26
 * Time: 18:27
 */

namespace Wechat\User;


use Wechat\Utils\Constants;

class UrlUser
{

    //用户信息
    const USER_INFO = "https://".Constants::HTTP_API."/cgi-bin/user/info?access_token=%s&openid=%s&lang=zh_CN";

    //用户列表
    const USER_LIST = "https://".Constants::HTTP_API."/cgi-bin/user/get?access_token=%s";

}