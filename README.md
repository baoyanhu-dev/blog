 **前言** <br />
首先没全部开发结束大体功能是全部可以了。<br />
需要的朋友可拿去二开基本很快就可以解决。<br />
小程序也是我第一个开发的版本<br />
很适合初学者学习小程序是如何交互如何回调的<br />


 **程序如何使用?** 

1.下载源码后导入安装目录<br />
域名指向更目录即可(主机也可以用)<br />
2.导入完整数据库.sql到数据库中<br />
3.修改application/database.php文件:<br />

```

  // 服务器地址
    'hostname'       => '你的ip',
    // 数据库名
    'database'       => '数据库名',
    // 用户名
    'username'       => '数据库用户名',
    // 密码
    'password'       => '数据库密码',
```




 **微信小程序怎么使用?** <br />
配置https:<br />
修改app.js中<br />

```
App({
  config: {
    domain:"https://www.yxxxm.com"//api公共地址
  },
  onLaunch: function () {

```






