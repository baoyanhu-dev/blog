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

//系统公用

namespace app\admin\controller;
use \think\Db;
use \think\Cookie;
use \think\Session;
use \think\Controller;
use app\admin\model\Common as M;
class Common extends Controller
{
	/**
	 * [login 登录页面]
	 * @return [type] [description]
	 */
	public function login()
    {
        return $this->fetch();
    }
    /**
     * [loginPublish 登录表单]
     * @return [type] [description]
     */
	public function loginPublish()
    {
        $m = new M();
        $m->loginPublish();
    }
    /**
     * 管理员退出，清除名字为admin的session
     * @return [type] [description]
     */
    public function logout()
    {
        Session::delete('_Admin');
        if(Session::get('_Admin')) {
            return $this->error('退出失败');
        } else {
            return $this->success('正在退出...','admin/common/login');
        }
    }
    /**
     * [upload 图片上传方法]
     * @return [type] [description]
     */
    public function upload()
    {
        $m = new M();
        $m->upload();
    }
}