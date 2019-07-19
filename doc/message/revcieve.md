### 接收普通消息
```
$account = new Account('XXX','XXXX');//测试号
//*****************************************************
//服务端消息处理
$app = WechatService::app($account);
$app->setSignature($signal);

$app->setInputXml($content);//设置获取的数据
$app->push(function($message){
    /**
     * 逻辑处理
     *$message为解析到的微信推送的消息类，下面消息类型类型
     */
     //消息通用方法
     //
     $message->getToUserName();//获取开发者微信号
     $message->getFromUserName();//获取发送方帐号（一个OpenID）
     $message->getCreateTime();//获取消息创建时间 （整型）
     message->getMsgType();//获取消息类型
     1.text
     2.voice
     3.vedio
     4.image
     5.shortvideo
     6.link
     7.location
    
});
$data = $app->run()->send();
```
### 接收消息类型
+ 文本消息[MessageText]
```
$msg = $message->getContent();//获取类容

```
