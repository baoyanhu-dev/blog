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
class PermissionCate extends Model
{
    /**
     * [dataList 列表]
     * @return [type] [description]
     */
    public function dataList()
    {
        $dataList = Db::name('menu_cate')->order("sort desc,id DESC")->select();
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
            ['alias', 'require', '分类别名不能为空'],
            ['sort', 'require', '分类排序不能为空'],
            ['icon', 'require', '图标代码不能为空'],
        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        $data['name'] = $post['name'];
        $data['alias'] = $post['alias'];
        $data['icon'] = $post['icon'];
        $data['sort'] = $post['sort'];
        $data['create_time'] = time();
        if(true == Db::name("menu_cate")->where(['alias'=>$post['alias']])->count())
        {
            exit(json_encode(['code'=>0,'msg'=>'分类别名已存在']));
        }
        if(true == Db::name("menu_cate")->insert($data))
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
            ['alias', 'require', '分类别名不能为空'],
            ['sort', 'require', '分类排序不能为空'],
            ['icon', 'require', '图标代码不能为空'],
        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        $data['name'] = $post['name'];
        $data['alias'] = $post['alias'];
        $data['icon'] = $post['icon'];
        $data['sort'] = $post['sort'];
        $data['update_time'] = time();

        if(true == Db::name("menu_cate")->where(['alias'=>$post['alias']])->where('id','neq',$post['id'])->count())
        {
            exit(json_encode(['code'=>0,'msg'=>'分类别名已存在']));
        }
        if(true == Db::name("menu_cate")->where(['id'=>$post['id']])->update($data))
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
        $dataInfo = Db::name("menu_cate")->where(['id'=>$id])->find();
        return $dataInfo;
    }
    /**
     * [infoDelete 删除]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function infoDelete($id)
    {
        if(true == Db::name("menu")->where(['menu_cate_id'=>$id])->count())
        {
            exit(json_encode(['code'=>0,'msg'=>'请先删除当前分类下的列表']));
        }
        if(true == Db::name("menu_cate")->where(['id'=>$id])->delete())
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
        $table = "menu_cate";//input('table'); // 表名
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