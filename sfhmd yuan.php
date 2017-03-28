<?php
include_once('config.php');
$con = mysql_connect($mysql_server,$mysql_username,$mysql_password);
if (!$con) 
{
	die('Could not connect: ' . mysql_error());
}
mysql_query("set names 'gbk'");
mysql_select_db($mysql_db,$con);
$token=$_GET[token];
if($token=='sfhmd')     //返回的正版数据
{
    $jiqima=string_exist(trim($_POST['ip']));
	//$shuju="select `cathy_jqm` from cathy_hmdjqm where id = 1";
	//$res111=mysql_query($shuju);
	//$fanhui=mysql_fetch_row($res111);
	$jqm="select `cathy_jqm` from cathy_hmdjqm where cathy_jqm='$jiqima'";
	$ress1122=mysql_query($jqm);
	$hmdjqm= @mysql_num_rows($ress1122);
	if($hmdjqm==0)
		{
	         mysql_close($con);
	         exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：正常垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
		}
		else
		{
	          mysql_close($con);
	          exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：您的IP被禁止！垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
        }
}
function string_exist($str,$type=0)
{
	if (empty($str)) return false;
	if($type==1 || $type==0)
	{
		$str = str_replace("'", "", $str);
		$str = str_replace("union", "", $str);
		$str = str_replace("join", "", $str);
		$str = str_replace("where", "", $str);
		$str = str_replace("insert", "", $str);
		$str = str_replace("delete", "", $str);
		$str = str_replace("update", "", $str);
		$str = str_replace("like", "", $str);
		$str = str_replace("drop", "", $str);
		$str = str_replace("create", "", $str);
		$str = str_replace("modify","",$str);
		$str = str_replace("rename","",$str);
	}
	if($type==2 || $type==0)
	{
	}
	return $str;
}
function stringToHex ($s) 
{
	$r = "";
	$hexes = array ("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f");
	for ($i=0; $i<strlen($s);
	$i++) 
	{
		$r .= ($hexes [(ord($s
		{
			$i}
		) >> 4)] . $hexes [(ord($s
		{
			$i}
		) & 0xf)]);
	}
	return $r;
}
function rc4 ($pwd, $data) 
{
	$key[] ="";
	$box[] ="";
	$pwd_length = strlen($pwd);
	$data_length = strlen($data);
	for ($i = 0; $i < 256; $i++) 
	{
		$key[$i] = ord($pwd[$i % $pwd_length]);
		$box[$i] = $i;
	}
	for ($j = $i = 0; $i < 256; $i++) 
	{
		$j = ($j + $box[$i] + $key[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}
	for ($a = $j = $i = 0; $i < $data_length; $i++) 
	{
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$k = $box[(($box[$a] + $box[$j]) % 256)];
		$cipher .= chr(ord($data[$i]) ^ $k);
	}
	return $cipher;
}
?>