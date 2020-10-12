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

//友情链接

namespace app\admin\controller;
use \think\Db;
use \think\Cookie;
use \think\Session;
use \think\Controller;
use app\admin\controller\Base;
use app\admin\model\LinkUrl as M;
class LinkUrl extends Base
{
    //友情链接
    public function index()
    {
        $m = new M();
        $this->assign('citrixParam',Db::name("config")->where(['type'=>'link'])->count());
        $this->assign('getInfo',$m->getInfo());
        $this->assign('getDataList1',$m->getDataList(1));
        $this->assign('getDataList2',$m->getDataList(2));
        $this->assign('getDataList3',$m->getDataList(3));
        $this->assign('getDataList4',$m->getDataList(4));
        return $this->fetch();
    }
     /**
     * [publish 新增/编辑]
     * @return [type] [description]
     */
    public function publish()
    {
        $m = new M();
        $m->edit();
    }
}
