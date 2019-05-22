<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/20
 * Time: 9:53
 */

namespace Wechat\Menu\Entity;


class ButtonPersonalized
{

    private $menuid = null;

    private $tag_id = null;//用户标签的id，可通过用户标签管理接口获取
    private $sex =  null;//性别：男（1）女（2），不填则不做匹配
    private $client_platform_type = null;//客户端版本，当前只具体到系统型号：IOS(1), Android(2),Others(3)，不填则不做匹配
    private $country = null;//国家信息，是用户在微信中设置的地区，具体请参考地区信息表
    private $province = null;//省份信息，是用户在微信中设置的地区，具体请参考地区信息表
    private $city = null;//城市信息，是用户在微信中设置的地区，具体请参考地区信息表
    /**
     * 语言信息，是用户在微信中设置的语言，具体请参考语言表： 1、简体中文 "zh_CN" 2、繁体中文TW "zh_TW"
     * 3、繁体中文HK "zh_HK" 4、英文 "en" 5、印尼 "id" 6、马来 "ms" 7、西班牙 "es" 8、韩国 "ko"
     * 9、意大利 "it" 10、日本 "ja" 11、波兰 "pl" 12、葡萄牙 "pt" 13、俄国 "ru" 14、泰文 "th"
     * 15、越南 "vi" 16、阿拉伯语 "ar" 17、北印度 "hi" 18、希伯来 "he" 19、土耳其 "tr" 20、德语 "de" 21、法语 "fr"
     */
    private $language = null;

    private $value = [];

    /**
     * @return null
     */
    public function getTagId()
    {
        return $this->tag_id;
    }

    /**
     * @param null $tag_id
     */
    public function setTagId($tag_id): void
    {
        $this->tag_id = $tag_id;
        $this->value['tag_id'] = $tag_id;
    }

    /**
     * @return null
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param null $sex
     */
    public function setSex($sex): void
    {
        $this->sex = $sex;
        $this->value['sex'] = $sex;
    }

    /**
     * @return null
     */
    public function getClientPlatformType()
    {
        return $this->client_platform_type;
    }

    /**
     * @param null $client_platform_type
     */
    public function setClientPlatformType($client_platform_type): void
    {
        $this->client_platform_type = $client_platform_type;
        $this->value['client_platform_type'] = $client_platform_type;
    }

    /**
     * @return null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param null $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
        $this->value['country'] = $country;
    }

    /**
     * @return null
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param null $province
     */
    public function setProvince($province): void
    {
        if(empty($this->country)){
            throw new \Exception('国家必填');
        }
        $this->province = $province;

        $this->value['province'] = $province;
    }

    /**
     * @return null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param null $city
     */
    public function setCity($city): void
    {
        if(empty($this->country)){
            throw new \Exception('国家必填');
        }

        if(empty($this->province)){
            throw new \Exception('省份必填');
        }
        $this->city = $city;
        $this->value['city'] = $city;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language): void
    {
        $this->language = $language;
        $this->value['language'] = $language;
    }

    /**
     * @return array
     */
    public function getValue(): array
    {
        if(count($this->value)==0){
            throw new \Exception('规则中必须有一个值不为空');
        }
        return $this->value;
    }

    /**
     * @param array $value
     */
    public function setValue(array $value): void
    {
        $this->value = $value;
    }


    /**********************************
     * 描述: 获取个性化设置值
     * 日期：2019/5/20
     * 时间：10:39
     * 创建者：36168
     */
    public function getArrayOfButton(){

        if(count($this->value)==0){
            throw new \Exception('规则中必须有一个值不为空');
        }
        return ['matchrule'=>$this->value];
    }

    /**
     * @return null
     */
    public function getMenuid()
    {
        return $this->menuid;
    }

    /**
     * @param null $menuid
     */
    public function setMenuid($menuid): void
    {
        $this->menuid = $menuid;
    }


}