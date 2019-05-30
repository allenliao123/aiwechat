<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/25
 * Time: 17:59
 */

namespace Wechat\Customer\Entity;


class KText
{
    use CustomerTrait;

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

        $this->setMsgtype('text');
        $this->isRightValueSet();

        if(empty($this->content)){
            throw new \Exception('消息内容必填');
        }
        $this->value['text']['content'] = $this->getContent();

        if($isjson){
            return json_encode($this->value);
        }
        return $this->value;

    }

}