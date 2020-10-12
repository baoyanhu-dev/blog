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
use \think\Model;
use \think\Db;
class AdminCate extends Model
{
    /**
     * [dataList 列表]
     * @return [type] [description]
     */
    public function dataList()
    {
        $dataList = Db::name('admin_cate')->order("id DESC")->select();
        return $dataList;
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
            ['name', 'require', '分类名称不能为空'],
            ['menu', 'require|array', '权限不能为空|权限不能为空'],
            ['description', 'require', '描述不能为空'],
        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        $data['name'] = $post['name'];
        $data['menu_collect'] = json_encode(explode(',',implode(',',$post['menu'])));
        $data['description'] = $post['description'];
        $data['create_time'] = time();
        if(true == Db::name("admin_cate")->insert($data))
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
            ['name', 'require', '分类名称不能为空'],
            ['menu', 'require|array', '权限不能为空|权限不能为空'],
            ['description', 'require', '描述不能为空'],
        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        $data['name'] = $post['name'];
        $data['menu_collect'] = json_encode(explode(',',implode(',',$post['menu'])));
        $data['description'] = $post['description'];
        $data['update_time'] = time();
        if(true == Db::name("admin_cate")->where(['id'=>$post['id']])->update($data))
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
        $dataInfo = Db::name("admin_cate")->where(['id'=>$id])->find();
        $dataInfo['menu_collect'] = json_decode($dataInfo['menu_collect'],true);
        return $dataInfo;
    }
    /**
     * [infoDelete 删除]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function infoDelete($id)
    {
        if(true == Db::name("admin")->where(['admin_cate_id'=>$id])->count())
        {
            exit(json_encode(['code'=>0,'msg'=>'请先删除当前组下的管理员']));
        }
        if(true == Db::name("admin_cate")->where(['id'=>$id])->delete())
        {
            exit(json_encode(['code'=>1,'msg'=>'删除成功']));
        }
        exit(json_encode(['code'=>0,'msg'=>'删除失败']));
    }
    /**
     * [menuList description]
     * @return [type] [description]
     */
    public function menuList()
    {
        $menuList = Db::name("menu")->field('id,name,pid,menu_cate_id')->order("sort DESC,id DESC")->select();
        return citrixMenuList($menuList); 
    }
}