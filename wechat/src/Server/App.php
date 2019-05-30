<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/22
 * Time: 16:53
 */

namespace Wechat\Server;


use Wechat\Common\Account;
use Wechat\Customer\CustomerFace;
use Wechat\Menu\ButtonFace;
use Wechat\Message\MessageFace;
use Wechat\Message\Reply\ReplyInterface;
use Wechat\Network\NetworkFace;
use Wechat\Token\TokenFace;
use Wechat\User\UserFace;

/**************************
 * 类名： AppWechat
 * @package Wechat\Server
 * 文件描述：微信解析类
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/22
 * 时间: 16:57
 */
class App
{

    private $account = null;//账号
    private $message = null;//消息
    private $reply  = null;//消息回复
    private $msg_closure = null;


    //按钮类
    public $container = [];
    public $faces = [];



    //构造函数
    public function __construct(Account $account)
    {
        //设置账号
        $this->account = $account;

        //初始化
        $this->init();

    }

    /********************************************
     * 描述: 初始化类中
     * 日期：2019/5/22
     * 时间：21:04
     * 创建者：36168
     */
    public function init(){

        //初始化按方法类
        $this->faces['menu'] = ButtonFace::class;//菜单类
        $this->faces['token'] = TokenFace::class;//token值
        $this->faces['network'] = NetworkFace::class;//网络相关
        $this->faces['customer'] = CustomerFace::class;//客服相关
        $this->faces['user'] = UserFace::class;//用户相关

    }


    /*********************************************
     * @param $name
     * @return mixed
     * 描述: 获取属性值，调用的时候，才初始化
     * 日期：2019/5/22
     * 时间：22:02
     * 创建者：36168
     * @throws \Exception
     */
    public function __get($name)
    {
        if(!empty($this->container[$name])){
            return $this->container[$name];
        }else{
            //从
            if(empty($this->faces[$name])){
                throw new \Exception('属性不存在！');
            }else{
                $this->container[$name] = new $this->faces[$name]($this->account);
            }
        }

        return $this->container[$name];
    }


    /*********************************************
     * 描述: 启动服务
     * 日期：2019/5/22
     * 时间：17:02
     * 创建者：36168
     */
    public function run(){

        //TODO
        //需要验证微信服务器验证

        //解析消息数据
        $wechat_xml = file_get_contents("php://input");
        $this->message = MessageFace::parseXMl($wechat_xml);



        //解析xml获得用户的数据
        return $this;


    }


    /**************************************
     * @param \Closure $closure
     * 描述: 放入消息回复类
     * 日期：2019/5/22
     * 时间：17:28
     * 创建者：36168
     */
    public function push(\Closure $closure){
        $this->msg_closure =$closure;
    }


    /**
     * @return null
     */
    public function getMessage()
    {
        return $this->message;
    }


    /*****************************************
     * 日期：2019/5/22
     * 描述: 返送消息
     * 时间：17:28
     * 创建者：36168
     */
    public function send(){

        //如果push了一个消息类
        if($this->msg_closure instanceof  \Closure){
            $this->reply =  call_user_func($this->msg_closure,$this->getMessage());
        }

        //添加回复
        if(empty($this->reply)){
            $res = '';
        }else{
            $reply = $this->reply;
            if($reply instanceof ReplyInterface){
                $reply->setToUserName($this->message->getFromUserName());
                $reply->setFromUserName($this->message->getToUserName());
                $reply->setCreateTime($reply->getCreateTime()?$reply->getCreateTime():time());
                $res =  $reply->getMessageXml();
            }else{
                $res = '';
            }
        }
        return $res;
    }

}