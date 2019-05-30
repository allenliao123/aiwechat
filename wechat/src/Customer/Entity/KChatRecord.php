<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/26
 * Time: 19:22
 */

namespace Wechat\Customer\Entity;


class KChatRecord
{

    private $starttime = null;
    private $endtime = null;
    private $msgid = null;
    private $number = null;

    /**
     * @return null
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * @param null $starttime
     */
    public function setStarttime($starttime): void
    {
        $this->starttime = $starttime;
    }

    /**
     * @return null
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * @param null $endtime
     */
    public function setEndtime($endtime): void
    {
        $this->endtime = $endtime;
    }

    /**
     * @return null
     */
    public function getMsgid()
    {
        return $this->msgid;
    }

    /**
     * @param null $msgid
     */
    public function setMsgid($msgid): void
    {
        $this->msgid = $msgid;
    }

    /**
     * @return null
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param null $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
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

        if(empty($this->starttime)){
            throw new \Exception('开始时间必填');
        }

        if(empty($this->endtime)){
            throw new \Exception('结束时间必填');
        }

        if(empty($this->msgid)){
            throw new \Exception('每次获取条数必填');
        }

        if(empty($this->number)){
            throw new \Exception('消息id顺序必填');
        }

        $this->value['starttime'] = $this->getStarttime();
        $this->value['endtime'] = $this->getEndtime();
        $this->value['msgid'] = $this->getMsgid();
        $this->value['number'] = $this->getNumber();

        if($isjson){
            return json_encode($this->value);
        }
        return $this->value;

    }

}