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

class Fenzhan extends Model
{
    /**
     * [add 新增]
     * @return [type] [description]
     */
    public function add()
    {
        $post = Request()->post();
        //验证  唯一规则： 表名，字段名，排除主键值，主键名
        $validate = new \think\Validate([
            ['addressname', 'require', '地区不能为空'],
            ['city', 'require', '文件名不能为空'],
            ['sort', 'require', '排序不能为空'],
        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }

        $data['addressname'] = $post['addressname'];
        $data['city'] = $post['city'];
        $data['sort'] = $post['sort'];
        $data['link'] = $post['link'];
        $data['title'] = $post['title'];
        $data['des'] = $post['des'];
        $data['keyword'] = $post['keyword'];
        $data['create_time'] = time();
        if(true == Db::name("fenzhan")->insert($data))
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
            ['addressname', 'require', '地区不能为空'],
            ['city', 'require', '文件名不能为空'],
            ['sort', 'require', '排序不能为空'],
        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        $data['addressname'] = $post['addressname'];
        $data['city'] = $post['city'];
        $data['sort'] = $post['sort'];
        $data['link'] = $post['link'];
        $data['title'] = $post['title'];
        $data['des'] = $post['des'];
        $data['keyword'] = $post['keyword'];
        $data['create_time'] = time();
        if(true == Db::name("fenzhan")->where(['id'=>$post['id']])->update($data))
        {
            exit(json_encode(['code'=>1,'msg'=>'操作成功']));
        }
        exit(json_encode(['code'=>0,'msg'=>'操作失败']));
    }
    /**
     * [dataList 文章资讯列表]
     * @return [type] [description]
     */
    public function dataList()
    {
        $keywords = input("keywords/s",'');

        $where = [];
        if(!empty($keywords))
        {
            $where['addressname'] = ['like',"%{$keywords}%"];
        }
        $dataList = Db::name('fenzhan')->where($where)->order("sort")->paginate(20,false,['query'=>Request()->param()]);

        return $dataList;
    }
    /**
     * [getInfo 获取单条数据]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getInfo($id)
    {
        $dataInfo = Db::name("fenzhan")->where(['id'=>$id])->find();
        return $dataInfo;
    }

}