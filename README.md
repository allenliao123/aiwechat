# allenliao123/aiwechat
微信公众号开发的接口包，主要是微信底层的接口,公众号开发者只需要实现业务流程

### Installation
`$ composer require allenliao123/aiwechat`<br>

###  Basic usage
```
  //设置微信账号
  $account = new Account('appid_xxx','secret_xxx');
  
  //*****************************************************
  //服务端消息处理
  $app = WechatService::app($account);
  //设置消息处理机制
  $app->push(function($message){
      /**
       * 逻辑处理
       *$message为解析到的微信推送的消息类，具体查看【消息管理中】的数据
       */
      $image = new ReplyImage();
      $image->setMediaId('sssss');
      return $image;

  });
  $response = $app->run()->send();
  //*****************************************************
  
  //获取当前token
  $data = $app->token->achiveToken();
 
  ```
  - 返回数据格式<br>
  $data的数据结构<br>
  code:200//代表成功，其他失败<br>
  body:[]//微信返回的数据<br>
  

### Documentation
- [1、网络相关](https://github.com/allenliao123/aiwechat/blob/master/doc/network.md)<br>
- [2、微信Token值获取](https://github.com/allenliao123/aiwechat/blob/master/doc/token.md)<br>
- [3、微信菜单的设置](https://github.com/allenliao123/aiwechat/blob/master/doc/button.md)<br>
- [4、消息管理](https://github.com/allenliao123/aiwechat/blob/master/doc/button.md)<br>
