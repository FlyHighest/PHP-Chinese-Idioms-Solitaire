<?php header('Content-type:text');



require("PDO.class.php");


require('config.php');
$DB= new Db($DB_CONFIG['HOST'], $DB_CONFIG['DBNAME'], $DB_CONFIG['USERNAME'], $DB_CONFIG['PASSWORD']);


$chengyus=$DB->query("select chengyu,max_len from pre_org_chengyu");
$mark=array();
$head=array();
$tail=array();
$max_len=array();
foreach ($chengyus as $chengyu){
	$max_len[$chengyu['chengyu']]=$chengyu['max_len'];
	$mark[$chengyu['chengyu']]=0;
	$head[$chengyu['chengyu']]=mb_substr($chengyu['chengyu'],0,1,'utf-8');
	$tail[$chengyu['chengyu']]=mb_substr($chengyu['chengyu'],mb_strlen($chengyu['chengyu'],'utf-8')-1,1,'utf-8');
}
function array_shuffle($list)
{
  
  if (!is_array($list)) return $list;  
  $keys = array_keys($list);  
  shuffle($keys);  
  $random = array();  
  foreach ($keys as $key)  
    $random[$key] = $list[$key];  
  return $random;  
 
}

$start=$_GET['start'];

if(!array_key_exists($start,$mark)){
	echo "抱歉，您输入的成语暂时未被收录。";
	exit;
}

$current=array();
$best=array();
$search_time=0;
$max_search_time=6000;
function dfs($curr_cy){
	global $current;
	global $best;
	global $mark;
	global $head;
	global $tail;
	global $search_time;
	global $max_search_time;
	global $max_len;
	$search_time=$search_time+1;
	if($search_time>$max_search_time && $max_search_time!=0) return;
	
	$current[]=$curr_cy;
	if(count($current)>count($best)){
		$best=$current;
		

	}
	$nexts=array_keys($head,$tail[$curr_cy]);
	//print_r($nexts);	
	$nexts=array_shuffle($nexts);
	//print_r($nexts);
	foreach($nexts as $next){
		if($mark[$next]==0 && count($current)+$max_len[$next]>count($best)){
			$mark[$next]=1;
			dfs($next);
			array_pop($current);
			$mark[$next]=0;
		}
	
	}
}
$mark[$start]=1;
dfs($start);
echo "(".count($best)."个成语)";
foreach($best as $cy){
	echo '<a target="view_window" href="chengyu.html?query='.$cy.'">'.$cy.'</a> &rarr; ';
}
if($search_time>$max_search_time)
	echo '......';
else echo '完';



?>