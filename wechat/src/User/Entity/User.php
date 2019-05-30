<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/26
 * Time: 18:26
 */

namespace Wechat\User\Entity;


class User
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

}