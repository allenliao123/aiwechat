# 微信菜单设置
微信的菜单设置的相关方法和代码<br>
>设置普通菜单按钮<br>
```
  //设置微信账号信息
 $account = new Account('app_id_xxx','secret_xxx');
 $account->setToken($token); 
 //新建一级菜单按钮
 $button = new Button();
 //设置按钮的类型
 $button->setType(Button::CLICK);
 $button->setName('一级菜单');
 $button->setKey('9428394jsklfj');//设置key值，微信端会推送给微信接管服务器
 
  //新建二级菜单
  $button2 = new Button();
  $button2->setType(Button::CLICK);
  $button2->setName('二级菜单1');
  $button2->setKey('9428394jsklfj1');
  
  //二级菜单设置到一级菜单中的子菜单中
  $button->setSubButton($button2);
  
 //新建二级菜单
  $button3 = new Button();
  $button3->setType(Button::CLICK);
  $button3->setName('二级菜单2');
  $button3->setKey('9428394jsklfj2');
  
  //二级菜单设置到一级菜单中的子菜单中
  $button->setSubButton($button3);
  
  //新建菜单树
  $btntree = new ButtonTree();
  //把一级菜单放入菜单树中
  $btntree->setButton($button);
  //如果有多个一级菜单，则可以继续设置
  //如$btntree->setButton($button2);，$btntree->setButton($button3);一级菜单不超过3个
  
  //获取菜单树的Json,
  $menu = $btntree->getArrayOfButton(true);//如果是获取数组，则传入false参数
  
  //推送到微信服务器
  $data = ButtonFace::setMenu($account); 
  
```
>类型种类参考[附录](#附录一)<br>


### 附录一

```
  const CLICK = 'click';
  //点击推事件用户点击click类型按钮后，微信服务器会通过消息接口推送消息类型为event的结构给开发者（参考消息接口指南），并且带上按钮中开发者填写的key值，开发者可以通过自定义的key值与用户进行交互；
  const VIEW = 'view';
  //跳转URL用户点击view类型按钮后，微信客户端将会打开开发者在按钮中填写的网页URL，可与网页授权获取用户基本信息接口结合，获得用户基本信息。
  const SCANCODE_PUSH = 'scancode_push';
  //扫码推事件用户点击按钮后，微信客户端将调起扫一扫工具，完成扫码操作后显示扫描结果（如果是URL，将进入URL），且会将扫码的结果传给开发者，开发者可以下发消息。
  const SCANCODE_WAITMSG = 'scancode_waitmsg';
  //扫码推事件且弹出“消息接收中”提示框用户点击按钮后，微信客户端将调起扫一扫工具，完成扫码操作后，将扫码的结果传给开发者，同时收起扫一扫工具，然后弹出“消息接收中”提示框，随后可能会收到开发者下发的消息。
  const PIC_SYSPHOTO = 'pic_sysphoto';
  //弹出系统拍照发图用户点击按钮后，微信客户端将调起系统相机，完成拍照操作后，会将拍摄的相片发送给开发者，并推送事件给开发者，同时收起系统相机，随后可能会收到开发者下发的消息。
  const PIC_PHOTO_OR_ABLUM = 'pic_photo_or_album';
  //弹出拍照或者相册发图用户点击按钮后，微信客户端将弹出选择器供用户选择“拍照”或者“从手机相册选择”。用户选择后即走其他两种流程。
  const PIC_WEIXIN = 'pic_weixin';
  //弹出微信相册发图器用户点击按钮后，微信客户端将调起微信相册，完成选择操作后，将选择的相片发送给开发者的服务器，并推送事件给开发者，同时收起相册，随后可能会收到开发者下发的消息。
  const LOCATION_SELECT = 'location_select';
  //弹出地理位置选择器用户点击按钮后，微信客户端将调起地理位置选择工具，完成选择操作后，将选择的地理位置发送给开发者的服务器，同时收起位置选择工具，随后可能会收到开发者下发的消息。
  const MEDIA_ID = 'media_id';
  //下发消息（除文本消息）用户点击media_id类型按钮后，微信服务器会将开发者填写的永久素材id对应的素材下发给用户，永久素材类型可以是图片、音频、视频、图文消息。请注意：永久素材id必须是在“素材管理/新增永久素材”接口上传后获得的合法id。
  const VIEW_LIMITED = 'view_limited';
  //跳转图文消息URL用户点击view_limited类型按钮后，微信客户端将打开开发者在按钮中填写的永久素材id对应的图文消息URL，永久素材类型只支持图文消息。请注意：永久素材id必须是在“素材管理/新增永久素材”接口上传后获得的合法id。
  const MINIPROGRAM = 'miniprogram';
  //设置小程序类型按钮
```


