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
class Admin extends Model
{
    /**
     * [dataList 管理员列表]
     * @return [type] [description]
     */
    public function dataList()
    {
        $dataList = Db::name('admin')->order("id DESC")->select();
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
            ['admin_cate_id', 'require', '分组不能为空'],
            ['username', 'require', '用户名不能为空'],
            ['password', 'require', '密码不能为空'],
            ['password_confirm', 'require', '重复密码不能为空'],
            ['nickname', 'require', '昵称不能为空'],
        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        if(citrixPassword($post['password']) != citrixPassword($post['password_confirm']))
        {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：两次密码不一致']));
        }
        if(true == Db::name("admin")->where(['username'=>$post['username']])->count())
        {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：用户名已存在']));
        }
        if(empty($post['admin_cate_id']))
        {
            exit(json_encode(['code'=>0,'msg'=>'分组不能为空']));
        }
        $data['admin_cate_id'] = $post['admin_cate_id'];
        $data['username'] = $post['username'];
        $data['password'] = citrixPassword($post['password']);
        $data['nickname'] = $post['nickname'];
        $data['login_ip'] = Request()->ip();
        $data['create_time'] = time();
        if(true == Db::name("admin")->insert($data))
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
            ['admin_cate_id', 'require', '分组不能为空'],
            ['username', 'require|email', '用户名不能为空|用户名格式只能是邮箱'],
            ['nickname', 'require', '昵称不能为空'],
        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        if(true == Db::name("admin")->where(['username'=>$post['username']])->where("id != {$post['id']}")->count())
        {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：用户名已存在']));
        }
        if(!empty($post['password']) || !empty($post['password_confirm']))
        {
            if(citrixPassword($post['password']) != citrixPassword($post['password_confirm']))
            {
                exit(json_encode(['code'=>0,'msg'=>'提交失败：两次密码不一致']));
            } 
            $data['password'] = citrixPassword($post['password']);
        }
        if(empty($post['admin_cate_id']))
        {
            exit(json_encode(['code'=>0,'msg'=>'分组不能为空']));
        }
        $data['admin_cate_id'] = $post['admin_cate_id'];
        $data['username'] = $post['username'];
        $data['nickname'] = $post['nickname'];
        if(true == Db::name("admin")->where(['id'=>$post['id']])->update($data))
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
        $dataInfo = Db::name("admin")->where(['id'=>$id])->find();
        return $dataInfo;
    }
    /**
     * [infoDelete 删除]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function infoDelete($id)
    {
        if(true == Db::name("admin")->where(['id'=>$id])->delete())
        {
            exit(json_encode(['code'=>1,'msg'=>'删除成功']));
        }
        exit(json_encode(['code'=>0,'msg'=>'删除失败']));
    }
}