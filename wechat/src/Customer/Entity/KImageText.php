<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/25
 * Time: 18:11
 */

namespace Wechat\Customer\Entity;


class KImageText
{


    use CustomerTrait;


    private $title = null;
    private $description = null;
    private $url = null;
    private $picurl = null;
    private $media_id = null;

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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param null $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return null
     */
    public function getPicurl()
    {
        return $this->picurl;
    }

    /**
     * @param null $picurl
     */
    public function setPicurl($picurl): void
    {
        $this->picurl = $picurl;
    }

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

        $this->setMsgtype('news');
        $this->isRightValueSet();

        if(empty($this->title)){
            throw new \Exception('标题必填');
        }


        if(empty($this->description)){
            throw new \Exception('描述必填');
        }

        if(empty($this->url)){
            throw new \Exception('跳转链接必填');
        }

        if(empty($this->picurl)){
            throw new \Exception('图文图片必填');
        }

        $article['title']= $this->getTitle();
        $article['description']= $this->getDescription();
        $article['url']= $this->getUrl();
        $article['picurl']= $this->getPicurl();

        $this->value['news']['articles'][] = $article;

        if($isjson){
            return json_encode($this->value);
        }
        return $this->value;

    }


    /**
     * 描述:
     * 日期：2019/5/26
     * 时间：17:33
     * 创建者：36168
     */
    public function getArrayOrJsonOfMedia($isjson = null){

        $this->value = [];

        $this->setMsgtype('news');
        $this->isRightValueSet();



        if(empty($this->media_id)){
            throw new \Exception('媒体ID必填');
        }

        $this->value['mpnews']['media_id'] = $this->getMediaId();

        if($isjson){
            return json_encode($this->value);
        }
        return $this->value;


    }

}