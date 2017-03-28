<?php
include_once('config.php');
date_default_timezone_set ('Asia/Shanghai');
$con = mysql_connect($mysql_server,$mysql_username,$mysql_password);
if (!$con) 
{
	die('Could not connect: ' . mysql_error());
}
mysql_query("set names 'gbk'");
mysql_select_db($mysql_db,$con);
$token=$_GET['token'];
$time = date("Y-m-d H:i:s");
if($token=='chushihua')
{
	$miyao=base64_decode(rc4($aqmy,$_POST['sss']));
	if($miyao==$aqmy) 
	{
		mysql_close($con);
		exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：密钥正确垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
	}
	else
	{
		mysql_close($con);
		exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：密钥错误垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
	}
}
if($token=='khdxt')
{
	$user=string_exist(trim($_POST['user']));
	$bdsjc= string_exist(trim($_POST['sjc']));
	$sql="select * from cathy_user where cathy_user='$user'";
	$ress=mysql_query($sql);
	while($row=mysql_fetch_array($ress)) if($row['zxsjc']==$bdsjc)
	{
		echo '正常';
	}
	else
	{
		echo '此号在另一地方进行了登陆,您被强制下线！';
	}
	mysql_close($con);
}
if($token=='xm')
{
	$user=base64_decode(rc4($aqmy,$_POST['user']));
	$mima=base64_decode(rc4($aqmy,$_POST['mm']));
	$sql="select * from cathy_user where cathy_user='$user'";
	$ress=mysql_query($sql);
	while($row=mysql_fetch_array($ress)) if($row['cathy_mima']==$mima)
	{
		exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：正常垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
	}
	else
	{
		exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：您的密码已经被修改，如果不是您本人操作请立即修改密码！垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
	}
	mysql_close($con);
}
if($token=='cjmm')
{
	$user=base64_decode(rc4($aqmy,$_POST['user']));
	$mima=base64_decode(rc4($aqmy,$_POST['mm']));
	$sql="select * from cathy_user where cathy_user='$user'";
	$ress=mysql_query($sql);
	while($row=mysql_fetch_array($ress)) if($row['cathy_cjmm']==$mima)
	{
		exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：正常垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
	}
	else
	{
		exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：您的密码已经被修改，如果不是您本人操作请立即修改密码！垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
	}
	mysql_close($con);
}
if($token=='dqsjpd') 
{
	$user=string_exist(trim($_POST['user']));
	$sql="select * from cathy_user where cathy_user='$user'";
	$ress=mysql_query($sql);
	while($row=mysql_fetch_array($ress)) if(strtotime($row['cathy_dqsj'])>= strtotime($time))
	{
		echo '正常';
	}
	else
	{
		echo '您的账号已过期,请续费后继续使用！';
	}
	mysql_close($con);
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
?>