### 消息管理
+ 示例代码
```
 //设置微信账号
  $account = new Account('appid_xxx','secret_xxx');
  
  //*****************************************************
  //服务端消息处理
  $app = WechatService::app($account);
  //设置消息处理机制
  $app->push(function($message){
      //逻辑处理
      /**
       *$message为解析到的微信推送的消息类，该$message对应下面的普通消息和事件消息
       */
  });
```

**消息类型**<br>
- [普通消息](#普通消息)
- [事件消息](#事件消息)
- [回复消息](#回复消息)

#### 普通消息
+ 文本消息
```
  $app->push(function($message){
     
      //存在以下方法
      if($message->getMsgType() == MessageConstants::TYPE_TEXT){
        $message->getToUserName();//开发者微信号
        $message->getFromUserName();//发送方帐号（一个OpenID）
        $message->getCreateTime();//消息创建时间 （整型）
        $message->getMsgType();//消息类型,类型种类参考附录,如（MessageConstants::TYPE_TEXT）
        $message->getMsgId();//消息id
        $message->getContent();//消息内容
      }
      
  });
 
```

+ 图片消息
```
  $app->push(function($message){

      //存在以下方法
      if($message->getMsgType() == MessageConstants::TYPE_IMAGE){
        $message->getToUserName();//开发者微信号
        $message->getFromUserName();//发送方帐号（一个OpenID）
        $message->getCreateTime();//消息创建时间 （整型）
        $message->getMsgType();//消息类型,类型种类参考附录,如（MessageConstants::TYPE_TEXT）
        $message->getMsgId();//消息id
        $message->getPicUrl();//图片链接（由系统生成）
        $message->getMediaId();//图片消息媒体id，可以调用获取临时素材接口拉取数据。
      }
     
  });
  
```

+ 语音消息
```
  $app->push(function($message){
   
      //存在以下方法
      if($message->getMsgType() == MessageConstants::TYPE_VOICE){
        $message->getToUserName();//开发者微信号
        $message->getFromUserName();//发送方帐号（一个OpenID）
        $message->getCreateTime();//消息创建时间 （整型）
        $message->getMsgType();//消息类型,类型种类参考附录,如（MessageConstants::TYPE_TEXT）
        $message->getMsgId();//消息id
        $message->getFormat();//语音格式，如amr，speex等
        $message->getMediaId();//图片消息媒体id，可以调用获取临时素材接口拉取数据。
      }
      
  });
  
```

+ 视频消息
```
  $app->push(function($message){
     
      //存在以下方法
      if($message->getMsgType() == MessageConstants::TYPE_VIDEO){
        $message->getToUserName();//开发者微信号
        $message->getFromUserName();//发送方帐号（一个OpenID）
        $message->getCreateTime();//消息创建时间 （整型）
        $message->getMsgType();//消息类型,类型种类参考附录,如（MessageConstants::TYPE_TEXT）
        $message->getMsgId();//消息id
        $message->getThumbMediaId();//视频消息缩略图的媒体id，可以调用多媒体文件下载接口拉取数据。
        $message->getMediaId();//图片消息媒体id，可以调用获取临时素材接口拉取数据。
      }
      
  });
  
```

+ 小视频消息
```
  $app->push(function($message){
     
      //存在以下方法
      if($message->getMsgType() == MessageConstants::TYPE_SHORTVIDEO){
        $message->getToUserName();//开发者微信号
        $message->getFromUserName();//发送方帐号（一个OpenID）
        $message->getCreateTime();//消息创建时间 （整型）
        $message->getMsgType();//消息类型,类型种类参考附录,如（MessageConstants::TYPE_TEXT）
        $message->getMsgId();//消息id
        $message->getThumbMediaId();//视频消息缩略图的媒体id，可以调用多媒体文件下载接口拉取数据。
        $message->getMediaId();//图片消息媒体id，可以调用获取临时素材接口拉取数据。
      }
      
  });
  
```

+ 地理位置消息
```
  $app->push(function($message){
     
      //存在以下方法
      if($message->getMsgType() == MessageConstants::TYPE_LOCATION){
        $message->getToUserName();//开发者微信号
        $message->getFromUserName();//发送方帐号（一个OpenID）
        $message->getCreateTime();//消息创建时间 （整型）
        $message->getMsgType();//消息类型,类型种类参考附录,如（MessageConstants::TYPE_TEXT）
        $message->getMsgId();//消息id
        $message->getLocationX();//地理位置维度
        $message->getLocationY();//地理位置经度
        $message->getScale();//	地图缩放大小
        $message->getLabel();//地理位置信息
      }
      
  });
  
```

+ 链接消息
```
  $app->push(function($message){
     
      //存在以下方法
      if($message->getMsgType() == MessageConstants::TYPE_LINK){
        $message->getToUserName();//开发者微信号
        $message->getFromUserName();//发送方帐号（一个OpenID）
        $message->getCreateTime();//消息创建时间 （整型）
        $message->getMsgType();//消息类型,类型种类参考附录,如（MessageConstants::TYPE_TEXT）
        $message->getMsgId();//消息id
        $message->getTitle();//消息标题
        $message->getDescription();//	消息描述
        $message->getUrl();//	消息链接
        
      }
      
  });
  
```

#### 事件消息
+ 关注取消事件
```
 
```


### 附录
+ 普通消息类型
```
//类MessageConstants 中
const TYPE_TEXT = 'text';//文本消息
const TYPE_IMAGE = 'image';//图片消息
const TYPE_VOICE = 'voice';//语音消息
const TYPE_VIDEO = 'video';//视频消息
const TYPE_SHORTVIDEO = 'shortvideo';//小视频消息
const TYPE_LOCATION = 'location';//地理位置消息
const TYPE_LINK = 'link';//链接消息
const TYPE_EVENT = 'event';//事件消息
```

