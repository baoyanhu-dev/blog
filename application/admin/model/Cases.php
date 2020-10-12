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
class Cases extends Model
{
    /**
     * [dataList 案例列表]
     * @return [type] [description]
     */
    public function dataList()
    {
        $keywords = input("keywords/s",'');
        $data_cate_id = input("data_cate_id/d",'');
        $cateListId = Db::name("data_cate")->where(['type'=>2])->column('id');
        $where['data_cate_id'] = empty($data_cate_id)?['in',$cateListId]:$data_cate_id;
        if(!empty($keywords))
        {
            $where['title'] = ['like',"%{$keywords}%"];
        }
        $dataList = Db::name('data')->where($where)->order("sort desc,id DESC")->paginate(20,false,['query'=>Request()->param()]);

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
            ['data_cate_id', 'require|min:1', '分类必须选择|分类必须选择'],
            ['title', 'require', '案例名称不能为空'],
            ['tag', 'require', '标签不能为空'],
            ['sort', 'require', '排序不能为空'],
            ['img', 'require', '图片不能为空'],
            ['code_img', 'require', '二维码不能为空'],
            ['description', 'require', '简单描述不能为空'],
            ['content', 'require', '案例内容不能为空'],
        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        if(empty($post['data_cate_id']))
        {
            exit(json_encode(['code'=>0,'msg'=>'分类必须选择']));
        }
        $data['data_cate_id'] = $post['data_cate_id'];
        $data['title'] = $post['title'];
        $data['tag'] = $post['tag'];
        $data['sort'] = $post['sort'];
        $data['img'] = empty($post['img'])?0:$post['img'];
        $data['code_img'] = empty($post['code_img'])?0:$post['code_img'];
        $data['description'] = $post['description'];
        $data['content'] = $post['content'];
        $data['create_time'] = time();
        
        if(true == Db::name("data")->insert($data))
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
            ['data_cate_id', 'require|min:1', '分类必须选择|分类必须选择'],
            ['title', 'require', '案例名称不能为空'],
            ['tag', 'require', '标签不能为空'],
            ['sort', 'require', '排序不能为空'],
            ['img', 'require', '图片不能为空'],
            ['code_img', 'require', '二维码不能为空'],
            ['description', 'require', '简单描述不能为空'],
            ['content', 'require', '案例内容不能为空'],
        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        if(empty($post['data_cate_id']))
        {
            exit(json_encode(['code'=>0,'msg'=>'分类必须选择']));
        }
        $data['data_cate_id'] = $post['data_cate_id'];
        $data['title'] = $post['title'];
        $data['tag'] = $post['tag'];
        $data['sort'] = $post['sort'];
        $data['img'] = empty($post['img'])?0:$post['img'];
        $data['code_img'] = empty($post['code_img'])?0:$post['code_img'];
        $data['description'] = $post['description'];
        $data['content'] = $post['content'];
        $data['update_time'] = time();
        if(true == Db::name("data")->where(['id'=>$post['id']])->update($data))
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
        $dataInfo = Db::name("data")->where(['id'=>$id])->find();
        return $dataInfo;
    }
    /**
     * [infoDelete 删除]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function infoDelete($id)
    {
        if(true == Db::name("data")->where(['id'=>$id])->delete())
        {
            exit(json_encode(['code'=>1,'msg'=>'删除成功']));
        }
        exit(json_encode(['code'=>0,'msg'=>'删除失败']));
    }

    /**
     * [batchDelete 批量删除]
     * @return [type] [description]
     */
    public function batchDelete()
    {
        $post = Request()->post();
        if(empty($post['uGather']))
        {
            exit(json_encode(['code'=>0,'msg'=>'请选择需要删除的内容']));
        }
        $batchDeleteList = array_filter(array_unique(explode(',',$post['uGather'])));
        if(empty($batchDeleteList))
        {
            exit(json_encode(['code'=>0,'msg'=>'请选择需要删除的内容']));
        }
        foreach ($batchDeleteList as $k1 => $v1) 
        {
           Db::name("data")->where(['id'=>$v1])->delete();
        }
        exit(json_encode(['code'=>1,'msg'=>'删除成功']));
    }
    /**
     * [changeTableVal 快捷编辑]
     * @return [type] [description]
     */
    public function changeTableVal()
    {
        $table = "data";//input('table'); // 表名
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