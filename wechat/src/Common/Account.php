<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/18
 * Time: 17:22
 */

namespace Wechat\Common;

/******************************************
 * 类名： Account
 * @package Wechat\Common
 * 文件描述：微信用户账号信息
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/18
 * 时间: 17:22
 */
class Account
{

    private $appid = null;
    private $secret = null;
    private $token = null;

    /******************************************
     * 构造函数
     * Account constructor.
     * a
     */
    public function __construct(string $appid,string $secret)
    {
        $this->appid = $appid;
        $this->secret = $secret;
    }


    /**
     * @return string|null
     */
    public function getAppid(): ?string
    {
        return $this->appid;
    }

    /**
     * @param string|null $appid
     */
    public function setAppid(?string $appid): void
    {
        $this->appid = $appid;
    }

    /**
     * @return string|null
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }

    /**
     * @param string|null $secret
     */
    public function setSecret(?string $secret): void
    {
        $this->secret = $secret;
    }

    /**
     * @return null
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param null $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }


}