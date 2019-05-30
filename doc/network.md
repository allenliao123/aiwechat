# 微信网络相关接口
- **获取微信服务器IP地址** 
```
  //设置微信账号信息
  $account = new Account('appid','secret');
  $account->setToken($token);
  
  //*****************************************************
  //服务端消息处理
  $app = WechatService::app($account);
  //获取网络IP
  $data = $app->network->getIPs();

```


- **网络检测** 
```
  //设置微信账号信息
  $account = new Account('appid','secret');
  $account->setToken($token);
  
  //*****************************************************
  //服务端消息处理
  $app = WechatService::app($account);
  
  //新建网络监测参数
  $net = new Network();
  //执行的检测动作
  //Network::ACTION_DNS【做域名解析】，Network::ACTION_PING【做ping检测】，Network::ACTION_ALL【dns和ping都做】
  $net->setAction(Network::ACTION_ALL);
  //从某个运营商进行检测
  
  //Network::OPERATOR_CHINANET【电信出口】，Network::OPERATOR_UNICOM【联通出口】，Network::OPERATOR_CAP【腾讯自建出口】，      Network::OPERATOR_DEFAULT【根据ip来选择运营商】
  $net->setCheckOperator(Network::OPERATOR_DEFAULT);
  //获取网络接口
  $data =  $app->network->($net);
  
```
