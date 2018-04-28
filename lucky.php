<html>
<head>
<meta http-equiv="Content-Language" content="zh-CN">
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=gb2312">
<meta http-equiv="refresh" content="0.1;url=chengyu.html?query=<?php 
require("PDO.class.php");
require('config.php');
$DB= new Db($DB_CONFIG['HOST'], $DB_CONFIG['DBNAME'], $DB_CONFIG['USERNAME'], $DB_CONFIG['PASSWORD']);
$randint=rand(1,13227);



$chengyu=$DB->query("select chengyu from pre_org_chengyu where id=".$randint);
if(count($chengyu)>0)
echo $chengyu[0]['chengyu'];
else
	echo "心心相印";
?>">
<title></title>
</head>
<body>
</body>
</html>