// pages/article/article.js
const app = getApp();
var WxParse = require('../../lib/wxParse/wxParse.js');
const { $Message } = require('../../dist/base/index');

Page({

  /**
   * 页面的初始数据
   */
  data: {
    article:'',
    actions: [
      {
        name: '去分享',
        icon: 'share',
        openType: 'share'
      }
    ],
    visible: false
  },
  onLoad: function (options) {
    var that = this;
    that.setData({
      article_id: options.article_id,
    });
    var article_id = options.article_id;
    //加载提示
    wx.showToast({
      title: '正在加载..稍稍等待',
      icon: 'none',
      duration: 2000//持续的时间
    });
    //文章发起请求
    wx.request({
      url: app.config.domain + '/article_info/id/' + article_id,
      data:{
        id: options.id
      },
      success(res) {
        wx.showToast({
          title: '为君呈上内容~',
          icon: 'none',
          duration: 2000//持续的时间
        });
        var data = res.data.data;
        // if (data.link == false) {
        //   data.link = '无下载链接';
        // }
        // if (data.password == false) {
        //   data.password = '无解压密码';
        // }
        that.setData({
          article: data
        });
        WxParse.wxParse('content', 'html', data['content'], that, 5);
      }
    })
  },

  // 一键复制事件
  copyBtn: function (e) {
    console.log(this.data.article.link)
    wx.setClipboardData({
      data: '链接是:' + this.data.article.link + '提取码是:' + this.data.article.password,
      success: function (res) {
        wx.getClipboardData({
          success: function (res) {
            wx.showModal({
              title: '提示',
              content: '确定复制链接和密码吗?',
              success: function (res) {
                if (res.confirm) {
                  console.log('确定')
                } else if (res.cancel) {
                  console.log('取消')
                }
              }
            })
          }
        })
      }
    })
  },
  onReachBottom: function () {

  },
  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  },
  handleOpen() {
    this.setData({
      visible: true
    });
  },
  handleCancel() {
    this.setData({
      visible: false
    });
  },
})