<?php
//加密方式：phpjm加密，代码还原率100%。
//此程序由【找源码】http://Www.ZhaoYuanMa.Com (VIP会员功能）在线逆向还原，QQ：7530782 
?>
<?php
include_once('config.php');
include_once('ABC.php');
$con = mysql_connect($mysql_server,$mysql_username,$mysql_password);
if (!$con) 
{
	die('Could not connect: ' . mysql_error());
}
mysql_query("set names 'gbk'");
mysql_select_db($mysql_db,$con);
$token=$_GET[token];
if($token=='gonggao')
{
	$shuju="select `gonggao` from cathy_shuju where id = 1";
	$res111=mysql_query($shuju);
	$fanhui=mysql_fetch_row($res111);
	echo $fanhui[0];
	mysql_close($con);
}
if($token=='banben')
{
	$shuju="select `bbh` from cathy_shuju where id = 1";
	$res111=mysql_query($shuju);
	$fanhui=mysql_fetch_row($res111);
	echo $fanhui[0];
	mysql_close($con);
}
if($token=='gxdz')
{
	$shuju="select `gxdz` from cathy_shuju where id = 1";
	$res111=mysql_query($shuju);
	$fanhui=mysql_fetch_row($res111);
	echo $fanhui[0];
	mysql_close($con);
}

?>