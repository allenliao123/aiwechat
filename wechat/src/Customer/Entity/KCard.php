<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/25
 * Time: 18:12
 */

namespace Wechat\Customer\Entity;


class KCard
{

    use CustomerTrait;
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

        $this->setMsgtype('wxcard');
        $this->isRightValueSet();

        if(empty($this->card_id)){
            throw new \Exception('卡券ID必填');
        }
        $this->value['wxcard']['card_id'] = $this->getCardId();

        if($isjson){
            return json_encode($this->value);
        }
        return $this->value;

    }

}