<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 9:45
 */

namespace Wechat\GroupSend\Entity;

/**********************************
 * 类名： ArticleList
 * @package Wechat\GroupSend\Entity
 * 文件描述：文章列表
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/29
 * 时间: 9:46
 */
class ArticleList
{

    private $value = [];

    /**
     * @return array
     */
    public function getValue(): array
    {
        return $this->value;
    }

    /**
     * @param array $value
     */
    public function setValue(array $value): void
    {
        $this->value = $value;
    }


    public function getArrayOrJson($isjson){

        $arr = [];
        foreach ($this->value as $key => $val){
            if($val instanceof Article){
                $arr [] = $val->getArrayOrJson();
            }
        }

        if(count($arr)>0){
            $list['articles'] = $arr;

            if($isjson){
                return json_encode($list);
            }

            return $list;
        }

        return null;

    }



}