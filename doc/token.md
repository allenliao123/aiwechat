# 微信Token值获取<br>
+ token 目前为自动更新，存储的方式redis缓存，请确保服务器上安装了redis
```
 //设置账号
 $account = new Account('appid','secret');
 //获取token值
 $app = WechatService::app($account);
 $app->getToken();
```
