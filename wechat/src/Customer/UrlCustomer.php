<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/25
 * Time: 15:46
 */

namespace Wechat\Customer;

use Wechat\Utils\Constants;

/**************************
 * 类名： UrlCustomer
 * @package Wechat\Customer
 * 文件描述：客服消息类
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/25
 * 时间: 15:46
 */
class UrlCustomer
{
    //添加客服
    const CUSTOMER_ACCOUNT_ADD = "https://".Constants::HTTP_API."/customservice/kfaccount/add?access_token=%s";

    //邀请绑定客服
    const CUSTOMER_ACCOUNT_INVITE = "https://".Constants::HTTP_API."/customservice/kfaccount/inviteworker?access_token=%s";

    //修改客服
    const CUSTOMER_ACCOUNT_UPDATE = "https://".Constants::HTTP_API."/customservice/kfaccount/update?access_token=%s";

    //删除客服
    const CUSTOMER_ACCOUNT_DEL = "https://".Constants::HTTP_API."/customservice/kfaccount/del?access_token=%s&kf_account=%s";

    //修改客服头像
    const CUSTOMER_ACCOUNT_UPDATEIMG = "https://".Constants::HTTP_API."/customservice/kfaccount/uploadheadimg?access_token=%s&kf_account=%s";

    //修改客服头像
    const CUSTOMER_ACCOUNT_ALL = "https://".Constants::HTTP_API."/cgi-bin/customservice/getkflist?access_token=%s";

    //发送消息
    const CUSTOMER_SEND = "https://".Constants::HTTP_API."/cgi-bin/message/custom/send?access_token=%s";

    //获取在线客服
    const CUSTOMER_ONLINE = "https://".Constants::HTTP_API."/cgi-bin/customservice/getonlinekflist?access_token=%s";

    //客户状态下发
    const CUSTOMER_STATUS = "https://".Constants::HTTP_API."/cgi-bin/message/custom/typing?access_token=%s";



    //会话

    //创建会话
    const CUSTOMER_SESSION_CREATE = "https://".Constants::HTTP_API."/customservice/kfsession/create?access_token=%s";

    //关闭会话
    const CUSTOMER_SESSION_CLOSE = "https://".Constants::HTTP_API."/customservice/kfsession/close?access_token=%s";

    //获取客户会话状态
    const CUSTOMER_SESSION_STATUS = "https://".Constants::HTTP_API."/customservice/kfsession/getsession?access_token=%s&openid=%s";

    //获取客服会话列表
    const CUSTOMER_SESSION_LIST = "https://".Constants::HTTP_API."/customservice/kfsession/getsessionlist?access_token=%s&kf_account=%s";

    //获取未接入会话列表
    const CUSTOMER_SESSION_LIST_NO_IN = "https://".Constants::HTTP_API."/customservice/kfsession/getwaitcase?access_token=%s";

    //获取聊天记录
    const CUSTOMER_CHAT_RECORD = "https://".Constants::HTTP_API."//customservice/msgrecord/ getmsglist ?access_token=%s";

}