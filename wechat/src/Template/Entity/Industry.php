<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/30
 * Time: 11:19
 */

namespace Wechat\Template\Entity;


class Industry
{

    private $industry_id1 = null;
    private $industry_id2 = null;

    /**
     * @return null
     */
    public function getIndustryId1()
    {
        return $this->industry_id1;
    }

    /**
     * @param null $industry_id1
     */
    public function setIndustryId1($industry_id1): void
    {
        $this->industry_id1 = $industry_id1;
    }

    /**
     * @return null
     */
    public function getIndustryId2()
    {
        return $this->industry_id2;
    }

    /**
     * @param null $industry_id2
     */
    public function setIndustryId2($industry_id2): void
    {
        $this->industry_id2 = $industry_id2;
    }


    /***************************************
     * @param $isjson
     * @return false|string
     * 描述: 获取行业属性
     * 日期：2019/5/30
     * 时间：11:21
     * 创建者：36168
     */
    public function getArrayOrJson($isjson){

        $value['industry_id1']  = $this->industry_id1;
        $value['industry_id2']  = $this->industry_id2;

        if($isjson){
            return json_encode($value);
        }

        return $value;

    }


}