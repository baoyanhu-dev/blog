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
class Permission extends Model
{
    /**
     * [dataList 权限列表]
     * @return [type] [description]
     */
    public function dataList()
    {
        $dataList = Db::name('menu')->order("sort desc,id DESC")->select();
        return $this->citrixCateList($dataList);
    }
    /**
     * [dataMenuList description]
     * @return [type] [description]
     */
	public function dataMenuList()
    {
        header( 'Content-Type:text/html;charset=utf-8 ');  
        $nameCate = input('nameCate/s',0);
        $uid = Session::get("_Admin.id");
        $getAdminInfo = $this->getAdminInfo($uid);
        $dataMenuList = [];
        if(!empty($getAdminInfo))
        {
            $getShowTopList = $this->getShowTopList($getAdminInfo['admin_cate_id']);
            if(!empty($getShowTopList))
            {
                $dataMenuList = array_column($getShowTopList,"alias");
                $menu_collect = Db::name("admin_cate")->where(['id'=>$getAdminInfo['admin_cate_id']])->value("menu_collect");
                $menu_collect = json_decode($menu_collect,true);
                foreach ($dataMenuList as $k1 => $v1) 
                {
                    if($menu_cate_id = Db::name("menu_cate")->where(['alias'=>$dataMenuList[$k1]])->value("id"))
                    {
                        if($menuList1 = Db::name("menu")->field("id,name,module,controller,function,icon,is_open")->where(['is_display'=>1,'menu_cate_id'=>$menu_cate_id,'pid'=>0])->where('id','in',$menu_collect)->order("sort DESC,id DESC")->select())
                        {
                            $dataMenuList1 = [];
                            foreach ($menuList1 as $k2 => $v2) 
                            {

                                $dataMenuList2 = [];
                                if($menuList2 = Db::name("menu")->field("id,name,module,controller,function,icon,is_open")->where(['is_display'=>1,'pid'=>$menuList1[$k2]['id'],'menu_cate_id'=>$menu_cate_id])->order("sort DESC,id DESC")->select())
                                {
                                    foreach ($menuList2 as $k3 => $v3) 
                                    {
                                        $dataMenuList2[$k3] = [
                                                    'title'=>$menuList2[$k3]['name'],
                                                    'icon'=>$menuList2[$k3]['icon'],
                                                    'href'=>url($menuList2[$k3]['module'].'/'.$menuList2[$k3]['controller'].'/'.$menuList2[$k3]['function']),
                                                    'spread'=>empty($menuList2[$k3]['is_open'])?false:true
                                                    ]; 
                                    }
                                }
                                $dataMenuList1[$k2] = [
                                                    'title'=>$menuList1[$k2]['name'],
                                                    'icon'=>$menuList1[$k2]['icon'],
                                                    'href'=>url($menuList1[$k2]['module'].'/'.$menuList1[$k2]['controller'].'/'.$menuList1[$k2]['function']),
                                                    'spread'=>empty($menuList1[$k2]['is_open'])?false:true,
                                                    'children'=>$dataMenuList2
                                                    ];
                            }
                            $dataMenuList[$v1] = $dataMenuList1;
                        }
                    }
                    unset($dataMenuList[$k1]);
                }
                $request = empty($nameCate)?array_shift($dataMenuList):$dataMenuList[$nameCate];
                exit(json_encode($request));
            }
        }
    }
    /**
     * [getAdminInfo 获取管理员信息]
     * @return [type] [description]
     */
    public function getAdminInfo($admin_id)
    {
        $getAdminInfo = Db::name("admin")->where(['id'=>$admin_id])->find();
        return $getAdminInfo;
    }
    /**
     * [getShowTopList description]
     * @return [type] [description]
     */
    public function getShowTopList($admin_cate_id)
    {
        if(!empty($admin_cate_id))
        {
            if($menu_collect = Db::name("admin_cate")->where(['id'=>$admin_cate_id])->value("menu_collect"))
            {
                if($menu_cate_list = Db::name("menu")->where('id','in',json_decode($menu_collect,true))->group("menu_cate_id")->column("menu_cate_id"))
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
     * [citrixCateList 归属(树形结构)]
     * @param  [type]  $cate  [description]
     * @param  integer $id    [description]
     * @param  integer $level [description]
     * @return [type]         [description]
     */
    public function citrixCateList($cate,$id=0,$level=0){
        static $cates = array();
        foreach ($cate as $value) {
            if ($value['pid']==$id) {
                $value['level'] = $level+1;
                if($level == 0)
                {
                    $value['str'] = str_repeat('',$value['level']);
                }
                elseif($level == 2)
                {
                    $value['str'] = '&emsp;&emsp;&emsp;&emsp;'.'└ ';
                }
                else
                {
                    $value['str'] = '&emsp;&emsp;'.'└ ';
                }
                $cates[] = $value;
                $this->citrixCateList($cate,$value['id'],$value['level']);
            }
        }
        return $cates;
    }
    /**
     * [add 新增]
     * @return [type] [description]
     */
    public function add()
    {
        $post = Request()->post();
        //验证  唯一规则： 表名，字段名，排除主键值，主键名
        $validate = new \think\Validate([
            ['menu_cate_id', 'require', '权限模块必须选择'],
            ['name', 'require', '名称不能为空'],
            ['description', 'require', '模式不能为空'],
            ['is_display', 'require', '状态不能为空'],
            ['sort', 'require', '排序不能为空'],
        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        $data['menu_cate_id'] = empty($post)?0:$post['menu_cate_id'];
        $data['pid'] = empty($post)?0:$post['pid'];
        $data['name'] = empty($post)?null:$post['name'];
        $data['module'] = empty($post)?null:preg_replace('# #','',lcfirst(lcfirst($post['module'])));
        $data['controller'] = empty($post)?null:preg_replace('# #','',lcfirst(lcfirst($post['controller'])));
        $data['function'] = empty($post)?null:preg_replace('# #','',lcfirst(lcfirst($post['function'])));
        $data['description'] = empty($post)?null:$post['description'];
        $data['is_display'] = empty($post)?0:$post['is_display'];
        $data['icon'] = empty($post)?null:$post['icon'];
        $data['sort'] = empty($post)?0:$post['sort'];
        $data['create_time'] = time();
        if(true == Db::name("menu")->insert($data))
        {
            exit(json_encode(['code'=>1,'msg'=>'操作成功']));
        } 
        exit(json_encode(['code'=>0,'msg'=>'操作失败']));
    }
    /**
     * [edit 编辑]
     * @return [type] [description]
     */
    public function edit()
    {
        $post = Request()->post();
        //验证  唯一规则： 表名，字段名，排除主键值，主键名
        $validate = new \think\Validate([
            ['menu_cate_id', 'require', '权限模块必须选择'],
            ['name', 'require', '名称不能为空'],
            ['description', 'require', '模式不能为空'],
            ['is_display', 'require', '状态不能为空'],
            ['sort', 'require', '排序不能为空'],
        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        $data['menu_cate_id'] = empty($post)?0:$post['menu_cate_id'];
        $data['pid'] = empty($post)?0:$post['pid'];
        $data['name'] = empty($post)?null:$post['name'];
        $data['module'] = empty($post)?null:preg_replace('# #','',lcfirst(lcfirst($post['module'])));
        $data['controller'] = empty($post)?null:preg_replace('# #','',lcfirst(lcfirst($post['controller'])));
        $data['function'] = empty($post)?null:preg_replace('# #','',lcfirst(lcfirst($post['function'])));
        $data['description'] = empty($post)?null:$post['description'];
        $data['is_display'] = empty($post)?0:$post['is_display'];
        $data['icon'] = empty($post)?null:$post['icon'];
        $data['sort'] = empty($post)?0:$post['sort'];
        $data['update_time'] = time();
        if(true == Db::name("menu")->where(['id'=>$post['id']])->update($data))
        {
            exit(json_encode(['code'=>1,'msg'=>'操作成功']));
        } 
        exit(json_encode(['code'=>0,'msg'=>'操作失败']));
    }
    /**
     * [getInfo 获取单条数据]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getInfo($id)
    {
        $dataInfo = Db::name("menu")->where(['id'=>$id])->find();
        return $dataInfo;
    }
    /**
     * [infoDelete 删除]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function infoDelete($id)
    {
        if(true == Db::name("menu")->where(['pid'=>$id])->count())
        {
            exit(json_encode(['code'=>0,'msg'=>'请先删除当前分类下的列表']));
        }
        if(true == Db::name("menu")->where(['id'=>$id])->delete())
        {
            exit(json_encode(['code'=>1,'msg'=>'删除成功']));
        }
        exit(json_encode(['code'=>0,'msg'=>'删除失败']));
    }
    /**
     * [changeTableVal 快捷编辑]
     * @return [type] [description]
     */
    public function changeTableVal()
    {
        $table = "menu";//input('table'); // 表名
        $id_name = input('id_name'); // 表主键id名
        $id_value = input('id_value'); // 表主键id值
        $field  = input('field'); // 修改哪个字段
        $value  = input('value'); // 修改字段值  
        // 根据条件保存修改的数据
        if(true == Db::name($table)->where([$id_name=>$id_value])->update([$field=>$value]))
        {
            exit(json_encode(['code'=>1,'msg'=>'操作成功']));
        }
        exit(json_encode(['code'=>0,'msg'=>'操作失败']));
    }
    
}