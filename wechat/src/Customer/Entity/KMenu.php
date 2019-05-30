<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/25
 * Time: 18:12
 */

namespace Wechat\Customer\Entity;


class KMenu
{

    use CustomerTrait;
    private $head_content = null;
    private $tail_content = null;

    private $list = [];

    /**
     * @return null
     */
    public function getHeadContent()
    {
        return $this->head_content;
    }

    /**
     * @param null $head_content
     */
    public function setHeadContent($head_content): void
    {
        $this->head_content = $head_content;
    }

    /**
     * @return null
     */
    public function getTailContent()
    {
        return $this->tail_content;
    }

    /**
     * @param null $tail_content
     */
    public function setTailContent($tail_content): void
    {
        $this->tail_content = $tail_content;
    }

    /**
     * @return null
     */
    public function getList()
    {
        return $this->list;
    }



    public function setList($list): void
    {

        if($list instanceof KMenuInfo){
            array_push($this->list,$list);
        }
        else{
            throw new \Exception('必须为MenuInfo实例');
        }

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

        $this->setMsgtype('msgmenu');
        $this->isRightValueSet();

        if(empty($this->head_content)){
            throw new \Exception('setHeadContent头部信息必填');
        }

        if(empty($this->tail_content)){
            throw new \Exception('setTailContent尾部信息必填');
        }

        if(count($this->list)==0){
            throw new \Exception('选择项不能为空');
        }


        $this->value['msgmenu']['head_content'] = $this->getHeadContent();
        $this->value['msgmenu']['list'] = $this->getListArray();
        $this->value['msgmenu']['tail_content'] = $this->getTailContent();

        if($isjson){
            return json_encode($this->value);
        }
        return $this->value;

    }


    /***************************
     * 描述: 获取列表数组
     * 日期：2019/5/26
     * 时间：17:43
     * 创建者：36168
     */
    private function  getListArray(){

        $val = [];
        foreach ($this->list as $key => $val){
            $value ['id'] = $val->getId();
            $value ['content'] = $val->getContent();
            $val[] = $value;
        }

        return $val;

    }


}