# 成语接龙网站 PHP Chinese Idioms Solitaire 

![logo.png](https://i.loli.net/2018/04/28/5ae3f54b55b1c.png)

## 数据说明 About database

数据库收录了13227条常用成语，并且有拼音、解释，大部分成语有出处和例句。

The original database is downloaded from [csdn](https://download.csdn.net/download/amazingdyd/9946686)
There are 13227 idioms in the database.  I've added some columns.

If you want to use it in localhost, the config-example.php should be edited and renamed to config.php.

I use [PHP-PDO-MySQL-Class](https://github.com/lincanbin/PHP-PDO-MySQL-Class) in my project. It works well and is easy to learn (author [Canbin Lin](http://www.94cb.com/)).

## 功能 Functions
1、成语接龙： 输入成语，点击确定，等待几秒钟时间加载。

2、成语释义： 输入成语，点击确定，显示释义。

## 接龙算法
采用深度优先搜索+分枝定界。参考jielong.php

## Demo

http://chengyu.tyz-xyz.com

If you have any suggestions, please contact me(tyz.xyz@qq.com). Thanks for your support.

