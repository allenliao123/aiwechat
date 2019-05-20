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


