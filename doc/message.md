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
$app->push(function($message){
     
      //存在以下方法,EventConstants::EVENT_SUBSCRIBE为关注事件，EventConstants::EVENT_UNSUBSCRIBE取消关注事件
      if($message->getMsgType() == MessageConstants::TYPE_EVENT && $message->getEvent() == EventConstants::EVENT_SUBSCRIBE){
        $message->getToUserName();//开发者微信号
        $message->getFromUserName();//发送方帐号（一个OpenID）
        $message->getCreateTime();//消息创建时间 （整型）
        $message->getMsgType();//消息类型,类型种类参考附录,如（MessageConstants::TYPE_TEXT）
        $message->getEvent();//消息事件类型
        
      }
      
  });
 
```

+ 扫描带参数二维码事件
```
$app->push(function($message){
     
       //1. 用户未关注时，进行关注后的事件推送,关注后微信会将带场景值关注事件推送给开发者。
      if($message->getMsgType() == MessageConstants::TYPE_EVENT && $message->getEvent() == EventConstants::EVENT_SUBSCRIBE){
        $message->getToUserName();//开发者微信号
        $message->getFromUserName();//发送方帐号（一个OpenID）
        $message->getCreateTime();//消息创建时间 （整型）
        $message->getMsgType();//消息类型,类型种类参考附录,如（MessageConstants::TYPE_TEXT）
        $message->getEvent();//消息事件类型
        $message->getEventKey();//事件KEY值，qrscene_为前缀，后面为二维码的参数值
        $message->geTicket();//二维码的ticket，可用来换取二维码图片
        
      }
      
      //2. 用户已关注时的事件推送
      if($message->getMsgType() == MessageConstants::TYPE_EVENT && $message->getEvent() == EventConstants::EVENT_SCAN){
        $message->getToUserName();//开发者微信号
        $message->getFromUserName();//发送方帐号（一个OpenID）
        $message->getCreateTime();//消息创建时间 （整型）
        $message->getMsgType();//消息类型,类型种类参考附录,如（MessageConstants::TYPE_TEXT）
        $message->getEvent();//消息事件类型
        $message->getEventKey();//事件KEY值，qrscene_为前缀，后面为二维码的参数值
        $message->geTicket();//二维码的ticket，可用来换取二维码图片
        
      }
      
  });
 
```

+ 上报地理位置事件
```
$app->push(function($message){
     
       //1. 用户未关注时，进行关注后的事件推送,关注后微信会将带场景值关注事件推送给开发者。
      if($message->getMsgType() == MessageConstants::TYPE_EVENT && $message->getEvent() == EventConstants::EVENT_LOCATION){
        $message->getToUserName();//开发者微信号
        $message->getFromUserName();//发送方帐号（一个OpenID）
        $message->getCreateTime();//消息创建时间 （整型）
        $message->getMsgType();//消息类型,类型种类参考附录,如（MessageConstants::TYPE_TEXT）
        $message->getEvent();//消息事件类型
        $message->getLatitude();//地理位置纬度
        $message->getLongitude();//地理位置经度
        $message->getPrecision();//地理位置精度
        
      }
      
  });
 
```

+ 自定义菜单事件
```
$app->push(function($message){
     
       //1. 用户未关注时，进行关注后的事件推送,关注后微信会将带场景值关注事件推送给开发者。
      if($message->getMsgType() == MessageConstants::TYPE_EVENT && $message->getEvent() == EventConstants::EVENT_CLICK){
        $message->getToUserName();//开发者微信号
        $message->getFromUserName();//发送方帐号（一个OpenID）
        $message->getCreateTime();//消息创建时间 （整型）
        $message->getMsgType();//消息类型,类型种类参考附录,如（MessageConstants::TYPE_TEXT）
        $message->getEvent();//事件KEY值，与自定义菜单接口中KEY值对应
        
      }
      
  });
 
```

+ 点击菜单跳转链接时的事件推送
```
$app->push(function($message){
     
       //1. 用户未关注时，进行关注后的事件推送,关注后微信会将带场景值关注事件推送给开发者。
      if($message->getMsgType() == MessageConstants::TYPE_EVENT && $message->getEvent() == EventConstants::EVENT_CLICK){
        $message->getToUserName();//开发者微信号
        $message->getFromUserName();//发送方帐号（一个OpenID）
        $message->getCreateTime();//消息创建时间 （整型）
        $message->getMsgType();//消息类型,类型种类参考附录,如（MessageConstants::TYPE_TEXT）
        $message->getEvent();//事件KEY值，设置的跳转URL
        
      }
      
  });
 
```

### 回复消息



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

+ 事件消息类型
```
//类EventConstants 中
const  EVENT_SUBSCRIBE = 'subscribe';//(订阅)
const  EVENT_UNSUBSCRIBE = 'unsubscribe';//取消订阅
const  EVENT_SCAN = 'SCAN';//扫描类型
const  EVENT_LOCATION = 'LOCATION';//上报地理位置事件
const  EVENT_CLICK = 'CLICK';//自定义菜单事件
const  EVENT_VIEW = 'VIEW';//菜单跳转链接时的事件
const TY


