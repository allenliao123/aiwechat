<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 14:53
 */

namespace Wechat\GroupSend\Entity;


class Video
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


    public function getArrayOrJson($isjson){

        $arr['media_id'] = $this->media_id;
        $arr['title'] = $this->title;
        $arr['description'] = $this->description;

        if($isjson){
            return json_encode($arr);
        }

        return $arr;

    }
}