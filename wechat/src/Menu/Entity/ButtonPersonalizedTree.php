<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/20
 * Time: 10:22
 */

namespace Wechat\Menu\Entity;

/******************************************
 * 类名： ButtonPersonalizedTree
 * @package Wechat\Menu\Entity
 * 文件描述： 获取个性化菜单
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/20
 * 时间: 10:31
 */
class ButtonPersonalizedTree extends ButtonTree
{

    private $matchrule = null;

    //获取个性化按钮
    public function getArrayOfPersonalButton($isJson = null){

        $buttons = $this->getArrayOfButton();
        $matchrule = $this->matchrule->getArrayOfButton();
        $menu = array_merge($buttons,$matchrule);

        if($isJson){
            $menu =  json_encode($menu,JSON_UNESCAPED_UNICODE);
        }
        return $menu;
    }


    /**
     * @return null
     */
    public function getMatchrule()
    {
        return $this->matchrule;
    }

    /**
     * @param null $matchrule
     */
    public function setMatchrule(ButtonPersonalized $matchrule): void
    {
        $this->matchrule = $matchrule;
    }








}