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
class Message extends Model
{
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
            $where['name'] = ['like',"%{$keywords}%"];
        }
        $dataList = Db::name('message')->where($where)->order("id DESC")->paginate(20,false,['query'=>Request()->param()]);

        return $dataList;
    }
    /**
     * [getInfo 获取单条数据]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getInfo($id)
    {
        $dataInfo = Db::name("message")->where(['id'=>$id])->find();
        return $dataInfo;
    }
}