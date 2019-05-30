<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 15:08
 */

namespace Wechat\GroupSend\Entity;


class DelMessage
{
    private $msg_id = null;
    private $article_idx = null;

    /**
     * @return null
     */
    public function getMsgId()
    {
        return $this->msg_id;
    }

    /**
     * @param null $msg_id
     */
    public function setMsgId($msg_id): void
    {
        $this->msg_id = $msg_id;
    }

    /**
     * @return null
     */
    public function getArticleIdx()
    {
        return $this->article_idx;
    }

    /**
     * @param null $article_idx
     */
    public function setArticleIdx($article_idx): void
    {
        $this->article_idx = $article_idx;
    }


    /**************************************
     * @param $isjson
     * 描述: 获取数组
     * 日期：2019/5/29
     * 时间：15:09
     * 创建者：36168
     */
    public function getArrayOrJson($isjson){

        $val['msg_id'] = $this->msg_id;
        $val['article_idx'] = $this->article_idx;

        if($isjson){
            return json_encode($val);
        }

        return $val;

    }

}