<?php
// +----------------------------------------------------------------------
// | tpCitrix [ WE ONLY DO WHAT IS NECESSARY ]
// +----------------------------------------------------------------------
// | Copyright (c) 2019 http://tpCitrix.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: tpCitrix < 2722279500@qq.com >
// +----------------------------------------------------------------------

//首页

namespace app\index\controller;

use \think\Db;
use \think\Cookie;
use \think\Session;
use \think\Controller;
use app\index\model\Index as M;
use app\admin\model\LinkUrl as lU;

class Index extends controller {
    /**
     * [__construct description]
     * @return [type] [description]
     */
    public function __construct() {
        parent::__construct();
        $address=Db::name('fenzhan')->order('sort')->select();//获取城市分站
        $this->webConfig = Db::name('config')->field("type")->group('type')->select();
        $model = Db::name('config');
        foreach ($this->webConfig as $k1 => $v1) {
            $list = [];
            $arr = $model->field('id,value,name')->where(['type' => $v1['type']])->select();
            foreach ($arr as $key => $value) {
                $list[$arr[$key]['name']] = array(
                    "value" => $arr[$key]['value'],
                    "id" => $arr[$key]['id']
                );
            }
            $this->webConfig[$v1['type']] = $list;
            unset($this->webConfig[$k1]);
        }

        $lU = new lU();
        $getDataList1 = $lU->getDataList(1);
        $getDataList2 = $lU->getDataList(2);
        $getDataList3 = $lU->getDataList(3);
        $getDataList4 = $lU->getDataList(4);
        $lUList = array_merge($getDataList1, $getDataList2, $getDataList3, $getDataList4);
        $this->navList = Db::name("nav_show")->field("id,title,content")->order('sort')->select();
        $this->assign('webConfig', $this->webConfig);//系统配置
        $this->assign('lUList', $lUList);//友情链接
        $this->assign('keywords', htmlentities(input('keywords/s', '')));
        $this->assign('id', htmlentities(input('id/d', 0)));
        $this->assign('navList', $this->navList);//导航列表
        $this->assign('address', $address);

    }

    //首页
    public function index() {
        $m = new M();
        $dataCasesList = $m->dataCasesList();//获取案例列表
        $dataNewsList = $m->dataNewsList();//获取新闻列表

        $this->assign('dataCasesList', $dataCasesList);
        $this->assign('dataNewsList', $dataNewsList);
        $this->assign('citrixOn', 52);
        return $this->fetch();
    }

    /**
     * [casesList 客户案例]
     * @return [type] [description]
     */
    public function casesList() {
        $m = new M();
        $data_cate_id = input('id/d', 0);
        $dataList = $m->dataCateList($data_cate_id, 0, 16, 'id,title,img,code_img', 2);
        $dataCount = $m->dataCount($data_cate_id, 2);
        $dataCasesList = $m->dataCasesList();//获取案例列表
        $this->assign('dataCasesList', $dataCasesList);
        $this->assign('casesList', $dataList);
        $this->assign('casesCount', $dataCount);
        $this->assign('citrixOn', 53);
        return $this->fetch();
    }

    /**
     * [ajaxCasesList 客户案例]
     * @return [type] [description]
     */
    public function ajaxCasesList() {
        $m = new M();
        $data_cate_id = input('id/d', 0);
        $curr = input('curr/d', 0);
        $dataList = $m->dataCateList($data_cate_id, $curr, 16, 'id,title,img,code_img', 2);
        $this->assign('casesList', $dataList);
        return $this->fetch();
    }

    /**
     * [newsList 新闻资讯列表]
     * @return [type] [description]
     */
    public function newsList() {
        //查询新闻分类
        $where='';
        $where['type']='1';
        $data=Db::name('data_cate')->where($where)->select();
        $this->assign('data',$data);
        $m = new M();
        $data_cate_id = input('id/d', 0);
        $dataList = $m->dataCateList($data_cate_id, 0, 16, 'id,title,img,description,click_sum,create_time', 1);
        $dataCount = $m->dataCount($data_cate_id, 1);
        $dataNewsList = $m->dataNewsList();//获取新闻资讯列表
        $this->assign('dataNewsList', $dataNewsList);
        $this->assign('newsList', $dataList);
        $this->assign('newsCount', $dataCount);
        $this->assign('citrixOn', 55);
        return $this->fetch();
    }

    /**
     * [ajaxNewsList 新闻资讯列表]
     * @return [type] [description]
     */
    public function ajaxNewsList() {
        $m = new M();
        $data_cate_id = input('id/d', 0);
        $curr = input('curr/d', 0);
        $dataList = $m->dataCateList($data_cate_id, $curr, 16, 'id,title,img,description,click_sum,create_time', 1);
        $this->assign('newsList', $dataList);
        return $this->fetch();
    }


    /**
     * [ajaxNewsList 分类详细页]
     * @return [type] [description]
     */
    public function ajaxDataList() {
        $m = new M();
        $data_cate_id = input('id/d', 0);
        $curr = input('curr/d', 0);
        $dataList = $m->dataCateList($data_cate_id, $curr, 16, 'id,title,img,description,click_sum,create_time', 1);
        $this->assign('newsList', $dataList);
        return $this->fetch();
    }

    /**
     * [ajaxDataList 新闻分类]
     * @return [type] [description]
     */
    public function DataList() {
        //查询新闻分类
        $where='';
        $where['type']='1';
        $data=Db::name('data_cate')->where($where)->select();
        $this->assign('data',$data);
        $m = new M();
        $data_cate_id = input('id/d', 0);
        $curr = input('curr/d', 0);
        $dataList = $m->dataCateList($data_cate_id, $curr, 16, 'id,title,img,description,click_sum,create_time', 1);
        $dataCount = $m->dataCount($data_cate_id, 1);
        $this->assign('newsCount', $dataCount);
        $this->assign('newsData', $dataList);
        return $this->fetch();
    }

    /**
     * [Info 数据详情]
     */
    public function Info() {
        $m = new M();
        $info = $m->Info();
        $this->assign('info', $info);
        $this->webConfig['seo']['title']['value'] = $info['title'] . '_' . $this->webConfig['seo']['title']['value'];
        $this->assign('webConfig', $this->webConfig);
        return $this->fetch();
    }

    /**
     * [pageInfo 单页面]
     * @return [type] [description]
     */
    public function pageInfo() {
        $m = new M();
        $pageInfo = $m->pageInfo();
        $this->assign('pageInfo', $pageInfo);
        $this->assign('citrixOn', input("id/d", 0));
        return $this->fetch();
    }

    /**
     * [publish 留言表单]
     * @return [type] [description]
     */
    public function publish() {
        $m = new M();
        $m->publish();
    }


}