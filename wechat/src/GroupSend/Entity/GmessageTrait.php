<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 15:17
 */

namespace Wechat\GroupSend\Entity;


trait GmessageTrait
{

   private $clientmsgid  = null;

    /**
     * @return null
     */
    public function getClientmsgid()
    {
        return $this->clientmsgid;
    }

    /**
     * @param null $clientmsgid
     */
    public function setClientmsgid($clientmsgid): void
    {
        $this->clientmsgid = $clientmsgid;
    }


}