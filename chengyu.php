<?php header('Content-type:text');



require('config.php');
require("PDO.class.php");

require('config.php');
$DB= new Db($DB_CONFIG['HOST'], $DB_CONFIG['DBNAME'], $DB_CONFIG['USERNAME'], $DB_CONFIG['PASSWORD']);

$cy=$_GET['cy'];
if(mb_strlen($cy,'utf-8')<=2){
	echo 'error';
	exit;
}

if($cy=='random'){
	$randint=rand(1,13227);
	$chengyus=	$DB->query("select * from pre_org_chengyu where id=".$randint);
}else{
	$chengyus=$DB->query("select * from pre_org_chengyu where chengyu like '%".$_GET['cy']."%'");
}
if(count($chengyus)==0){
	echo 'error';
	exit;
}
$item_chengyu=$chengyus[0];
if($item_chengyu['pinyin']=="") $item_chengyu['pinyin']='暂无';
if($item_chengyu['diangu']=="") $item_chengyu['diangu']='暂无';
if($item_chengyu['chuchu']=="") $item_chengyu['chuchu']='暂无';
if($item_chengyu['lizi']=="") $item_chengyu['lizi']='暂无';
echo $item_chengyu['chengyu']."FENGE【拼音】".$item_chengyu['pinyin']." <br/>
				【解释】".$item_chengyu['diangu']."<br/>
				【出处】".$item_chengyu['chuchu']."<br/>
				【例句】".$item_chengyu['lizi']."<br/>
				";

?>