### 客服管理
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

+ 客户输入状态下发
```
$kmsg =  new KCustomerStatus();
$kmsg->setTouser("o0biu5hfmsDvQf2TO_XJFwZPJMm8");
$kmsg->setCommand(KCustomerStatus::TYPING);//CANCELTYPING 为取消下发
```


### 客服会话控制
+ 创建会话
```
$k = new SessionKF();
$k->setKfAccount('liao@123');
$k->setOpenid('o0biu5hfmsDvQf2TO_XJFwZPJMm8');
$data = $app->customer->sessionCreate($k);
```
+ 关闭会话
```
$k = new SessionKF();
$k->setKfAccount('liao@123');
$k->setOpenid('o0biu5hfmsDvQf2TO_XJFwZPJMm8');
$data = $app->customer->sessionClose($k);
```

+ 获取客服会话状态
```
$k = new SessionKF();
$k->setOpenid('o0biu5hfmsDvQf2TO_XJFwZPJMm8');
$data = $app->customer->sessionStatus($k);
```

+ 获取客服会话列表
```
$k = new SessionKF();
$k->setOpenid('o0biu5hfmsDvQf2TO_XJFwZPJMm8');
$data = $app->customer->sessionList($k);
```

+ 获取未接入会话列表

```
$data = $app->customer->sessionList();
```

