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
class SetUp extends Model
{
	//获取系统设置
    public function getInfo()
    {
        $all = Db::name('config')->field("type")->group('type')->select();
        $model = Db::name('config');
        foreach ($all as $k1 => $v1) 
        {
            $list = [];
            $arr = $model->where(['type'=>$v1['type']])->select();
            foreach ($arr as $key => $value) 
            {
                $list[$arr[$key]['name']] = array (
                    "value" => $arr[$key]['value'],
                    "description" => $arr[$key]['description'],
                    "id" => $arr[$key]['id']
                );
            }
            $all[$v1['type']] = $list;
            unset($all[$k1]);
        }
        return $all;
    }
     /**
     * [edit 编辑]
     * @return [type] [description]
     */
    public function edit()
    {
       	$post = Request()->post();
		$model = Db::name('config');
        foreach ($post as $k1 => $v1) 
        {
            foreach ($post[$k1] as $k2 => $v2) 
            {
                $model->where(['type'=>$k1,'name'=>$k2])->update(['value'=>$post[$k1][$k2]]);
            }
        }
        exit(json_encode(['code'=>1,'msg'=>'更新成功']));
    }
}