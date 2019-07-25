### 模板消息
+ 设置所属行业
```
$account = new Account('xxx','xxxx');
$app = WechatService::app($account);
$ind = new Industry();
$ind->setIndustryId1(1);
$ind->setIndustryId2(2);
//设置行业
$data = $app->template->setIndustry($ind);
```

+ 获取所属行业
```
$data = $app->template->getIndustry();
```

+ 获得模板ID
```
$data = $app->template->getTemplateId("xxxxx");
```

+ 获取模板列表
```
$data = $app->template->getTemplateAll();
```

+ 删除模板
```
$data = $app->template->delTemplate("XXXid");
```

+ 发送模板消息
```
$temp = new TempInformation();
$temp->setTouser('o0biu5hfmsDvQf2TO_XJFwZPJMm8');
$temp->setTemplateId('d05wPuQC4FfUT9_ILTYZGXpkKhwNENAzpAOjBf8mdp4');
$temp->setUrl('http://www.baidu.com');
$temp->setFirst('begin','red');
$temp->setRemark('end','red');
$temp->setValue('end','red');
$data = $app->template->sendTemplate($temp);
```
