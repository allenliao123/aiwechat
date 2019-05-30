<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/25
 * Time: 18:11
 */

namespace Wechat\Customer\Entity;


class KMusic
{


    use CustomerTrait;


    private $title = null;
    private $description = null;

    private $musicurl = null;
    private $hqmusicurl = null;
    private $thumb_media_id = null;


    /**
     * @return null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param null $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return null
     */
    public function getMusicurl()
    {
        return $this->musicurl;
    }

    /**
     * @param null $musicurl
     */
    public function setMusicurl($musicurl): void
    {
        $this->musicurl = $musicurl;
    }

    /**
     * @return null
     */
    public function getHqmusicurl()
    {
        return $this->hqmusicurl;
    }

    /**
     * @param null $hqmusicurl
     */
    public function setHqmusicurl($hqmusicurl): void
    {
        $this->hqmusicurl = $hqmusicurl;
    }

    /**
     * @return null
     */
    public function getThumbMediaId()
    {
        return $this->thumb_media_id;
    }

    /**
     * @param null $thumb_media_id
     */
    public function setThumbMediaId($thumb_media_id): void
    {
        $this->thumb_media_id = $thumb_media_id;
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

        $this->setMsgtype('music');
        $this->isRightValueSet();

        if(empty($this->thumb_media_id)){
            throw new \Exception('媒体ID必填');
        }


        $this->value['music']['title'] = $this->getTitle();
        $this->value['music']['description'] = $this->getDescription();
        $this->value['music']['musicurl'] = $this->getMusicurl();
        $this->value['music']['hqmusicurl'] = $this->getHqmusicurl();
        $this->value['music']['thumb_media_id'] = $this->getThumbMediaId();

        if($isjson){
            return json_encode($this->value);
        }
        return $this->value;

    }

}