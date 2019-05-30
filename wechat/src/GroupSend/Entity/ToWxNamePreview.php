<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 15:28
 */

namespace Wechat\GroupSend\Entity;


class ToWxNamePreview
{

    private $towxname = null;

    /**
     * @return null
     */
    public function getTowxname()
    {
        return $this->towxname;
    }

    /**
     * @param null $towxname
     */
    public function setTowxname($towxname): void
    {
        $this->towxname = $towxname;
    }

    public function getArray()
    {
        $val['towxname'] = $this->getTowxname();
        return $val;
    }

}