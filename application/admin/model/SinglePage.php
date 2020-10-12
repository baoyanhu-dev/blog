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
class SinglePage extends Model
{
    /**
     * [dataList 导航管理]
     * @return [type] [description]
     */
    public function dataList()
    {
        $dataList = Db::name('single_page')->order("id DESC")->select();
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
            ['title', 'require', '标题不能为空'],
            ['tag', 'require', '标签不能为空'],
            ['content', 'require', '内容不能为空'],

        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        $data['title'] = $post['title'];
        $data['tag'] = $post['tag'];
        $data['content'] = $post['content'];
        $data['img'] = empty($post['img'])?0:$post['img'];
        $data['create_time'] = time();
        if(true == Db::name("single_page")->insert($data))
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
            ['title', 'require', '标题不能为空'],
            ['tag', 'require', '标签不能为空'],
            ['content', 'require', '内容不能为空'],
        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        $data['title'] = $post['title'];
        $data['tag'] = $post['tag'];
        $data['content'] = $post['content'];
        $data['img'] = empty($post['img'])?0:$post['img'];
        $data['update_time'] = time();
        if(true == Db::name("single_page")->where(['id'=>$post['id']])->update($data))
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
        $dataInfo = Db::name("single_page")->where(['id'=>$id])->find();
        return $dataInfo;
    }
    /**
     * [infoDelete 删除]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function infoDelete($id)
    {
        $noAllow = ['11','12','13','14','15'];

        if(!empty(in_array($id,$noAllow)))
        {
            exit(json_encode(['code'=>0,'msg'=>'系统参数不允许删除']));
        }

        if(true == Db::name("single_page")->where(['id'=>$id])->delete())
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
        $table = "single_page";//input('table'); // 表名
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