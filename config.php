<?php
set_time_limit(0);
$db['db_name'] = 'xxxx';
$db['db_user'] = 'xxxx';
$db['db_pwd'] = 'xxxx';
$db['db_host'] = 'xxxxx';

/*$db['db_name'] = 'gxggw';
$db['db_user'] = 'usr0799k4k6';
$db['db_pwd'] = 'bsgxg2013_';
$db['db_host'] = 'hzn01.rds.aliyuncs.com';*/

$con = mysql_connect($db['db_host'],$db['db_user'],$db['db_pwd']);
mysql_select_db($db['db_name'],$con);
mysql_set_charset('utf8', $con); 


define("TOP_SDK_WORK_DIR","./");
/*淘宝*/
include("TopClient.php");
include("RequestCheckUtil.php");
include("LtLogger.php");
/*京东*/
include("JosClient.php");
include("JosRequest.php");
/*拍拍*/
include("PaiPaiOpenApiOauth.php");
include("HttpClient.class.php");
/*一号店*/
include("SysParamsRequest.php");
include("YhdClient.php");

$b = isset($_REQUEST['brand']) ? $_REQUEST['brand'] : "gxg";

$apis = mysql_query("SELECT `uin`,`key`,`secret`,`session` FROM `apis` WHERE `brand`='".$b."' LIMIT 1");
$api = mysql_fetch_row($apis);

define("UIN",$api[0]);
define("APPKEY",$api[1]);
define("SECRETKEY",$api[2]);
define("SESSIONKEY",$api[3]);
define("SERVER_URL", "http://115.238.188.14");

session_start();
