<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 14:42
 */

namespace Wechat\GroupSend\Entity;


class GNews implements GmessageInterface
{

    private $media_id = null;
    private $send_ignore_reprint = 0;

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
    public function getSendIgnoreReprint()
    {
        return $this->send_ignore_reprint;
    }

    /**
     * @param null $send_ignore_reprint
     */
    public function setSendIgnoreReprint($send_ignore_reprint): void
    {
        $this->send_ignore_reprint = $send_ignore_reprint;
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
            $value['mpnews']['media_id'] = $this->media_id;
            $value['msgtype'] = 'mpnews';
            $value['send_ignore_reprint'] = $this->send_ignore_reprint;
            return json_encode($value);
        }
        return null;
    }

}