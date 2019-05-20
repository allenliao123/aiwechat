# allenliao123/aiwechat
微信公众号开发的接口包，主要是方便微信开发者免去微信底层的接口调用的开发

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
- [1、微信Token值获取](https://github.com/)<br>
- [2、微信菜单的设置](https://github.com/)<br>
