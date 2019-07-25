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
     $message->getMsgType();//获取消息类型
     $message->getMsgId();//获取消息ID
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

+ 图片消息[MessageImage]
```
$url = $message->getPicUrl();//获取图片连接
$media_id = $message->getMediaId();//消息id，64位整型
```

+ 语音消息[MessageVoice]
```
$format = $message->getFormat();//获取语音格式，如amr，speex等
$media_id = $message->getMediaId();//消息id，64位整型
```

+ 视频消息[MessageVideo]
```
$format = $message->getThumbMediaId();//视频消息缩略图的媒体id，可以调用多媒体文件下载接口拉取数据。
$media_id = $message->getMediaId();//消息id，64位整型
```

+ 小视频消息[MessageShortVideo]
```
$format = $message->getThumbMediaId();//视频消息缩略图的媒体id，可以调用多媒体文件下载接口拉取数据。
$media_id = $message->getMediaId();//消息id，64位整型
```

+ 地理位置消息[MessageShortVideo]
```
$x = $message->getLocationX();//地理位置维度
$y = $message->getLocationY();//	地理位置经度
$scale = $message->getScale();//地图缩放大小
$label = $message->getLabel();//	地理位置信息
```

+ 链接消息[MessageLink]
```
$x = $message->getTitle();//消息标题
$y = $message->getDescription();//	消息描述
$scale = $message->getUrl();//消息链接
```

### 接收到的事件消息
```
 //通用方法
 $message->getToUserName();//获取开发者微信号
 $message->getFromUserName();//获取发送方帐号（一个OpenID）
 $message->getCreateTime();//获取消息创建时间 （整型）
 $message->getMsgType();//获取消息类型
```

+ 关注/取消关注事件[EventSubscribe]
```
   $message->getEvent()//获取事件
```
    

