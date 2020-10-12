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
class LinkUrl extends Model
{
    /**
     * [getDataList 获取组装参数]
     * @return [type] [description]
     */
    public function getDataList($param)
    {
        $nameList = Db::name("config")
        ->field('id,name,value')
        ->where(['type'=>'link'])->where('name','like','name_'.$param.'_%')
        ->order('id DESC')
        ->select();
        $linkList = Db::name("config")
        ->field('id,name,value')
        ->where(['type'=>'link'])->where('name','like','link_'.$param.'_%')
        ->order('id DESC')
        ->select();


        foreach ($nameList as $k1 => $v1) 
        {
            $res[$k1]['name_1'] = $nameList[$k1]['name'];
            $res[$k1]['value_1'] = $nameList[$k1]['value'];
            $res[$k1]['name_2'] = $linkList[$k1]['name'];
            $res[$k1]['value_2'] = $linkList[$k1]['value'];
        }

        return empty($res)?[]:$res;


    }
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

        Db::name('config')->where(['type'=>'link'])->delete();

        //预组装参数
        foreach ($post['name'] as $k1 => $v1) 
        {
            foreach ($post['name'][$k1] as $k2 => $v2) 
            {
                $map[$k1][$k2][0] = $k1;
                $map[$k1][$k2][1] = $k2;
                $map[$k1][$k2][2] = $post['name'][$k1][$k2];
                $map[$k1][$k2][3] = $post['link'][$k1][$k2];
            }
        }

        $sysSort = Db::name("config")->where(['type'=>'sys','name'=>'sort'])->value("value");

        //组装参数->插入数据库
        $data['type'] = 'link';
        foreach ($map as $k3 => $v3) 
        {
            
            if($sysSort == 1)
            {
                $map[$k3] = array_reverse($map[$k3]);
            }

            foreach ($map[$k3] as $k4 => $v4) 
            {
                $data['name1'] = "name_{$map[$k3][$k4][0]}_{$map[$k3][$k4][1]}";
                $data['value1'] = $map[$k3][$k4][2];

                $data['name2'] = "link_{$map[$k3][$k4][0]}_{$map[$k3][$k4][1]}";
                $data['value2'] = $map[$k3][$k4][3];
                
                $this->insConfig($data);
            }
        }

        exit(json_encode(['code'=>1,'msg'=>'更新成功']));
    }
    /**
     * [insConfig description]
     * @return [type] [description]
    */
    public function insConfig($data)
    {
        if(true == Db::name("config")->insert(['name'=>$data['name1'],'value'=>$data['value1'],'type'=>$data['type']]))
        {
            Db::name("config")->insert(['name'=>$data['name2'],'value'=>$data['value2'],'type'=>$data['type']]);
        }
    }
}