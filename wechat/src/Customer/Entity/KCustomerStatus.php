<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/26
 * Time: 18:13
 */

namespace Wechat\Customer\Entity;


class KCustomerStatus
{

    use CustomerTrait;

    const TYPING = 'Typing';
    const CANCELTYPING = 'CancelTyping';

    private $command = self::TYPING;

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * @param string $command
     */
    public function setCommand(string $command): void
    {
        $this->command = $command;
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
        $this->setMsgtype('status');
        $this->isRightValueSet();

        unset($this->value['msgtype']);

        if(empty($this->command)){
            throw new \Exception('客服输入状态必填');
        }
        $this->value['command'] = $this->getCommand();

        if($isjson){
            return json_encode($this->value);
        }
        return $this->value;

    }


}