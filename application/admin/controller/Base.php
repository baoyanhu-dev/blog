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
use app\admin\model\Base as M;
class Base extends Controller
{
	/**
     * [__construct description]
     * @return [type] [description]
     */
    public function __construct()
    {
        parent::__construct();
        $m = new M();
        $m->checkLogin();
        $getAdminInfo = $m->getAdminInfo();
        $getSystemInfo = $m->getSystemInfo();
        $getShowTopList = $m->getShowTopList();
        if(false == $m->checkJurisdiction())
        {
            if(Request()->isAjax())
            {
                exit(json_encode(['code'=>0,'msg'=>'无权限!']));
            }
            citrixJumpUrl("无权限!",url("admin/index/index"),$icon = 2);
            exit;
        }
        $this->assign('getAdminInfo',$getAdminInfo);
        $this->assign('getSystemInfo',$getSystemInfo);
        $this->assign('getShowTopList',$getShowTopList);
    }
}