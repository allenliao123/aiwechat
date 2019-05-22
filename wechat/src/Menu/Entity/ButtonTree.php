<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/19
 * Time: 15:07
 */

namespace Wechat\Menu\Entity;

use phpDocumentor\Reflection\Types\Boolean;

/***********************************************
 * 类名： ButtonTree
 * @package Wechat\Menu\Entity
 * 文件描述：按钮树
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/19
 * 时间: 15:08
 */
class ButtonTree
{

    private $button =[];

    /**
     * @return array
     */
    public function getButton(): array
    {
        return $this->button;
    }

    /**
     * @param array $button
     */
    public function setButton(Button $button): void
    {
        array_push($this->button,$button);
    }


    /********************************************
     * @param Boolean $isJson
     * @return false|string
     * 描述: 获取按钮树的值
     * 日期：2019/5/19
     * 时间：15:14
     * 创建者：36168
     */
    public function getArrayOfButton($isJson = null){


        if(count($this->button)>3 || count($this->button)==0){
            throw new \Exception('一级目录1-3个之间');
        }

        $buttons['button'] =  [];
        $cur = $this->getButton();

        foreach ($cur as $key => $val){
            $buttons['button'][] =  $val->getArrayOfJson();
        }

        if($isJson){
            return json_encode($buttons,JSON_UNESCAPED_UNICODE);
        }

        return $buttons;

    }

}