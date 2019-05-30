<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/25
 * Time: 18:10
 */

namespace Wechat\Customer\Entity;


class KImage
{

    use CustomerTrait;

    private  $media_id = null;

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

        $this->setMsgtype('image');
        $this->isRightValueSet();

        if(empty($this->media_id)){
            throw new \Exception('媒体ID必填');
        }
        $this->value['image']['media_id'] = $this->getMediaId();

        if($isjson){
            return json_encode($this->value);
        }
        return $this->value;

    }


}