//app.js
App({
  config: {
    domain:"https://www.yxxxm.com"//api公共地址
  },
  onLaunch: function () {
    
  },
  //全局提醒
  handleMsg(msg ="这是一条提醒", type="") {
    var { $Message } = require('dist/base/index');
    $Message({
      content: msg,
      type:type
    });
  }
})