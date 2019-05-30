<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/26
 * Time: 19:11
 */

namespace Wechat\Customer\Session;


class SessionKF
{

    private $kf_account = null;
    private $openid = null;
    private $value =[];

    /**
     * @return null
     */
    public function getKfAccount()
    {
        return $this->kf_account;
    }

    /**
     * @param null $kf_account
     */
    public function setKfAccount($kf_account): void
    {
        $this->kf_account = $kf_account;
    }

    /**
     * @return null
     */
    public function getOpenid()
    {
        return $this->openid;
    }

    /**
     * @param null $openid
     */
    public function setOpenid($openid): void
    {
        $this->openid = $openid;
    }


    /***************************************
     * @param $isjson
     * @return false|string
     * @throws \Exception
     * 描述: 客服消息发送
     * 日期：2019/5/26
     * 时间：17:13
     * 创建者：36168
     */
    public function getArrayOrJson($isjson = null){

        $this->value = [];

        if(empty($this->kf_account)){
            throw new \Exception('客服账号不能为空');
        }

        if(empty($this->openid)){
            throw new \Exception('客服账号不能为空');
        }

        $this->value['kf_account'] = $this->getKfAccount();
        $this->value['openid'] = $this->getOpenid();

        if($isjson){
            return json_encode($this->value);
        }
        return $this->value;

    }



}