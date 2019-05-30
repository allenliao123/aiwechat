<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 14:46
 */

namespace Wechat\GroupSend\Entity;


class GImage implements GmessageInterface
{

    private $media_id = null;

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
            $value['image']['media_id'] = $this->media_id;
            $value['msgtype'] = 'image';
            return json_encode($value);
        }
        return null;
    }

}