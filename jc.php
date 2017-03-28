<?php
//加密方式：phpjm加密，代码还原率100%。

//发现了time,请自行验证这套程序是否有时间限制.
//此程序由【找源码】http://Www.ZhaoYuanMa.Com (VIP会员功能）在线逆向还原，QQ：7530782 
?>
?<?php
include_once('config.php');
date_default_timezone_set ('Asia/Shanghai');
$con = mysql_connect($mysql_server,$mysql_username,$mysql_password);
if (!$con) 
{
	die('Could not connect: ' . mysql_error());
}
mysql_query("set names 'utf8'");
mysql_select_db($mysql_db,$con);
$fbsjc=rc4($aqmy,base64_decode($_GET['fsdf']));
$jiqima=$_GET['fwgwr'];
$yuanyin=$_GET['fgwgvsa'];
$IP=rc4($aqmy,base64_decode($_GET['gewrge']));
$SJ = date("Y-m-d H:i:s");
if(!is_numeric($fbsjc)||strpos($fbsjc,”.”)!==false)
{
	mysql_close($con);
	exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：软件被破解垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
}
else
{
	$fbsj=time();
	$jieguo=$fbsj-$fbsjc;
	if ($jieguo>="5")
	{
		mysql_close($con);
		exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：地址失效垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
	}
	else
	{
		$jqm="select `cathy_jqm` from cathy_hmdjqm where cathy_jqm='$jiqima'";
		$ress1122=mysql_query($jqm);
		$hmdjqm= @mysql_num_rows($ress1122);
		if($hmdjqm==0)
		{
			$sql= "insert into `cathy_hmdjqm` ( `cathy_jqm`, `cathy_SJ`, `cathy_IP`, `cathy_yy` ) values (  '$jiqima',  '$SJ',  '$IP',  '$yuanyin')";
			$res= mysql_query($sql);
			if($res)
			{
				mysql_close($con);
				exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：成功垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
			}
			else
			{
				mysql_close($con);
				exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：失败垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
			}
			unset($res);
		}
		else
		{
			mysql_close($con);
			exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：您的IP被禁封,请联系管理员！垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
		}
	}
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
?>