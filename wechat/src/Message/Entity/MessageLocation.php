<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/21
 * Time: 16:42
 */

namespace Wechat\Message\Entity;

/******************************************
 * 类名： MessageLocation
 * @package Wechat\Message\Entity
 * 文件描述：地理位置信息
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/21
 * 时间: 16:42
 */
class MessageLocation
{

    use MessageTrait;

    private $location_X = null;//地理位置维度
    private $location_Y = null;//地理位置经度
    private $scale = null;//地图缩放大小
    private $label = null;

    /**
     * @return null
     */
    public function getLocationX()
    {
        return $this->location_X;
    }

    /**
     * @param null $location_X
     */
    public function setLocationX($location_X): void
    {
        $this->location_X = $location_X;
    }

    /**
     * @return null
     */
    public function getLocationY()
    {
        return $this->location_Y;
    }

    /**
     * @param null $location_Y
     */
    public function setLocationY($location_Y): void
    {
        $this->location_Y = $location_Y;
    }

    /**
     * @return null
     */
    public function getScale()
    {
        return $this->scale;
    }

    /**
     * @param null $scale
     */
    public function setScale($scale): void
    {
        $this->scale = $scale;
    }

    /**
     * @return null
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param null $label
     */
    public function setLabel($label): void
    {
        $this->label = $label;
    }//地理位置信息


}