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

if($token=='gonggao')
{
	$shuju="select `gonggao` from cathy_shuju where id = 1";
	$res111=mysql_query($shuju);
	$fanhui=mysql_fetch_row($res111);
	echo $fanhui[0];
	mysql_close($con);
}



//$sql = 'select * from configs';
//$qry = mysql_query($sql ,$link);
if($qry==false)
    die;
@$fea = mysql_fetch_array($qry);
if($fea != false)
{
    echo encrypt($fea['client_md5'],ENCRYPT_KEY);

}
endl();
mysql_close($link);