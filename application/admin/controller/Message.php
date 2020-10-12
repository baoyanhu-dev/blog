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

//留言咨询

namespace app\admin\controller;
use \think\Db;
use \think\Cookie;
use \think\Session;
use \think\Controller;
use app\admin\controller\Base;
use app\admin\model\Message as M;
class Message extends Base
{
	/**
	 * [index 留言咨询]
	 * @return [type] [description]
	 */
	public function index()
	{
        $m = new M();
        $this->assign('dataList',$m->dataList());
        $this->assign('keywords',input("keywords/s",''));
        return $this->fetch();
	}
    /**
     * [publish 新增/编辑]
     * @return [type] [description]
     */
    public function publish()
    {
        $m = new M();
        $id = Request()->has('id') ? Request()->param('id', 0, 'intval') : 0;
        $this->assign('getInfo',$m->getInfo($id));
        return $this->fetch();
    }
}