<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 14:57
 */

namespace Wechat\GroupSend\Entity;


class GCard implements GmessageInterface
{

    private $card_id = null;

    /**
     * @return null
     */
    public function getCardId()
    {
        return $this->card_id;
    }

    /**
     * @param null $card_id
     */
    public function setCardId($card_id): void
    {
        $this->card_id = $card_id;
    }


    /**************************************
     * @param $isjson
     * 描述: 获取数组数据
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
            $value['wxcard']['card_id'] = $this->card_id;
            $value['msgtype'] = 'wxcard';
            return json_encode($value);
        }
        return null;
    }


}