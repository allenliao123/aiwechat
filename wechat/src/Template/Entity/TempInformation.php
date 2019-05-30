<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/30
 * Time: 11:36
 */

namespace Wechat\Template\Entity;


class TempInformation
{
    private $touser = null;
    private $template_id = null;
    private $url = null;
    private $appid = null;
    private $pagepath = null;

    private $value = [];
    private $first = [];
    private $remark = [];

    /**
     * @return null
     */
    public function getTouser()
    {
        return $this->touser;
    }

    /**
     * @param null $touser
     */
    public function setTouser($touser): void
    {
        $this->touser = $touser;
    }

    /**
     * @return null
     */
    public function getTemplateId()
    {
        return $this->template_id;
    }

    /**
     * @param null $template_id
     */
    public function setTemplateId($template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @return null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param null $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

   public function setMiniprogram($appid,$pagepath){

        $this->appid = $appid;
        $this->pagepath = $pagepath;

   }

    /**
     * @return null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param null $value
     */
    public function setValue($value,$color): void
    {
        $index = count($this->value)+1;
        $this->value['keyword'.($index)]['value'] = $value;
        $this->value['keyword'.($index)]['color'] = $color;
    }

    /**
     * @return null
     */
    public function getFirst()
    {
        return $this->first;
    }

    /**
     * @param null $first
     */
    public function setFirst($value,$color): void
    {
        $this->first['first']['value'] = $value;
        $this->first['first']['color'] = $color;
    }

    /**
     * @return null
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * @param null $remark
     */
    public function setRemark($value,$color): void
    {
        $this->remark['remark']['value'] = $value;
        $this->remark['remark']['color'] = $color;
    }


    /***************************************
     * 描述: 获取
     * 日期：2019/5/30
     * 时间：14:27
     * 创建者：36168
     */
    public function getArrayOrJson($isjson){

        $value = [];
        $value['touser'] = $this->touser;
        $value['template_id'] = $this->template_id;
        $value['url'] = $this->url;
        if(!empty($this->appid)){
            $value['miniprogram']['appid'] = $this->touser;
            $value['miniprogram']['pagepath'] = $this->pagepath;
        }
        $value['data']['first'] = $this->first['first'];
        $value['data'] = array_merge($value['data'],$this->value);
        $value['data']['remark'] = $this->remark['remark'];


        if($isjson){
            return json_encode($value);
        }

        return $value;
    }


}