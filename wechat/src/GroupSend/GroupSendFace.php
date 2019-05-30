<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/29
 * Time: 9:38
 */

namespace Wechat\GroupSend;


use phpDocumentor\Reflection\Types\Integer;
use Wechat\GroupSend\Entity\ArticleList;
use Wechat\GroupSend\Entity\DelMessage;
use Wechat\GroupSend\Entity\GmessageInterface;
use Wechat\GroupSend\Entity\Video;
use Wechat\Traits\Face;
use Wechat\Utils\HttpClient;

class GroupSendFace
{

    use Face;

    /****************************
     * @return mixed
     * @throws \Exception
     * 描述: 上传图文消息内的图片获取URL
     * 日期：2019/5/29
     * 时间：9:39
     * 创建者：36168
     */
    public function uploadimg($file){



        if(is_array($file)){
            $MB = 1024 * 1024;
            $image = array_values($file);
            $byte= $image[0]['size'];
            $size  = round($byte / $MB, 2);
            if($size>5){
                throw new \Exception('图片大小超过了5M');
            }
        }

        //获取URL值
        $url = vsprintf(UrlGroupSend::GROUP_SEND_UPLOADIMG,[$this->account->getToken()]);
        $data = HttpClient::Upload($url,$file,'media');
        return $data;

    }


    /****************************
     * @return mixed
     * @throws \Exception
     * 描述: 请求视频到下述接口特别地
     * 日期：2019/5/29
     * 时间：9:39
     * 创建者：36168
     */
    public function uploadVideo(Video $video){

        //获取URL值
        $url = vsprintf(UrlGroupSend::GROUP_SEND_UPLOADVIDEO,[$this->account->getToken()]);
        $data = HttpClient::Post($url,$video->getArrayOrJson(true));
        return $data;

    }



    /****************************
     * @return mixed
     * @throws \Exception
     * 描述: 上传图文消息素材【订阅号与服务号认证后均可用】
     * 日期：2019/5/29
     * 时间：9:39
     * 创建者：36168
     */
    public function uploadnews(ArticleList $list){

        $url = vsprintf(UrlGroupSend::GROUP_SEND_UPLOADNES,[$this->account->getToken()]);
        $data = HttpClient::Post($url,$list->getArrayOrJson(true));
        return $data;

    }


    /****************************
     * @param GmessageInterface $msg
     * @return mixed
     * 描述: 根据标签进行群发
     * 日期：2019/5/29
     * 时间：15:06
     * 创建者：36168
     */
    public function sendMsgByTag(GmessageInterface $msg){

        //获取URL值
        $url = vsprintf(UrlGroupSend::GROUP_SEND_TAG,[$this->account->getToken()]);
        $data = HttpClient::Post($url,$msg->getArrayOrJson(true));
        return $data;

    }


    /****************************
     * @param GmessageInterface $msg
     * @return mixed
     * 描述: 根据标签进行群发
     * 日期：2019/5/29
     * 时间：15:06
     * 创建者：36168
     */
    public function sendMsgByOpenid(GmessageInterface $msg){

        //获取URL值
        $url = vsprintf(UrlGroupSend::GROUP_SEND_OPENID,[$this->account->getToken()]);
        $data = HttpClient::Post($url,$msg->getArrayOrJson(true));
        return $data;

    }


    /****************************
     * @param GmessageInterface $msg
     * @return mixed
     * 描述: 删除群发
     * 日期：2019/5/29
     * 时间：15:06
     * 创建者：36168
     */
    public function DelGroupSend(DelMessage $del){

        //获取URL值
        $url = vsprintf(UrlGroupSend::GROUP_SEND_DEL,[$this->account->getToken()]);
        $data = HttpClient::Post($url,$del->getArrayOrJson(true));
        return $data;
    }


    /****************************
     * @param GmessageInterface $msg
     * @return mixed
     * 描述: 预览信息
     * 日期：2019/5/29
     * 时间：15:16
     * 创建者：36168
     */
    public function sendMsgPreview(GmessageInterface $msg){

        //获取URL值
        $url = vsprintf(UrlGroupSend::GROUP_SEND_PREVIEW,[$this->account->getToken()]);
        $data = HttpClient::Post($url,$msg->getArrayOrJson(true));
        return $data;

    }


    /****************************
     * @param string $msgid
     * @return mixed
     * 描述: 群发消息状态
     * 日期：2019/5/29
     * 时间：15:16
     * 创建者：36168
     */
    public function sendMsgStatus($msgid){

        //获取URL值
        $url = vsprintf(UrlGroupSend::GROUP_SEND_STATUS,[$this->account->getToken()]);
        $data = HttpClient::Post($url,json_encode(['msg_id'=>$msgid]));
        return $data;

    }


    /****************************
     * @param string $msgid
     * @return mixed
     * 描述: 群发消息状态
     * 日期：2019/5/29
     * 时间：15:16
     * 创建者：36168
     */
    public function sendMsgSpeed(){

        //获取URL值
        $url = vsprintf(UrlGroupSend::GROUP_SEND_SPEED_GET,[$this->account->getToken()]);
        $data = HttpClient::Get($url);
        return $data;

    }


    /****************************
     * @param string $msgid
     * @return mixed
     * 描述: 群发消息状态
     * 日期：2019/5/29
     * 时间：15:16
     * 创建者：36168
     */
    public function sendMsgSpeedSet(int $speed){

        //获取URL值
        $url = vsprintf(UrlGroupSend::GROUP_SEND_SPEED_SET,[$this->account->getToken()]);
        $data = HttpClient::Post($url,json_encode(['speed'=>$speed]));
        return $data;

    }

}