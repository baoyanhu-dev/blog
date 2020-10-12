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

//管理员列表

namespace app\admin\controller;
use \think\Db;
use \think\Cookie;
use \think\Session;
use \think\Controller;
use app\admin\controller\Base;
use app\admin\model\Admin as M;
use app\admin\model\AdminCate as S;
class Admin extends Base
{
	/**
	 * [index 管理员列表]
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
        $s = new S();
        $id = Request()->has('id') ? Request()->param('id', 0, 'intval') : 0;
        Request()->isAjax()?($id <= 0?$m->add():$m->edit()):$this->assign('getInfo',$m->getInfo($id));
        $this->assign('dataList',$s->dataList);
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
}