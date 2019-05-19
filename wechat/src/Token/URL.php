<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/18
 * Time: 17:32
 */

namespace Wechat\Token;

/******************************************
 * 类名： URL
 * @package Wechat\Token
 * 文件描述：微信接口API http_url值
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/18
 * 时间: 17:32
 */
class URL
{

    const TOKEN_VALUE_GET = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s";

}