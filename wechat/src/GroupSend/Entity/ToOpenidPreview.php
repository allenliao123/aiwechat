<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 15:28
 */

namespace Wechat\GroupSend\Entity;


class ToOpenidPreview implements Filter
{

    private $openid = null;

    /**
     * @return null
     */
    public function getOpenid()
    {
        return $this->openid;
    }

    /**
     * @param null $openid
     */
    public function setOpenid($openid): void
    {
        $this->openid = $openid;
    }


    public function getArray()
    {
        $val['to_user'] = $this->getOpenid();
        return $val;
    }


}