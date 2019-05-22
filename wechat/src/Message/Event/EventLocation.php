<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/21
 * Time: 17:29
 */

namespace Wechat\Message\Event;

/******************************************
 * 类名： EventLocation
 * @package Wechat\Message\Event
 * 文件描述： 上报地理位置
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/21
 * 时间: 17:29
 */
class EventLocation
{
    use EventTrait;

    private $latitude = null;//地理位置纬度
    private $longitude = null;//地理位置纬度
    private $precision = null;

    /**
     * @return null
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param null $latitude
     */
    public function setLatitude($latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return null
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param null $longitude
     */
    public function setLongitude($longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return null
     */
    public function getPrecision()
    {
        return $this->precision;
    }

    /**
     * @param null $precision
     */
    public function setPrecision($precision): void
    {
        $this->precision = $precision;
    }//地理位置精度





}