### 客服消息
+ 获取客服列表
```
$account = new Account('xxx','xxxx');
$app = WechatService::app($account);
$data = $app->customer->all();
```

+ 获取在线客服
```
$account = new Account('xxx','xxxx');
$app = WechatService::app($account);
$data = $app->customer->getOnline();
```

+ 添加客服帐号
```
$account = new Account('xxx','xxxx');
$app = WechatService::app($account);
$c = new CustomerAccount();
$c->setKfAccount('3616@3616');
$c->setNickname('nickname1');
$data = $app->customer->add($c);
```

+ 邀请客服帐号
```
$account = new Account('xxx','xxxx');
$app = WechatService::app($account);
$c = new CustomerAccount();
$c->setKfAccount('客服');
$c->setInviteWx('liaoliqin3');
$data = $app->customer->invite($c);
```

+ 设置客服信息
```
$account = new Account('xxx','xxxx');
$app = WechatService::app($account);
$c = new CustomerAccount();
$c->setKfAccount('客服');
$c->setNickname('nickname1');
$data = $app->customer->update($c);
```

+ 上传客服头像
```
待定
```

+ 删除客服
```
$account = new Account('xxx','xxxx');
$app = WechatService::app($account);
$c = new CustomerAccount();
$c->setKfAccount('客服');
$data = $app->customer->del($c);
```


