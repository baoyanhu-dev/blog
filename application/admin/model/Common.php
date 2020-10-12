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
class Common extends Model
{
    /**
     * [loginPublish 登录表单]
     * @return [type] [description]
     */
	public function loginPublish()
    {
    	$post = Request()->post();
        //验证  唯一规则： 表名，字段名，排除主键值，主键名
        $validate = new \think\Validate([
            ['userName', 'require|email', '账号不能为空|账号格式不符'],
            ['password', 'require', '密码不能为空'],
            ['verifyCode','require|captcha','验证码不能为空|验证码不正确'],
        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) 
        {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        if($info = Db::name("admin")->where(['username'=>$post['userName'],'password'=>citrixPassword($post['password'])])->find())
        {
            $data['login_num'] = $info['login_num']+1;
            $data['login_time'] = time();
            $data['login_ip'] = Request()->ip();
            $data['login_token'] = citrixGetTokenParam(implode(explode('.',$data['login_ip'])));
            if(true == Db::name("admin")->where(['username'=>$post['userName'],'password'=>citrixPassword($post['password'])])->update($data))
            {
                Session::set("_Admin",['id'=>$info['id'],'login_token'=>$data['login_token']]);
                exit(json_encode(['code'=>1,'msg'=>'操作成功','url'=>url('admin/index/index')]));
            }
            exit(json_encode(['code'=>0,'msg'=>'提交失败：网络异常']));
        }
        exit(json_encode(['code'=>0,'msg'=>'提交失败：账号或密码错误']));
    }
    
    /**
     * 图片上传方法
     * @return [type] [description]
     */
    public function upload($module='admin',$use='admin_default')
    {
        if(Request()->file('file')){
            $file = Request()->file('file');
        }else{
            exit(json_encode(['code'=>0,'msg'=>'没有上传文件']));
        }
        $module = Request()->post('module') ? Request()->post('module') : $module;//模块
        $use = Request()->post('use') ? Request()->post('use') : $use;
        $info = $file->rule('date')->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . $module . DS . $use);
        if($info) {
            //写入到附件表
            $data = [];
            $data['module'] = $module;
            $data['filename'] = $info->getFilename();//文件名
            $data['filepath'] = DS . 'public' . DS .'uploads' . DS . $module . DS . $use . DS . $info->getSaveName();//文件路径
            $data['fileext'] = $info->getExtension();//文件后缀
            $data['filesize'] = $info->getSize();//文件大小
            $data['create_time'] = time();//时间
            $data['uploadip'] = Request()->ip();//IP
            $data['use'] = $use;//用处
            $res['id'] = Db::name('attachment')->insertGetId($data);
            $res['src'] = DS . 'public' . DS . 'uploads' . DS . $module . DS . $use . DS . $info->getSaveName();
            $res['code'] = 1;
            $res['msg'] = "上传成功";
            // $res['suffix'] = $data['fileext'];
            exit(json_encode($res));
        } else {
            exit(json_encode(['code'=>0,'msg'=>'上传失败：'.$file->getError()]));
        }
    }
}