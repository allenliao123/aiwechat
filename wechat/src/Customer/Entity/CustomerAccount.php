<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/25
 * Time: 15:49
 */

namespace Wechat\Customer\Entity;


class CustomerAccount
{

    private $kf_account = null;//完整客服帐号，格式为：帐号前缀@公众号微信号，帐号前缀最多10个字符，必须是英文、数字字符或者下划线，后缀为公众号微信号，长度不超过30个字符
    private $nickname = null;
    private $password = null;

    private $invite_wx = null;//接收绑定邀请的客服微信号

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
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param null $nickname
     */
    public function setNickname($nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @return null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param null $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return null
     */
    public function getInviteWx()
    {
        return $this->invite_wx;
    }

    /**
     * @param null $invite_wx
     */
    public function setInviteWx($invite_wx): void
    {
        $this->invite_wx = $invite_wx;
    }



    /***************************************
     * @param $isjson
     * @return false|string
     * 描述: 获取账号数据
     * 日期：2019/5/25
     * 时间：15:52
     * 创建者：36168
     */
    public function getArrayOrJson($isjson){

        $value['kf_account'] = $this->getKfAccount();
        $value['nickname'] = $this->getNickname();
//        $value['password'] = $this->getPassword();

        if($isjson){
            return json_encode($value);
        }

        return $value;

    }


    /***************************************
     * @param $isjson
     * @return false|string
     * 描述: 获取账号邀请数据
     * 日期：2019/5/25
     * 时间：15:52
     * 创建者：36168
     */
    public function getInvite($isjson=null){

        $value['kf_account'] = $this->getKfAccount();
        $value['invite_wx'] = $this->getInviteWx();

        if($isjson){
            return json_encode($value);
        }

        return $value;

    }


}