<?php
include_once('config.php');
include_once('ABC.php');
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
		exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'�����������Կ��ȷ���������'.strtotime(date("Y-m-d H:i:s")))));
	}
	else
	{
		mysql_close($con);
		exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'�����������Կ�������������'.strtotime(date("Y-m-d H:i:s")))));
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
		echo '����';
	}
	else
	{
		echo '�˺�����һ�ط������˵�½,����ǿ�����ߣ�';
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
		exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'����������������������'.strtotime(date("Y-m-d H:i:s")))));
	}
	else
	{
		exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'������������������Ѿ����޸ģ�������������˲����������޸����룡���������'.strtotime(date("Y-m-d H:i:s")))));
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
		echo '����';
	}
	else
	{
		echo '�����˺��ѹ���,�����Ѻ����ʹ�ã�';
	}
	mysql_close($con);
}

?>