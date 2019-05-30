<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 14:30
 */

namespace Wechat\GroupSend\Entity;


class ToUser implements Filter
{
    private $opendids = [];

    /**
     * @return array
     */
    public function getOpendids(): array
    {
        return $this->opendids;
    }

    /**
     * @param array $opendids
     */
    public function setOpendids($opendids): void
    {
        array_push($this->opendids,$opendids);
    }

    public function getArray(){

        $val['to_user'] = $this->getOpendids();
        return $val;
    }



}