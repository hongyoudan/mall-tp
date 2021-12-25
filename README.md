# mall - tp

<p align="left" style="">
  <img src="https://img.shields.io/github/last-commit/hongyoudan/mall-tp"></img>
	<img src="https://img.shields.io/github/languages/count/hongyoudan/mall-tp"></img>
<img src="https://img.shields.io/github/stars/hongyoudan/mall-tp?style=social"></img>
<img src="https://img.shields.io/github/watchers/hongyoudan/mall-tp?style=social"></img>
</p>

**整理不易，欢迎 `Star` 和 `Fork` ^_^ ，谢谢~~**

## 技术选型

- 后端：ThinkPHP
- 前端：Vue、ElementUI
- 数据库：MySQL



## 功能模块

- 商品添加
- 商品修改
- 商品删除
- 商品信息展示
- 商品状态为“已上架”不能修改及删除



## 快速启动

### 开发环境

Desktop System：macOS

IDE ：PhpStorm 2021.3

PHP：7.4.21

MySQL：5.7.34



### 启动后端服务

Terminal 输入命令，以端口号为8001启动

```
php think run -p 8001
```



### 打开前端页面

浏览器地址输入

```
http://0.0.0.0:8001
```



## 开发步骤

### 检查本机PHP版本
查看本机是否安装PHP，以及版本信息是否符合要求

终端输入：`php -v`



### 检查本机MySQL
查看本机是否安装MySQL

### 安装 Composer

关于ThinkPHP的详细操作方式可以查看：[ThinkPHP6.0 完全开发手册](https://www.kancloud.cn/manual/thinkphp6_0/1037479)


如果还没有安装 `Composer`，在 `Linux` 和 `Mac OS X` 中可以运行如下命令：

```
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
```

在 Windows 中，需要下载并运行 [Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe)。

由于众所周知的原因，国外的网站连接速度很慢。因此安装的时间可能会比较长，建议使用国内镜像（阿里云）。

打开命令行窗口（windows用户）或控制台（Linux、Mac 用户）并执行如下命令：

```
composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
```



### 安装 TP 稳定版

如果你是第一次安装的话，在命令行下面，切换到你的WEB根目录下面并执行下面的命令：

```
composer create-project topthink/think tp
```

这里的`tp`目录名你可以任意更改，这个目录就是我们后面会经常提到的应用根目录。



### 安装 thinkTemplate 模板引擎

新版框架默认只能支持PHP原生模板，如果需要使用`thinkTemplate`模板引擎，需要安装`think-view`扩展（该扩展会自动安装`think-template`依赖库）。

```
composer require topthink/think-view
```



### 引入静态资源

将CSS、JS等相关静态资源文件放入mall->public->static->assets



### 配置数据库

在mall->config->database.php下配置MySQL相关信息

```
'mysql' => [
            // 数据库类型
            'type'            => env('database.type', 'mysql'),
            // 服务器地址
            'hostname'        => env('database.hostname', '127.0.0.1'),
            // 数据库名
            'database'        => env('database.database', 'mall'),
            // 用户名
            'username'        => env('database.username', 'root'),
            // 密码
            'password'        => env('database.password', 'root'),
            // 端口
            'hostport'        => env('database.hostport', '3306'),
        ],
```



### 新建数据库、数据表

数据库名称：mall

商品表：product

```sql
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `name` varchar(255) NOT NULL COMMENT '商品名称',
  `pic` varchar(1024) NOT NULL COMMENT '图片地址',
  `price` decimal(10,2) NOT NULL COMMENT '价格',
  `status` int(11) NOT NULL COMMENT '商品状态，1新增，2已上架，3已下架',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
BEGIN;
INSERT INTO `product` VALUES (1, '冰红茶气泡水', 'https://gimg2.baidu.com/image_search/src=http%3A%2F%2Fimg.jj20.com%2Fup%2Fallimg%2F4k%2Fs%2F02%2F2109242332225H9-0-lp.jpg&refer=http%3A%2F%2Fimg.jj20.com&app=2002&size=f9999,10000&q=a80&n=0&g=0n&fmt=jpeg?sec=1642448167&t=9cf9f1af3573a653993c353bed6d1049', 11.00, 3);
INSERT INTO `product` VALUES (2, '香辣鸡排+冰红茶气泡水', 'https://gimg2.baidu.com/image_search/src=http%3A%2F%2Fimg.jj20.com%2Fup%2Fallimg%2Ftp05%2F19100122420C335-0-lp.jpg&refer=http%3A%2F%2Fimg.jj20.com&app=2002&size=f9999,10000&q=a80&n=0&g=0n&fmt=jpeg?sec=1642448167&t=c43e67c9af5ffb024cda4cca472a82ff', 12.00, 2);
INSERT INTO `product` VALUES (3, '甘梅鸡排+冰红茶气泡水', 'https://gimg2.baidu.com/image_search/src=http%3A%2F%2Fimg.jj20.com%2Fup%2Fallimg%2Ftp05%2F1Z92R1392462X-0-lp.jpg&refer=http%3A%2F%2Fimg.jj20.com&app=2002&size=f9999,10000&q=a80&n=0&g=0n&fmt=jpeg?sec=1642448167&t=11f8e26c1638503b90db5dbeb570a464', 13.00, 2);
INSERT INTO `product` VALUES (4, '藤椒鸡排+冰红茶气泡水', 'https://gimg2.baidu.com/image_search/src=http%3A%2F%2Fimg.jj20.com%2Fup%2Fallimg%2Ftp01%2F1ZZQ20QJS6-0-lp.jpg&refer=http%3A%2F%2Fimg.jj20.com&app=2002&size=f9999,10000&q=a80&n=0&g=0n&fmt=jpeg?sec=1642448167&t=c2975b7239e11c01578f2930b27d8681', 14.00, 1);
INSERT INTO `product` VALUES (5, '正新小鸡肉串', 'https://gimg2.baidu.com/image_search/src=http%3A%2F%2Fimg.jj20.com%2Fup%2Fallimg%2Ftp03%2F1Z921134I12011-0-lp.jpg&refer=http%3A%2F%2Fimg.jj20.com&app=2002&size=f9999,10000&q=a80&n=0&g=0n&fmt=jpeg?sec=1642448167&t=828511300ea31f30d6ec8230a2f8b222', 15.00, 1);
INSERT INTO `product` VALUES (6, '鸡蛋手抓饼', 'https://gimg2.baidu.com/image_search/src=http%3A%2F%2Fimg.jj20.com%2Fup%2Fallimg%2Ftp05%2F1Z9292320153V8-0-lp.jpg&refer=http%3A%2F%2Fimg.jj20.com&app=2002&size=f9999,10000&q=a80&n=0&g=0n&fmt=jpeg?sec=1642448167&t=1ae6c36b3ff2a0864fc8b17149ad8689', 16.00, 1);
INSERT INTO `product` VALUES (7, '一口肠', 'https://gimg2.baidu.com/image_search/src=http%3A%2F%2Fimg.jj20.com%2Fup%2Fallimg%2Ftp05%2F19100215450462F-0-lp.jpg&refer=http%3A%2F%2Fimg.jj20.com&app=2002&size=f9999,10000&q=a80&n=0&g=0n&fmt=jpeg?sec=1642448167&t=0152906030771f2e935f7fcdc2d277e6', 17.00, 2);
INSERT INTO `product` VALUES (8, '鸡肉串', 'https://gimg2.baidu.com/image_search/src=http%3A%2F%2Ffile06.16sucai.com%2F2016%2F0531%2F40fae16cf686999482d8ab01af629453.jpg&refer=http%3A%2F%2Ffile06.16sucai.com&app=2002&size=f9999,10000&q=a80&n=0&g=0n&fmt=jpeg?sec=1642448167&t=fd21f0d2efe6a49ae6d98f27eb02159e', 8.00, 3);
INSERT INTO `product` VALUES (9, '孜香锁骨', 'https://gimg2.baidu.com/image_search/src=http%3A%2F%2Fimg.jj20.com%2Fup%2Fallimg%2Ftp02%2F1Z91G402051057-0-lp.jpg&refer=http%3A%2F%2Fimg.jj20.com&app=2002&size=f9999,10000&q=a80&n=0&g=0n&fmt=jpeg?sec=1642448167&t=dfe83f9817a2bbbb9044fd0f3012c15a', 19.00, 1);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
```



### 编写后端业务代码

#### 控制器

在mall->app->controller下新建Index.php

```php
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
```

#### 解决跨域问题
在app/middleware.php中添加配置
```phpt
 // 设置全局中间件，解决跨域问题
 \think\middleware\AllowCrossDomain::class
```

### 编写前端代码

在mall->view创建目录index，并新建index.html文件

前端使用Vue+ElementUI，相关的CSS、JS等静态资源文件前面已经引入

#### Vue

简单地使用JS代码，操纵DOM，详细可以查看：[Vue.js - 教程](https://cn.vuejs.org/v2/guide/)

通过axios从后端获取数据

```javascript
axios.get(base_url + '/getproduct').then(res => {
                    if (res.data.errno === 0) {
                        this.list = res.data.data // 将返回的数据赋值给list
                    }

                })
```

#### ElementUI

主要使用到的组件，详细信息可以查看：[Element - 组件](https://element.eleme.cn/#/zh-CN/component/installation)

- Container 布局容器
- Color 色彩
- Button 按钮
- Input 输入框
- Select 选择器
- Form 表单
- Table 表格
- Tag 标签
- Dialog 对话框
- Card 卡片
- Image 图片







