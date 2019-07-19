
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
+ 文本回复
```
$text = new ReplyText(); //消息回复具体类别，见下方
$text->setContent('XXX');
```
+ 图片回复
```
$image = new ReplyImage();
$image->setMediaId('dm8jwwZI-q-yIR9i6mg94dpuNB6-WMZHwVj_SEQYs60');
return $image;
```
+ 音频回复
```
$voice = new ReplyVoice();
$voice->setMediaId('dm8jwwZI-q-yIR9i6mg94ff2l8A4y4iriOgMu7UtTEo');
return $voice;
```

+ 视频回复
```
$vedio = new ReplyVideo();
$vedio->setMediaId('dm8jwwZI-q-yIR9i6mg94cY6F7tE6qCLlKYY4fkqSQ0');
return $vedio;
```
+ 图文消息列表
```
【只能回复一条】
$articleList = new ReplyImageText();
$article = new ReplyArticle();
$article->setTitle('图文');
$article->setDescription('描述');
$article->setPicurl('https://XXXXX');
$article->setUrl('http://www.baidu.com');
$articleList->setArtitle($article);
return $articleList;
```
