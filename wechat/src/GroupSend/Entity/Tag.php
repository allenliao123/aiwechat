<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 14:17
 */

namespace Wechat\GroupSend\Entity;


class Tag implements Filter
{

    private $is_to_all = null;//
    private $tag_id = null;

    /**
     * @return null
     */
    public function getisToAll()
    {
        return $this->is_to_all;
    }

    /**
     * @param null $is_to_all
     */
    public function setIsToAll($is_to_all): void
    {
        $this->is_to_all = $is_to_all;
    }

    /**
     * @return null
     */
    public function getTagId()
    {
        return $this->tag_id;
    }

    /**
     * @param null $tag_id
     */
    public function setTagId($tag_id): void
    {
        $this->tag_id = $tag_id;
    }

    public function getArray(){

        $val['filter']['is_to_all'] = $this->getisToAll();
        $val['filter']['tag_id'] = $this->getTagId()==null?'':$this->getTagId();

        return $val;
    }



}