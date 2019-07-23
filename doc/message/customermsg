### 客服消息
+ 客服文本消息
$account = new Account('wx6366241a8b0df887','aae6f39103127f237cf46fd92ebeca46');
$app = WechatService::app($account);
$ktext = new KText();
$ktext->setTouser('o0biu5hfmsDvQf2TO_XJFwZPJMm8');
$ktext->setContent("测试客服消息");
$data = $app->customer->send($ktext);

+ 客服图片消息
$account = new Account('wx6366241a8b0df887','aae6f39103127f237cf46fd92ebeca46');
$app = WechatService::app($account);
$kimage = new KImage();
$kimage->setTouser("o0biu5hfmsDvQf2TO_XJFwZPJMm8");
$kimage->setMediaId("dm8jwwZI-q-yIR9i6mg94dpuNB6-WMZHwVj_SEQYs60");
$data = $app->customer->send($kimage);
