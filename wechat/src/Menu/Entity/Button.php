<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/19
 * Time: 12:54
 */

namespace Wechat\Menu\Entity;

/******************************************
 * 类名： Button
 * @package Wechat\Menu\Entity
 * 文件描述：菜单实体
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/19
 * 时间: 12:54
 */
class Button
{

    const CLICK = 'click';//点击推事件用户点击click类型按钮后，微信服务器会通过消息接口推送消息类型为event的结构给开发者（参考消息接口指南），并且带上按钮中开发者填写的key值，开发者可以通过自定义的key值与用户进行交互；
    const VIEW = 'view';//跳转URL用户点击view类型按钮后，微信客户端将会打开开发者在按钮中填写的网页URL，可与网页授权获取用户基本信息接口结合，获得用户基本信息。
    const SCANCODE_PUSH = 'scancode_push';//扫码推事件用户点击按钮后，微信客户端将调起扫一扫工具，完成扫码操作后显示扫描结果（如果是URL，将进入URL），且会将扫码的结果传给开发者，开发者可以下发消息。
    const SCANCODE_WAITMSG = 'scancode_waitmsg';//扫码推事件且弹出“消息接收中”提示框用户点击按钮后，微信客户端将调起扫一扫工具，完成扫码操作后，将扫码的结果传给开发者，同时收起扫一扫工具，然后弹出“消息接收中”提示框，随后可能会收到开发者下发的消息。
    const PIC_SYSPHOTO = 'pic_sysphoto';//弹出系统拍照发图用户点击按钮后，微信客户端将调起系统相机，完成拍照操作后，会将拍摄的相片发送给开发者，并推送事件给开发者，同时收起系统相机，随后可能会收到开发者下发的消息。
    const PIC_PHOTO_OR_ABLUM = 'pic_photo_or_album';//弹出拍照或者相册发图用户点击按钮后，微信客户端将弹出选择器供用户选择“拍照”或者“从手机相册选择”。用户选择后即走其他两种流程。
    const PIC_WEIXIN = 'pic_weixin';//弹出微信相册发图器用户点击按钮后，微信客户端将调起微信相册，完成选择操作后，将选择的相片发送给开发者的服务器，并推送事件给开发者，同时收起相册，随后可能会收到开发者下发的消息。
    const LOCATION_SELECT = 'location_select';//弹出地理位置选择器用户点击按钮后，微信客户端将调起地理位置选择工具，完成选择操作后，将选择的地理位置发送给开发者的服务器，同时收起位置选择工具，随后可能会收到开发者下发的消息。
    const MEDIA_ID = 'media_id';//下发消息（除文本消息）用户点击media_id类型按钮后，微信服务器会将开发者填写的永久素材id对应的素材下发给用户，永久素材类型可以是图片、音频、视频、图文消息。请注意：永久素材id必须是在“素材管理/新增永久素材”接口上传后获得的合法id。
    const VIEW_LIMITED = 'view_limited';//跳转图文消息URL用户点击view_limited类型按钮后，微信客户端将打开开发者在按钮中填写的永久素材id对应的图文消息URL，永久素材类型只支持图文消息。请注意：永久素材id必须是在“素材管理/新增永久素材”接口上传后获得的合法id。
    const MINIPROGRAM = 'miniprogram';//设置小程序类型按钮


    private $button = [];//当前菜单,一级菜单数组，个数应为1~3个
    private $sub_button =[];//二级菜单数组，个数应为1~5个
    private $type = null;//菜单的响应动作类型，view表示网页类型，click表示点击类型，miniprogram表示小程序类型
    private $name = null;//菜单标题，不超过16个字节，子菜单不超过60个字节
    private $key = null;//菜单KEY值，用于消息接口推送，不超过128字节
    private $url = null;//网页 链接，用户点击菜单可打开链接，不超过1024字节。 type为miniprogram时，不支持小程序的老版本客户端将打开本url。	view、miniprogram类型必须
    private $media_id = null;//调用新增永久素材接口返回的合法media_id,media_id类型和view_limited类型必须
    private $appid = null;//小程序的appid（仅认证公众号可配置）,miniprogram类型必须
    private $pagepath = null;


    private $value = [];


    //获取
    public function getArrayOfJson(){


        $flag = $this->isRightOfButtonAndSetValues();
        if($flag){
            $sub_button = $this->getSubButton();

            //判断是否少于5
            if(count($sub_button)>5){
                throw new \Exception('子菜单不能超过5个');
            }

            $sub = [];
            //循环二级菜单
            foreach ($sub_button as $key =>  $val){
               $sub_flag =  $val->isRightOfButtonAndSetValues();
               if($sub_flag){
                   array_push($sub,$val->getValue());
               }
            }

            $button = $this->getValue();
            if(count($sub)>0){

                $button['sub_button'] = $sub;

            }
            return $button;
        }


    }

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


    /*************************************
     * 描述: 判断按钮是否设置正确
     * 日期：2019/5/19
     * 时间：13:57
     * 创建者：36168
     */

    public function  isRightOfButtonAndSetValues(){

        $button = $this;
        //判断当前按钮的类型
        $btn_type = $button->getType();
        $this->setValue(array_merge($this->value,['type'=>$btn_type]));

        if(empty($btn_type)){
            throw  new \Exception('类型不能为空');
        }

        if(empty($button->getName())){
            throw  new \Exception('名称不能为空');
        }

        $this->setValue(array_merge($this->value,['name'=>$button->getName()]));

        //click等点击类型必须
        if($btn_type==Button::CLICK){

            if(empty($button->getKey())){
                throw  new \Exception('Click类型的Key值不能为空');
            }

            $this->setValue(array_merge($this->value,['key'=>$button->getKey()]));
        }

        //view、miniprogram类型必须
        if($btn_type == Button::VIEW || $btn_type == Button::MINIPROGRAM){
            if(empty($button->getUrl())){
                throw  new \Exception('view、miniprogram类型URL不能为空');
            }

            $this->setValue(array_merge($this->value,['key'=>$button->getUrl()]));
        }

        //media_id类型和view_limited类型必须
        if($btn_type == Button::MEDIA_ID || $btn_type == Button::VIEW_LIMITED){
            if(empty($button->getMediaId())){
                throw  new \Exception('media_id类型和view_limited类型media_id不能为空');
            }

            $this->setValue(array_merge($this->value,['media_id'=>$button->getMediaId()]));
        }

        //miniprogram类型必须
        if($btn_type == Button::MINIPROGRAM ){
            if(empty($button->getAppid())){
                throw  new \Exception('小程序类型appid不能为空');
            }

            $this->setValue(array_merge($this->value,['appid'=>$button->getAppid()]));
        }

        //miniprogram类型必须
        if($btn_type == Button::MINIPROGRAM ){
            if(empty($button->getPagepath())){
                throw  new \Exception('小程序的页面路径');
            }

            $this->setValue(array_merge($this->value,['pagepath'=>$button->getPagepath()]));
        }

        return true;
    }


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
    public function setButton(array $button): void
    {
        $this->button = $button;
    }

    /**
     * @return array
     */
    public function getSubButton(): array
    {
        return $this->sub_button;
    }

    /**
     * @param array $sub_button
     */
    public function setSubButton(Button $sub_button): void
    {
        //不能大于5个
        if(count($this->sub_button)>5){
            return;
        }
        array_push($this->sub_button,$sub_button);
    }

    /**
     * @return null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param null $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return null
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param null $key
     */
    public function setKey($key): void
    {
        $this->key = $key;
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

    /**
     * @return null
     */
    public function getMediaId()
    {
        return $this->media_id;
    }

    /**
     * @param null $media_id
     */
    public function setMediaId($media_id): void
    {
        $this->media_id = $media_id;
    }

    /**
     * @return null
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * @param null $appid
     */
    public function setAppid($appid): void
    {
        $this->appid = $appid;
    }

    /**
     * @return null
     */
    public function getPagepath()
    {
        return $this->pagepath;
    }

    /**
     * @param null $pagepath
     */
    public function setPagepath($pagepath): void
    {
        $this->pagepath = $pagepath;
    }//小程序的页面路径,miniprogram类型必须



}