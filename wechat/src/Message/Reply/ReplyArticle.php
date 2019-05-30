<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/22
 * Time: 15:01
 */

namespace Wechat\Message\Reply;


class ReplyArticle
{

    private $title = null;
    private $description = null;
    private $picurl = null;
    private $url = null;

    private $template = "<item><Title><![CDATA[%s]]></Title><Description><![CDATA[%s]]></Description><PicUrl><![CDATA[%s]]></PicUrl><Url><![CDATA[%s]]></Url></item>";
    /**
     * @return null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param null $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return null
     */
    public function getPicurl()
    {
        return $this->picurl;
    }

    /**
     * @param null $picurl
     */
    public function setPicurl($picurl): void
    {
        $this->picurl = $picurl;
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


    /*******************************
     * @return string
     * @throws \Exception
     * 描述: 获取系统的消息设置
     * 日期：2019/5/22
     * 时间：14:40
     * 创建者：36168
     */
    public function getMessageXml()
    {

        if(empty($this->title)){
            throw  new \Exception('文章标题不能为空');
        }

        if(empty($this->description)){
            throw  new \Exception('文章描述不能为空');
        }

        if(empty($this->picurl)){
            throw  new \Exception('图片链接不能为空，支持JPG、PNG格式，较好的效果为大图360*200，小图200*200');
        }

        if(empty($this->url)){
            throw  new \Exception('点击图文消息跳转链接不能为空');
        }

        $this->value[] = $this->title;
        $this->value[] = $this->description;
        $this->value[] = $this->picurl;
        $this->value[] = $this->url;
        return vsprintf($this->template,$this->value);

    }


    }