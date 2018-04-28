<?php
if(preg_match("/".$_SERVER["SERVER_NAME"]."/i",$_SERVER["HTTP_REFERER"])){
    ;//do nothing
}else{
    header("HTTP/1.1 418 I'm a teapot");
    echo "<html><style>h1,p{position:relative ;left:40%;top:300px;padding:2px 5px;overflow:hidden;width:330px; }</style><h1>I'm a teapot</h1><br/><p>The HTCPCP Server is a teapot.<br/> The responding entity MAY be short and stout.</p></html>";
    die;
}
//error_reporting(E_ALL);
//ini_set('display_errors',1);            //错误信息
//ini_set('display_startup_errors',1);    //php启动错误信息

$DB_CONFIG= [
    'HOST'=>'localhost',
    'USERNAME'=>'',
    'PASSWORD'=>'',
    'DBNAME'=>'',
    'CHARSET'=>'utf8',
];


