<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/25
 * Time: 15:54
 */

namespace Wechat\Customer;

use Wechat\Customer\Entity\CustomerAccount;
use Wechat\Customer\Entity\KChatRecord;
use Wechat\Customer\Entity\KCustomerStatus;
use Wechat\Customer\Entity\KText;
use Wechat\Customer\Session\SessionKF;
use Wechat\Traits\Face;
use Wechat\Utils\HttpClient;

/***************************
 * 类名： CustomerFace
 * @package Wechat\Customer
 * 文件描述：客服处理类
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/25
 * 时间: 15:54
 */
class CustomerFace
{
    use Face;

    //添加客服
    public function  add(CustomerAccount $customerAccount){
        //获取URL值
        $url = vsprintf(UrlCustomer::CUSTOMER_ACCOUNT_ADD,[$this->account->getToken()]);
        $data = HttpClient::Post($url,$customerAccount->getArrayOrJson(true));
        return $data;
    }


    //邀请
    public function invite(CustomerAccount $customerAccount){

        //获取URL值
        $url = vsprintf(UrlCustomer::CUSTOMER_ACCOUNT_INVITE,[$this->account->getToken()]);
        $data = HttpClient::Post($url,$customerAccount->getInvite(true));
        return $data;

    }


    //修改客服
    public function  update(CustomerAccount $customerAccount){
        //获取URL值
        $url = vsprintf(UrlCustomer::CUSTOMER_ACCOUNT_UPDATE,[$this->account->getToken()]);
        $data = HttpClient::Post($url,$customerAccount->getArrayOrJson(true));
        return $data;
    }


    //删除客服
    public function  del(CustomerAccount $customerAccount){
        //获取URL值
        $url = vsprintf(UrlCustomer::CUSTOMER_ACCOUNT_DEL,[$this->account->getToken(),$customerAccount->getKfAccount()]);
        $data = HttpClient::Get($url);
        return $data;
    }


    //更新客服头像

    /*****************************************
     * @param CustomerAccount $customerAccount
     * @param $file,文件路径，或者$_FILES
     * @return array
     * @throws \Exception
     * 描述:
     * 日期：2019/5/25
     * 时间：16:26
     * 创建者：36168
     */
    public function  updateImg(CustomerAccount $customerAccount,$file){

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
        $url = vsprintf(UrlCustomer::CUSTOMER_ACCOUNT_UPDATEIMG,[$this->account->getToken(),$customerAccount->getKfAccount()]);
        $data = HttpClient::Upload($url,$file,'media');
        return $data;
    }


    //获取所有客服消息
    public function all(){

        $url = vsprintf(UrlCustomer::CUSTOMER_ACCOUNT_ALL,[$this->account->getToken()]);
        $data = HttpClient::Get($url);
        return $data;

    }


    //获取在线客服
    public function  getOnline(){
        $url = vsprintf(UrlCustomer::CUSTOMER_ONLINE,[$this->account->getToken()]);
        $data = HttpClient::Get($url);
        return $data;
    }


    //发送消息
    public function send(KText $text){

        $url = vsprintf(UrlCustomer::CUSTOMER_SEND,[$this->account->getToken()]);
        $data = HttpClient::Post($url,$text->getArrayOrJson(true));
        return $data;

    }


    //客服消息状态下发
    public function cStatus(KCustomerStatus $status){

        $url = vsprintf(UrlCustomer::CUSTOMER_STATUS,[$this->account->getToken()]);
        $data = HttpClient::Post($url,$status->getArrayOrJson(true));
        return $data;

    }


    //客服会话信息
    //客服会话创建
    public function sessionCreate(SessionKF $kf){

        $url = vsprintf(UrlCustomer::CUSTOMER_SESSION_CREATE,[$this->account->getToken()]);
        $data = HttpClient::Post($url,$kf->getArrayOrJson(true));
        return $data;

    }

    //客服会话关闭
    public function sessionClose(SessionKF $kf){

        $url = vsprintf(UrlCustomer::CUSTOMER_SESSION_CLOSE,[$this->account->getToken()]);
        $data = HttpClient::Post($url,$kf->getArrayOrJson(true));
        return $data;

    }


    //获取客户会话状态
    public function sessionStatus(SessionKF $kf){

        $url = vsprintf(UrlCustomer::CUSTOMER_SESSION_STATUS,[$this->account->getToken(),$kf->getOpenid()]);
        $data = HttpClient::Get($url);
        return $data;

    }


    //获取客服会话列表
    public function sessionList(SessionKF $kf){

        $url = vsprintf(UrlCustomer::CUSTOMER_SESSION_LIST,[$this->account->getToken(),$kf->getKfAccount()]);
        $data = HttpClient::Get($url);
        return $data;

    }


    //获取未接入会话列表
    public function sessionListNoIn(){
        $url = vsprintf(UrlCustomer::CUSTOMER_SESSION_LIST_NO_IN,[$this->account->getToken()]);
        $data = HttpClient::Get($url);
        return $data;

    }


    //获取聊天记录
    public function chatRecord(KChatRecord $ck){
        $url = vsprintf(UrlCustomer::CUSTOMER_CHAT_RECORD,[$this->account->getToken()]);
        $data = HttpClient::Post($url,$ck->getArrayOrJson(true));
        return $data;

    }


}