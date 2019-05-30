<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/26
 * Time: 17:57
 */

namespace Wechat\Customer\Entity;


class KMiniProgram
{

    use CustomerTrait;

    private $title = null;
    private $appid  = null;
    private $pagepath = null;
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
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * @param null $appid
     */
    public function setAppid($appid): void
    {
        $this->appid = $appid;
    }

    /**
     * @return null
     */
    public function getPagepath()
    {
        return $this->pagepath;
    }

    /**
     * @param null $pagepath
     */
    public function setPagepath($pagepath): void
    {
        $this->pagepath = $pagepath;
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

        $this->setMsgtype('miniprogrampage');
        $this->isRightValueSet();

        if(empty($this->title)){
            throw new \Exception('标题必填');
        }

        if(empty($this->appid)){
            throw new \Exception('Appid必填');
        }

        if(empty($this->pagepath)){
            throw new \Exception('小程序页面路劲必填');
        }

        if(empty($this->thumb_media_id)){
            throw new \Exception('媒体ID必填');
        }
        $this->value['miniprogrampage']['title'] = $this->getTitle();
        $this->value['miniprogrampage']['appid'] = $this->getAppid();
        $this->value['miniprogrampage']['pagepath'] = $this->getPagepath();
        $this->value['miniprogrampage']['thumb_media_id'] = $this->getThumbMediaId();

        if($isjson){
            return json_encode($this->value);
        }
        return $this->value;

    }



}