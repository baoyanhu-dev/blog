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

namespace app\admin\model;
use \think\Db;
use \think\Model;
use \think\Session;
class Base extends Model
{
	/**
	 * [checkLogin 检查是否登录]
	 * @return [type] [description]
	 */
	public function checkLogin()
	{
		$this->_Admin = Session::get("_Admin");
		if(empty($this->_Admin))
		{
			header('Location: '.url('admin/common/login')); 
			exit;
		}
	}
	/**
	 * [getAdminInfo 获取管理员信息]
	 * @return [type] [description]
	 */
	public function getAdminInfo()
	{
		$this->getAdminInfo = Db::name("admin")->where(['id'=>$this->_Admin['id']])->find();
		return $this->getAdminInfo;
	}
	/**
	 * [getSystemInfo 获取系统配置]
	 * @return [type] [description]
	 */
	public function getSystemInfo()
	{
		$data['nickname'] = $this->getAdminInfo['nickname'];//会员昵称
		$data['jurisdictionName'] = Db::name("admin_cate")->where(['id'=>$this->getAdminInfo['admin_cate_id']])->value("name");//角色权限
		$data['loginSum'] = $this->getAdminInfo['login_num'];//登录次数
		$data['loginIp'] = $this->getAdminInfo['login_ip'];//登录ip
		$data['loginTime'] = date("Y-m-d",$this->getAdminInfo['login_time']);//登录时间
		$data['tpCitrixPro'] = '云信科技'; //当前版本
		$data['tpCitrix'] = 'QQ:11447474'; //开发作者
		$data['web'] = '<a href="##" target="_blank"></a>'; //网站首页
		$data['ose'] = php_uname('s'); //服务器环境
		$data['mysql'] = '';//@mysql_get_server_info(); //数据库版本
        $data['php'] = PHP_VERSION;//php版本
        $data['win'] = PHP_OS;//操作系统
		$data['upload_size'] = ini_get('upload_max_filesize'); //最大上传限制
        $data['disk'] = '';//round(disk_free_space("/")/1024/1024,1).'M';//剩余空间大小
        $data['sapi_name'] = php_sapi_name();//获取PHP运行方式
		$data['sys_name'] = Get_Current_User();//服务器用户
		$data['zend'] = Zend_Version(); //获取Zend版本
		$data['sof'] = $_SERVER['SERVER_SOFTWARE'];//获取服务器解译引擎
		$data['port'] = $_SERVER['SERVER_PORT'];//端口
		$this->getSystemInfo = $data;
		return $this->getSystemInfo;
	}
	/**
	 * [getShowTopList description]
	 * @return [type] [description]
	 */
	public function getShowTopList()
	{
		if(!empty($this->getAdminInfo['admin_cate_id']))
		{
			if($menu_collect = Db::name("admin_cate")->where(['id'=>$this->getAdminInfo['admin_cate_id']])->value("menu_collect"))
			{
				if($menu_cate_list = Db::name("menu")->where(['is_display'=>1,'pid'=>0])->where('id','in',json_decode($menu_collect,true))->group("menu_cate_id")->column("menu_cate_id"))
				{
					if($getShowTopList = Db::name("menu_cate")->field("name,alias,icon")->where('id','in',$menu_cate_list)->order("sort DESC,id DESC")->select())
					{
						return $getShowTopList;
					}
				}
			}
		}
		return false;
	}
	/**
	 * [checkJurisdiction 检查权限]
	 * @return [type] [description]
	 */
	public function checkJurisdiction()
	{
		$where['module'] = preg_replace('# #','',lcfirst(Request()->module()));
        $where['controller'] = preg_replace('# #','',lcfirst(Request()->controller()));
        $where['function'] = preg_replace('# #','',lcfirst(Request()->action()));
        if($menu_collect = Db::name("admin_cate")->where(['id'=>$this->getAdminInfo['admin_cate_id']])->value("menu_collect"))
        {
        	$menu_collect = json_decode($menu_collect,true);
        	if($where['module'] == "admin" && $where['controller'] == "index" && ($where['function'] == "index" || $where['function'] == "indexMain" || $where['function'] == "indexmain"))
        	{
        		return true;
        	}else if($where['module'] == "admin" && $where['controller'] == "permission" && $where['function'] == "menu")
        	{
        		return true;
        	}
        	if($admin_cate_id = Db::name("menu")->where($where)->value("id"))
        	{
        		if(in_array($admin_cate_id, $menu_collect))
        		{
        			return true;
        		}
        	}
        }
        return false;
	}
}