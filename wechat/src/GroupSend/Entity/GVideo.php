<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 14:56
 */

namespace Wechat\GroupSend\Entity;


class GVideo implements GmessageInterface
{
    private $media_id = null;
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
     * @param $isjson
     * 描述: 获取数据
     * 日期：2019/5/29
     * 时间：14:34
     * 创建者：36168
     */
    public function getArrayOrJson($isjson){

        if(empty($this->tag)){
            throw new \Exception('必须设置接收者');
        }


        if($this->tag instanceof Filter){
            $value = $this->tag->getArray();
            $value['mpvideo']['media_id'] = $this->media_id;
            if($this->title){
                $value['mpvideo']['title']  = $this->title;
            }
            if($this->description){
                $value['mpvideo']['description']  = $this->description;
            }
            $value['msgtype'] = 'mpvideo';
            return json_encode($value);
        }
        return null;
    }


}