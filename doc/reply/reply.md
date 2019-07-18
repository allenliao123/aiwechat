### 被动回复用户消息
```
$account = new Account('XXX','XXX');//测试号
//服务端消息处理
$app = WechatService::app($account);
$app->setSignature($signal);//Signature类，接入指引
$app->setInputXml($content);//设置获取的数据
$app->push(function($message){
    /**
     * 逻辑处理
     *$message为解析到的微信推送的消息类，具体查看【消息管理中】的数据
     */
    $text = new ReplyText(); //消息回复具体类别，见下方
    $text->setContent('XXX');
    return $text;
});
$data = $app->run()->send();
```
### 消息回复类
+ 文本消息类
```
$text = new ReplyText(); //消息回复具体类别，见下方
$text->setContent('XXX');
```



