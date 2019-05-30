<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/25
 * Time: 18:10
 */

namespace Wechat\Customer\Entity;


class KVedio
{

    use CustomerTrait;

    private  $media_id = null;
    private $thumb_media_id = null;
    private $title = null;
    private $description = null;

    /**
     * @return null
     */
    public function getMediaId()
    {
        return $this->media_id;
    }

    /**
     * @param null $media_id
     */
    public function setMediaId($media_id): void
    {
        $this->media_id = $media_id;
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

        $this->setMsgtype('video');
        $this->isRightValueSet();

        if(empty($this->media_id)){
            throw new \Exception('媒体ID必填');
        }

        if(empty($this->thumb_media_id)){
            throw new \Exception('媒体ID必填');
        }


        $this->value['video']['media_id'] = $this->getMediaId();
        $this->value['video']['thumb_media_id'] = $this->getThumbMediaId();
        $this->value['video']['title'] = $this->getTitle();
        $this->value['video']['description'] = $this->getDescription();

        if($isjson){
            return json_encode($this->value);
        }
        return $this->value;

    }

}