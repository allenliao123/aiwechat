# allenliao123/aiwechat
微信公众号开发的接口包，主要是微信底层的接口,公众号开发者只需要实现业务流程

### Installation
`$ composer require allenliao123/aiwechat`<br>

###  Basic usage
```
  //设置微信账号
  $account = new Account('appid_xxx','secret_xxx');
  //获取当前token
  $data = TokenFace::achiveToken($account);
```

### Documentation
- [1、微信Token值获取](https://github.com/allenliao123/aiwechat/blob/master/doc/token.md)<br>
- [2、微信菜单的设置](https://github.com/allenliao123/aiwechat/blob/master/doc/button.md)<br>
