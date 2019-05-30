<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/22
 * Time: 14:59
 */

namespace Wechat\Message\Reply;

/********************************
 * 类名： ReplyImageText
 * @package Wechat\Message\Reply
 * 文件描述：图文消息
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/22
 * 时间: 15:09
 */
class ReplyImageText implements ReplyInterface
{

    use ReplyTrait;

    private $articleCount = 0;
    private $artitle = [];

    private $template = "<xml>
                          <ToUserName><![CDATA[%s]]></ToUserName>
                          <FromUserName><![CDATA[%s]]></FromUserName>
                          <CreateTime>%s</CreateTime>
                          <MsgType><![CDATA[%s]]></MsgType>
                          <ArticleCount>%s</ArticleCount>
                          <Articles>
                            %s
                          </Articles>
                        </xml>";


    /**
     * @return array
     */
    public function getArtitle(): array
    {
        return $this->artitle;
    }

    /**
     * @param array $artitle
     */
    public function setArtitle(ReplyArticle $artitle): void
    {
         array_push($this->artitle,$artitle);
    }

    /**
     * @return int
     */
    public function getArticleCount(): int
    {
        return $this->articleCount;
    }

    /**
     * @param int $articleCount
     */
    public function setArticleCount(int $articleCount): void
    {
        $this->articleCount = $articleCount;
    }


    /*******************************
     * @return string
     * @throws \Exception
     * 描述: 获取系统的消息设置
     * 日期：2019/5/22
     * 时间：14:40
     * 创建者：36168
     */
    public function getMessageXml(){

        $this->setMsgType('news');
        //判断通用参数并设置通用的数据
        $this->isRightValueSet();


        $this->setArticleCount(count($this->artitle));
        //判断图文消息的个数
        if($this->articleCount == 0){
            throw  new \Exception('文章个数不能为空');
        }

        if($this->articleCount >8){
            $this->articleCount = 8;
        }

        $this->value[] = $this->articleCount;
        /**
         * 循环文章的个数
         */
        $article = '';
        for ($i=0;$i<$this->articleCount;$i++){
            $article =  $article . $this->artitle[$i]->getMessageXml();//获取文章的xml
        }


        $this->value[] = $article;
        return vsprintf($this->template,$this->value);

    }

}