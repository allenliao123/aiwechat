<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/20
 * Time: 12:22
 */

namespace Wechat\Network;

use Wechat\Common\Account;
use Wechat\Network\Entity\Network;
use Wechat\Utils\HttpClient;

/******************************************
 * 类名： Network
 * @package Wechat\Network
 * 文件描述：获取网络配置相关信息
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/20
 * 时间: 12:22
 */
class NetworkFace
{

    /**************************************
     * 描述: 获取微信服务器IP地址
     * 日期：2019/5/20
     * 时间：16:12
     * 创建者：36168
     */
    public static function getWechat(Account $account){

        //获取URL值
        $url = vsprintf(UrlNetwork::WECHAT_IP,[$account->getToken()]);
        $data = HttpClient::Get($url);
        return $data;

    }


    /**************************************
     * @return array
     * 描述: 获取网络情况
     * 日期：2019/5/20
     * 时间：17:14
     * 创建者：36168
     */
    public static function checkNetwork(Account $account,Network $network){

        //获取URL值
        $url = vsprintf(UrlNetwork::NETWORK,[$account->getToken()]);
        $data = HttpClient::Post($url,$network->getJsonOfValues());
        return $data;

    }

}