<?php
/********************************
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 14:31
 */

namespace Wechat\GroupSend\Entity;


interface GmessageInterface
{

    public function getArrayOrJson($isjson);

}