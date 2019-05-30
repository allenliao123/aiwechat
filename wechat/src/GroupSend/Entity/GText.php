<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 14:32
 */

namespace Wechat\GroupSend\Entity;


class GText implements GmessageInterface
{
    private $tag = null;
    private $content = null;

    /**
     * @return null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param null $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return null
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param null $tag
     */
    public function setTag($tag): void
    {
        $this->tag = $tag;
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
            $value['text']['content'] = $this->content;
            $value['msgtype'] = 'text';
            return json_encode($value);
        }
        return null;
    }

}