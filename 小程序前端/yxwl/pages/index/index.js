//index.js
//获取应用实例
const app = getApp()
const { $Message } = require('../../dist/base/index');

Page({
  data: {
    bannerImgUrl: [
      'https://www.yxxxm.com/public/uploads/admin/article_default/20191226/ed64f6c0db40b6a2c47f92aaa85c84c6.jpg',
      'https://www.yxxxm.com/public/uploads/admin/article_default/20191226/40e377abfb7bfdf2ac7adde552dde20d.jpg'
    ],
    articleList:[],
    current_page:0,
    last_page:0,
    is_null:false,
    is_more:false
  },
  onLoad: function () {
    var that = this;
    wx.startPullDownRefresh();
    //请求轮播
    wx.request({
      url: app.config.domain+'/port/slide/getSlideList', 
      success(res) {
        var data = res.data.data;
        if(data.length>0){
          var slide = [];
          for (var i = 0;i<data.length;i++){
            slide[i]=data[i].img;
          }
          that.setData({
            bannerImgUrl: slide
          });
        }
      }
    })
  },
  //下拉刷新
  onPullDownRefresh() {
    var that = this;
    wx.showNavigationBarLoading();//导航栏加载动画
    setTimeout(function(){
      that.getArticleList();
      app.handleMsg('刷新成功');
      wx.stopPullDownRefresh();//关闭下拉刷新动画
      wx.hideNavigationBarLoading();//隐藏导航栏加载动画
    },1000)
  },
  getArticleList: function (page = 1) {
    var that = this;
    if(page>1){
      that.setData({
        is_more:true
      });
    }
    //加载提示
    wx.showToast({
      title: '正在加载..稍稍等待',
      icon: 'none',
      duration: 2000//持续的时间
    });
        //请求列表
    wx.request({
      url: app.config.domain + '/article',
      header: {
        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8'
      },
      success :function(res) {
        var code = res.data.code;
        var msg = res.data.msg;
        var list = res.data.data;
        console.log(list);
        if(code==0){
          wx.showToast({
            title: msg,
          });
          that.setData({
            articleList: list,
          });
        } else {
          that.setData({
            articleList: list,
            is_more:false
          });
        }
      }
    })
  },
  onTouch: function (event) {
    var article_id = event.currentTarget.id
    wx.navigateTo({
      url: '../article/article?article_id=' + article_id
    })

  },
  //触底加载
  onReachBottom: function () {
    var that = this;
    app.handleMsg('没有更多了');
    wx.stopPullDownRefresh();//关闭下拉刷新动画
    wx.hideNavigationBarLoading();//隐藏导航栏加载动画
  },
})
