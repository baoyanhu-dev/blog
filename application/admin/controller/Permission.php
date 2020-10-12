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

//权限

namespace app\admin\controller;
use \think\Db;
use \think\Cookie;
use \think\Session;
use \think\Controller;
use app\admin\controller\Base;
use app\admin\model\Permission as M;
use app\admin\model\PermissionCate as S;
class Permission extends Base
{
	/**
	 * [index 权限列表]
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
     * [menu description]
     * @return [type] [description]
     */
	public function menu()
    {
        $m = new M();
        $m->dataMenuList();
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
        $pid = Request()->has('pid') ? Request()->param('pid', 0, 'intval') : 0;
        $menu_cate_id = Request()->has('menu_cate_id') ? Request()->param('menu_cate_id', 0, 'intval') : 0;
        Request()->isAjax()?($id <= 0?$m->add():$m->edit()):$this->assign('getInfo',$m->getInfo($id));
        $this->assign('moduleList',$s->dataList);
        $this->assign('dataList',$m->dataList);
        $this->assign('pid',$pid);
        $this->assign('menu_cate_id',$menu_cate_id);
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