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
class Adverts extends Model
{
    /**
     * [dataList 导航管理]
     * @return [type] [description]
     */
    public function dataList()
    {
        $dataList = Db::name('adverts')->order("sort desc,id DESC")->select();
        return $this->citrixCateList($dataList);
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
            ['title', 'require', '公告名称不能为空'],
            ['sort', 'require', '排序不能为空'],
            ['img', 'require', '图片不能为空'],
            ['content', 'require', '公告链接不能为空'],

        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        $data['title'] = $post['title'];
        $data['sort'] = $post['sort'];
        $data['img'] = empty($post['img'])?0:$post['img'];
        $data['pid'] = empty($post['pid'])?0:$post['pid'];
        $data['content'] = $post['content'];
        $data['create_time'] = time();
        if(true == Db::name("adverts")->insert($data))
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
            ['title', 'require', '公告名称不能为空'],
            ['sort', 'require', '排序不能为空'],
            ['img', 'require', '图片不能为空'],
            ['content', 'require', '公告链接不能为空'],
        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        $data['title'] = $post['title'];
        $data['sort'] = $post['sort'];
        $data['img'] = empty($post['img'])?0:$post['img'];
        $data['pid'] = empty($post['pid'])?0:$post['pid'];
        $data['content'] = $post['content'];
        $data['update_time'] = time();
        if(true == Db::name("adverts")->where(['id'=>$post['id']])->update($data))
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
        $dataInfo = Db::name("adverts")->where(['id'=>$id])->find();
        return $dataInfo;
    }
    /**
     * [infoDelete 删除]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function infoDelete($id)
    {
        if(true == Db::name("adverts")->where(['pid'=>$id])->count())
        {
            exit(json_encode(['code'=>0,'msg'=>'请先删除当前分类下的子分类']));
        }
        if(true == Db::name("adverts")->where(['id'=>$id])->delete())
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
        $table = "adverts";//input('table'); // 表名
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
}