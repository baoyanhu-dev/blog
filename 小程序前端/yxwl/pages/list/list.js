// pages/list/list.js
const app = getApp()

Page({

  /**
   * 页面的初始数据
   */
  data: {
    current: 'all',
    cateList:[],
    articleList: [],
    current_page: 0,
    last_page: 0,
    is_null: false,
    is_more: false
  },
  onLoad: function (options) {
    var that = this;
    //分类
    wx.request({
      url: app.config.domain + '/article_cate',
      success(res) {

        var data = res.data.data;
        that.setData({
          cateList: data
        });
      }
    })
    that.getArticleList();
  },


  getArticleList: function (page=1,article_cate_id='') {
    //加载提示
    wx.showToast({
      title: '正在加载..稍稍等待',
      icon: 'none',
      duration: 2000//持续的时间
    });
    var that = this;
    //请求列表
   console.log(article_cate_id);
    wx.request({
      url: app.config.domain + '/getarticlelist',
      data: {
        article_cate_id: article_cate_id,
      },
      success(res) {
        wx.showToast({
          title: '加载成功',
        });
        var data = res.data.data;
          that.setData({
            articleList: data,
          });
       
      },
    
    });
 
  },
  
  //触底加载
  onReachBottom: function () {
    var that = this;
    if (that.data.last_page > that.data.current_page) {
      if (that.data.current === "all") {
        that.getArticleList(that.data.last_page);
      } else {
        that.getArticleList(that.data.last_page, that.data.current);
      }
    } else {
      that.setData({
        is_null: true
      });
    }
  },
  handleChange({ detail }) {
    var that = this;
    that.setData({
      current: detail.key
    });
    if (detail.key==="all"){
      that.getArticleList(1);
    }else{
      that.getArticleList(1, that.data.current);
    }
  },
})