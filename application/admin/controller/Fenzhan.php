<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/12/27
 * Time: 9:29
 */

namespace app\admin\controller;

use \think\Db;
use \think\Cookie;
use think\Request;
use \think\Session;
use \think\Controller;
use app\admin\controller\Base;
use app\admin\model\Fenzhan as M;
use QL\QueryList;

class Fenzhan extends Base
{
    //应用首页
    public function index()
    {
        $m = new M();
        $this->assign('dataList', $m->dataList());
        $this->assign('keywords', input("keywords/s", ''));
        return $this->fetch();
    }

    public function publish()
    {
//        dump($_POST);die;
        $m = new M();
        $id = Request()->has('id') ? Request()->param('id', 0, 'intval') : 0;
        Request()->isAjax() ? ($id <= 0 ? $m->add() : $m->edit()) : $this->assign('getInfo', $m->getInfo($id));
        return $this->fetch();
    }


    public function address()
    {
        header('content-type:text/html; charset=utf-8');//防止生成的页面乱码
        $request = Request::instance();
        $url = $request->domain();//获取当前请求域名
        $html = file_get_contents($url);
        $id = Request()->has('id') ? Request()->param('id', 0, 'intval') : 0;
        $where = '';
        $where['id'] = $id;
        $data = Db::name('fenzhan')->where($where)->field('city,addressname,title,des,keyword')->find();
        $city = $data['city'];//生成城市文件名
        /*(ROOT_PATH);根目录*/
        $dir_path = ROOT_PATH . 'fenzhan/' . $city;
        $dir = iconv("UTF-8", "GBK", "$dir_path");
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
            $html_name = "index.html";
            $filename = $dir_path . "/" . $html_name;
            $handle = fopen($filename, "w");
            $title=$data['title'];
            $keyword=$data['keyword'];
            $des=$data['des'];
            //内容开始
            $new_html=" <title>$title</title>
	<meta name=\"keywords\" content='$keyword' />
	<meta name=\"description\" content='$des' />";

            $content = $new_html.$html;
            //内容结束
            if (!fwrite($handle, $content)) { //将信息写入文件
                die ("生成文件" . $filename . "失败！");
            }
            fclose($handle); //关闭指针
            exit(json_encode(['code' => 1, 'msg' => "生成成功"]));
        }else{
            $html_name = "index.html";
            $filename = $dir_path . "/" . $html_name;
            $handle = fopen($filename, "w");
            //内容开始
            $title=$data['title'];
            $keyword=$data['keyword'];
            $des=$data['des'];
            $new_html=" <title>$title</title>
	<meta name=\"keywords\" content='$keyword' />
	<meta name=\"description\" content='$des' />";
            $content = $new_html.$html;
            if (!fwrite($handle, $content)) { //将信息写入文件
                die ("生成文件" . $filename . "失败！");
            }
            fclose($handle); //关闭指针
            exit(json_encode(['code' => 2, 'msg' => "生成成功"]));
        }
//        $reg = array(
//            "title" => array("title", "text"),
//            "kw" => array("meta[name=keywords]", "content"),
//            "desc" => array("meta[name=description]", "content"),
//        );
//        $data = QueryList::Query($url, $reg)->data;
//        $title = '';
//        $kw = '';
//        $desc = '';
//        foreach ($data as $k => $v) {
//            $title = $v['title'];
//            $kw = $v['kw'];
//            $desc = $v['desc'];
//        }
}

function download($file_url, $new_name = '')
{
    if (!isset($file_url) || trim($file_url) == '') {
        echo '500';
    }
    if (!file_exists($file_url)) { //检查文件是否存在
        echo '404';
    }
    $file_name = basename($file_url);
    $file_type = explode('.', $file_url);
    $file_type = $file_type[count($file_type) - 1];
    $file_name = trim($new_name == '') ? $file_name : urlencode($new_name);
    $file_type = fopen($file_url, 'r'); //打开文件
    //输入文件标签
    header("Content-type: application/octet-stream");
    header("Accept-Ranges: bytes");
    header("Accept-Length: " . filesize($file_url));
    header("Content-Disposition: attachment; filename=" . $file_name);
    //输出文件内容
    echo fread($file_type, filesize($file_url));
    fclose($file_type);
}
}
