<?php

namespace app\controller;

use app\BaseController;
use think\facade\Db;
use think\facade\View;

class Index extends BaseController
{

    public function index()
    {
        // 获取前端页面模板文件index.html
        return View::fetch('index');
    }

    public function getProduct()
    {
        $res = Db::table('product')->select();
        return json(['errno' => 0, 'data' => $res]);
    }

    // 商品添加
    public function create()
    {
        // 判断是否为POST请求
        if (!$this->request->isPost()) {
            return json(['errno' => 1, 'data' => '请求错误！']);
        }

        // 获取传递过来的数据
        $name = input('name');
        $pic = input('pic');
        $price = input('price');
        $status = input('status');
        // 判断数据是否存在
        if ($name && $pic && $price && $status) {
            $data['name'] = $name;
            $data['pic'] = $pic;
            $data['price'] = $price;
            $data['status'] = $status;
            // insert方法返回影响数据的条数，没修改任何数据返回 0
            $res = Db::name('product')
                ->insert($data);

            return json(['errno' => 0, 'data' => '添加成功！']);
        }

        return json(['errno' => 1, 'data' => '添加失败！']);
    }

    // 商品删除
    public function delete()
    {
        // 判断是否为POST请求
        if (!$this->request->isPost()) {
            return json(['errno' => 1, 'data' => '请求错误！']);
        }

        // 获取传递过来的数据
        $id = input('id');
        // 判断数据是否存在
        if ($id) {
            Db::table('product')->delete($id);
            return json(['errno' => 0, 'data' => '删除成功！']);
        }

        return json(['errno' => 1, 'data' => '删除失败！']);

    }

    // 商品修改
    public function update()
    {
        // 判断是否为POST请求
        if (!$this->request->isPost()) {
            return json(['errno' => 1, 'data' => '请求错误！']);
        }

        // 获取传递过来的数据
        $id = input('id');
        $name = input('name');
        $pic = input('pic');
        $price = input('price');
        $status = input('status');
        // 判断数据是否存在
        if ($id && $name && $pic && $price && $status) {
            $data['name'] = $name;
            $data['pic'] = $pic;
            $data['price'] = $price;
            $data['status'] = $status;
            // update方法返回影响数据的条数，没修改任何数据返回 0
            $res = Db::name('product')
                ->where('id', $id)->update($data);

            return json(['errno' => 0, 'data' => '更新成功！']);
        }

        return json(['errno' => 1, 'data' => '更新失败！']);


    }
}
