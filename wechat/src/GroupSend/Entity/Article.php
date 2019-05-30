<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 9:45
 */

namespace Wechat\GroupSend\Entity;


class Article
{

    private $thumb_media_id = null;//图文消息缩略图的media_id，可以在素材管理-新增素材中获得
    private $author = null;//图文消息的作者
    private $title = null;//图文消息的标题
    private $content_source_url = null;//在图文消息页面点击“阅读原文”后的页面，受安全限制，如需跳转Appstore，可以使用itun.es或appsto.re的短链服务，并在短链后增加 #wechat_redirect 后缀
    private $content = null;//图文消息页面的内容，支持HTML标签。具备微信支付权限的公众号，可以使用a标签，其他公众号不能使用，如需插入小程序卡片，可参考下文
    private $digest = null;//图文消息的描述，如本字段为空，则默认抓取正文前64个字
    private $show_cover_pic = null;//是否显示封面，1为显示，0为不显示
    private $need_open_comment = null;//Uint32 是否打开评论，0不打开，1打开
    private $only_fans_can_comment = null;//Uint32 是否粉丝才可评论，0所有人可评论，1粉丝才可评论
    private $send_ignore_reprint  = 0;

    /**
     * @return null
     */
    public function getThumbMediaId()
    {
        return $this->thumb_media_id;
    }

    /**
     * @param null $thumb_media_id
     */
    public function setThumbMediaId($thumb_media_id): void
    {
        $this->thumb_media_id = $thumb_media_id;
    }

    /**
     * @return null
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param null $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

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
    public function getContentSourceUrl()
    {
        return $this->content_source_url;
    }

    /**
     * @param null $content_source_url
     */
    public function setContentSourceUrl($content_source_url): void
    {
        $this->content_source_url = $content_source_url;
    }

    /**
     * @return null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param null $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return null
     */
    public function getDigest()
    {
        return $this->digest;
    }

    /**
     * @param null $digest
     */
    public function setDigest($digest): void
    {
        $this->digest = $digest;
    }

    /**
     * @return null
     */
    public function getShowCoverPic()
    {
        return $this->show_cover_pic;
    }

    /**
     * @param null $show_cover_pic
     */
    public function setShowCoverPic($show_cover_pic): void
    {
        $this->show_cover_pic = $show_cover_pic;
    }

    /**
     * @return null
     */
    public function getNeedOpenComment()
    {
        return $this->need_open_comment;
    }

    /**
     * @param null $need_open_comment
     */
    public function setNeedOpenComment($need_open_comment): void
    {
        $this->need_open_comment = $need_open_comment;
    }

    /**
     * @return null
     */
    public function getOnlyFansCanComment()
    {
        return $this->only_fans_can_comment;
    }

    /**
     * @param null $only_fans_can_comment
     */
    public function setOnlyFansCanComment($only_fans_can_comment): void
    {
        $this->only_fans_can_comment = $only_fans_can_comment;
    }

    /**
     * @return int
     */
    public function getSendIgnoreReprint(): int
    {
        return $this->send_ignore_reprint;
    }

    /**
     * @param int $send_ignore_reprint
     */
    public function setSendIgnoreReprint(int $send_ignore_reprint): void
    {
        $this->send_ignore_reprint = $send_ignore_reprint;
    }//开发者可以对群发接口的 send_ignore_reprint 参数进行设置，指定待群发的文章被判定为转载时，是否继续群发。


    /********************************
     * 描述: 获取文章的列表信息
     * 日期：2019/5/29
     * 时间：9:52
     * 创建者：36168
     */
    public function getArrayOrJson($isjson){

        $value = [];

        $value['thumb_media_id'] = $this->getThumbMediaId();
        $value['author'] = $this->getAuthor();
        $value['title'] = $this->getTitle();
        $value['content_source_url'] = $this->getContentSourceUrl();
        $value['content'] = $this->getContent();
        $value['digest'] = $this->getDigest();
        $value['show_cover_pic'] = $this->getShowCoverPic();
        $value['need_open_comment'] = $this->getNeedOpenComment();
        $value['only_fans_can_comment'] = $this->getOnlyFansCanComment();
        $value['send_ignore_reprint'] = $this->getSendIgnoreReprint();

        if($isjson){
            return json_encode($value);
        }

        return $value;

    }


}