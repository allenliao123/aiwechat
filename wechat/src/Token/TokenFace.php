<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/18
 * Time: 17:30
 */

namespace Wechat\Token;

use GuzzleHttp\Client;
use Wechat\Common\Account;
use Wechat\Traits\Face;
use Wechat\Utils\HttpClient;

/******************************************
 * 类名： TokenFace
 * @package Wechat\Token
 * 文件描述：TOKEN 获取类
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/18
 * 时间: 17:30
 */
class TokenFace
{
    use Face;

    /******************************************
     * @param Account $account
     * @return array
     * 描述: 获取TOKEN值
     * 日期：2019/5/18
     * 时间：17:31
     * 创建者：36168
     */
    public function achiveToken(){

       $account = $this->account;
       //获取URL值
       $url = vsprintf(URL::TOKEN_VALUE_GET,[$account->getAppid(),$account->getSecret()]);
       $data = HttpClient::Get($url);
       return $data;

    }



}