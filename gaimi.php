<?php
//加密方式：phpjm加密，代码还原率100%。
//此程序由【找源码】http://Www.ZhaoYuanMa.Com (VIP会员功能）在线逆向还原，QQ：7530782 
?>
?<?php
include_once('config.php');
$con = mysql_connect($mysql_server,$mysql_username,$mysql_password);
if (!$con) 
{
	die('Could not connect: ' . mysql_error());
}
mysql_query("set names 'gbk'");
mysql_select_db($mysql_db,$con);
$tbname = 'cathy_user';
$user=base64_decode(rc4($aqmy,$_POST['user']));
$cjmm=base64_decode(rc4($aqmy,$_POST['cjmm']));
$xmm=base64_decode(rc4($aqmy,$_POST['xmm']));
$row = sql_selects("`cathy_user`,`cathy_mima`,`cathy_cjmm`",$tbname,"WHERE cathy_user='$user'");
if($row==false)
{
	mysql_close($con);
	exit(stringToHex(rc4($aqmy,'用户名不存在')));
}
if($row[2]==$cjmm)
{
	$sql = "UPDATE `".$tbname."` SET `cathy_mima`='$xmm' WHERE `cathy_user`='$user'";
	if(mysql_query($sql,$con)==false)
	{
		mysql_close($con);
		exit(stringToHex(rc4($aqmy,'修改失败')));
		exit();
	}
	mysql_close($con);
	exit(stringToHex(rc4($aqmy,'修改成功')));
	exit();
}
mysql_close($con);
exit(stringToHex(rc4($aqmy,'超级密码不正确')));
exit();
?>

<?php
function sql_selects($field,$tb,$where)
{
	$sql="SELECT ".$field." FROM ".$tb." ".$where;
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	return $row;
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