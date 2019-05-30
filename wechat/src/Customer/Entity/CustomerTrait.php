<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/26
 * Time: 17:07
 */

namespace Wechat\Customer\Entity;


trait CustomerTrait
{


    private $touser = null;
    private $msgtype = null;
    private $value =[];

    private $kf_account =  null;//客服账号

    /**
     * @return null
     */
    public function getTouser()
    {
        return $this->touser;
    }

    /**
     * @param null $touser
     */
    public function setTouser($touser): void
    {
        $this->touser = $touser;
    }

    /**
     * @return null
     */
    public function getMsgtype()
    {
        return $this->msgtype;
    }

    /**
     * @param null $msgtype
     */
    public function setMsgtype($msgtype): void
    {
        $this->msgtype = $msgtype;
    }

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
     * 描述:
     * 日期：2019/5/26
     * 时间：17:09
     * 创建者：36168
     */
    public function isRightValueSet(){

        if(empty($this->touser)){
            throw new \Exception('接受方信息必填');
        }

        if(empty($this->msgtype)){
            throw new \Exception('消息类型必填');
        }

        $this->value['touser'] = $this->touser;
        $this->value['msgtype'] = $this->msgtype;

    }

    /***
     *
     */
    public function getArrayOrJson(){
        return [];
    }



    /*********************************
     * 描述:
     * 日期：2019/5/26
     * 时间：18:03
     * 创建者：36168
     */
    public function getArrayOrJsonCustomService($isjson = null){

        if(empty($this->kf_account)){
            throw new \Exception('客服账号不填');
        }

        $array = $this->getArrayOrJson();
        $array['customservice']['kf_account'] =$this->kf_account;

        if($isjson){
            return json_encode($array);
        }

        return $array;
    }




}