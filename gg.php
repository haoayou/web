<?php
//加密方式：phpjm加密，代码还原率100%。
//此程序由【找源码】http://Www.ZhaoYuanMa.Com (VIP会员功能）在线逆向还原，QQ：7530782 
?>
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
if($token=='gonggao')    //公告
{
	$shuju="select `gonggao` from cathy_shuju where id = 1";
	$res111=mysql_query($shuju);
	$fanhui=mysql_fetch_row($res111);
	echo $fanhui[0];
	mysql_close($con);
}
if($token=='banben')  //版本号
{
	$shuju="select `bbh` from cathy_shuju where id = 1";
	$res111=mysql_query($shuju);
	$fanhui=mysql_fetch_row($res111);
	echo $fanhui[0];
	mysql_close($con);
}
if($token=='gxdz')  //更新地址
{
	$shuju="select `gxdz` from cathy_shuju where id = 1";
	$res111=mysql_query($shuju);
	$fanhui=mysql_fetch_row($res111);
	echo $fanhui[0];
	mysql_close($con);
}
if($token=='zbsj')     //返回的正版数据
{
	$shuju="select `shujua` from cathy_shuju where id = 1";
	$res111=mysql_query($shuju);
	$fanhui=mysql_fetch_row($res111);
	echo $fanhui[0];
	mysql_close($con);
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