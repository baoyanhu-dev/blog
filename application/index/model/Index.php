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

namespace app\index\model;
use \think\Db;
use \think\Model;
use \think\Session;
class Index extends Model
{
	/**
	 * [dataCasesList 获取案例列表]
	 * @return [type] [description]
	 */
	public function dataCasesList()
	{
		$dataCasesList = Db::name("data_cate")->where(['type'=>2])->order("sort DESC,id DESC")->column("id");
		$dataList['cateList'] = Db::name("data_cate")->field("id,name")->where(['type'=>2])->order("sort DESC,id DESC")->select();
		$dataList['list'] = Db::name("data")->field("id,title,tag,img,code_img")->where("data_cate_id","in",$dataCasesList)->order("sort DESC,id DESC")->limit("0,8")->select();
		return $dataList;
	}
	/**
	 * [dataNewsList 获取新闻列表]
	 * @return [type] [description]
	 */
	public function dataNewsList()
	{
		$dataList = Db::name("data_cate")->where(['type'=>1])->field("id,name,description")->order("sort DESC,id DESC")->limit("0,3")->select();
		$model = Db::name("data");
		foreach ($dataList as $key => $value) 
        {
            $dataList[$key]['list'] = $model->where(['data_cate_id'=>$dataList[$key]['id']])->limit("0,8")->select();
        }
		return $dataList;
	}	
	/**
     * [dataCateList 获取分类里面的数据]
     * @param  [type] $cate_id [分类id]
     * @param  [type] $regex   [当前页码]
     * @param  [type] $limit   [每页多条]
     * @param  [type] $field   [需要的字段]
     * @return [type]          [description]
     */
    public function dataCateList($cate_id = 0,$regex = 0,$limit,$field,$type)
    {
    	$where = [];
    	if(!empty($regex))
		{
			if($regex == 1)
			{
				$regex = 0;
			}else
			{
				$regex = ($regex-1)*8;
			}
		}
		if(!empty($cate_id))
		{
			$where['data_cate_id'] = $cate_id;
		}else
		{
			$where['data_cate_id'] = ['in',Db::name("data_cate")->where(['type'=>$type])->column("id")];
		}
    	$dataCateList = Db::name("data")
    	->field($field)
    	->where($where)
    	->order('sort DESC,id DESC')
    	->limit("{$regex},{$limit}")
    	->select();
    	return $dataCateList;
    }
	/**
     * [dataCount 获取数据一共有多少条]
     * @return [type] [description]
     */
    public function dataCount($cate_id = 0,$type)
    {
    	$where = [];
		if(!empty($cate_id))
		{
			$where['data_cate_id'] = $cate_id;
		}else
		{
			$where['data_cate_id'] = ['in',Db::name("data_cate")->where(['type'=>$type])->column("id")];
		}
        return Db::name("data")->where($where)->count();
    }
	/**
	 * [Info 数据详情]
	 * @return [type] [description]
	 */
	public function Info()
	{
		$id = input('id/d',0);
		if($Info = Db::name("data")->where(['id'=>$id])->find())
		{
            Db::name('data')->where(['id'=>$id])->setInc('click_sum');
			return $Info;
		}
		citrixJumpUrl("Data does not exist.",url('index/index/index'),2);
	}
	/**
	 * [pageInfo 获取单页面列表]
	 * @return [type] [description]
	 */
	public function pageInfo()
	{
        $id = input('id/d',0);
        if($pageInfo = Db::name("single_page")->where(['id'=>$id])->find())
        {
            Db::name('single_page')->where(['id'=>$id])->setInc('click_sum');
            return $pageInfo;
        }
        citrixJumpUrl("Data does not exist.",url('index/index/index'),2);
	}
	 /**
     * [publish 留言表单]
     * @return [type] [description]
     */
    public function publish()
    {
        $post = Request()->post();
        //验证  唯一规则： 表名，字段名，排除主键值，主键名
        $validate = new \think\Validate([
            ['name', 'require', '昵称不能为空'],
            ['email', 'require', '邮箱不能为空'],
            ['phone', 'require', '联系方式不能为空'],
            // ['address', 'require', '联系地址不能为空'],
            ['message', 'require', '内容不能为空'],
            ['verifyCode','require|captcha','验证码不能为空|验证码不正确'],

        ]);

        $data['name'] = citrixFilter(htmlentities(preg_replace('# #','',$post['name'])));
        $data['email'] = citrixFilter(htmlentities(preg_replace('# #','',$post['email'])));
        $data['phone'] = citrixFilter(htmlentities(preg_replace('# #','',$post['phone'])));
        // $data['address'] = citrixFilter(htmlentities(preg_replace('# #','',$post['address'])));
        $data['message'] = citrixFilter(htmlentities(preg_replace('# #','',$post['message'])));

        //验证部分数据合法性
        if (!$validate->check($post)) {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }

        if(!preg_match("/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/",$data['email']))
        {
        	exit(json_encode(['code'=>0,'msg'=>'提交失败：邮箱格式不正确']));
        }
        if(!preg_match("/^1[3456789]{1}\d{9}$/",$data['phone']))
        {
        	exit(json_encode(['code'=>0,'msg'=>'提交失败：手机号格式不正确']));
        }

        $data['name'] = $post['name'];
        $data['email'] = $post['email'];
        $data['phone'] = $post['phone'];
        // $data['address'] = $post['address'];
        $data['message'] = $post['message'];
        $data['ip'] = request()->ip();
        $data['create_time'] = time();

        if(true == Db::name("message")->insert($data))
        {
            exit(json_encode(['code'=>1,'msg'=>'操作成功']));
        } 
        exit(json_encode(['code'=>0,'msg'=>'操作失败']));
    }


}