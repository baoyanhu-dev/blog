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

//分类

namespace app\admin\controller;
use \think\Db;
use \think\Cookie;
use \think\Session;
use \think\Controller;
use app\admin\controller\Base;
use app\admin\model\DataCate as M;
class DataCate extends Base
{
	/**
	 * [index 管理组]
	 * @return [type] [description]
	 */
	public function index()
	{
        $m = new M();
        $dataList = $m->dataList();
        $this->assign('dataList',$dataList);
        return $this->fetch();
	}
    /**
     * [publish 新增/编辑]
     * @return [type] [description]
     */
    public function publish()
    {
        $m = new M();
        $pid = Request()->has('pid') ? Request()->param('pid', 0, 'intval') : 0;
        $id = Request()->has('id') ? Request()->param('id', 0, 'intval') : 0;
        Request()->isAjax()?($id <= 0?$m->add():$m->edit()):$this->assign('getInfo',$m->getInfo($id));
        $dataList = $m->dataList();
        $this->assign('pid',$pid);
        $this->assign('dataList',$dataList);
        return $this->fetch();
    }
    /**
     * [infoDelete 删除]
     * @return [type] [description]
     */
    public function infoDelete()
    {
        $m = new M();
        $id = Request()->has('id') ? Request()->param('id', 0, 'intval') : 0;
        $m->infoDelete($id);
    }
    /**
     * [changeTableVal 快捷编辑]
     * @return [type] [description]
     */
    public function changeTableVal()
    {
        $m = new M();
        $m->changeTableVal();
    }
}