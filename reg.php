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
$time = date("Y-m-d H:i:s");
$token=$_GET['token'];
if($token=='reg')
{
	$user=base64_decode(rc4($aqmy,$_POST['user']));
	$pass=base64_decode(rc4($aqmy,$_POST['pass']));
	$jiqima=string_exist(trim($_POST['ip']));
	$regtimes= $time;
	$user_txt= base64_decode(rc4($aqmy,$_POST['cjmm']));
	$sql="select * from cathy_user where cathy_user='$user'";
	$zcpd="select * from cathy_shuju order by id desc";
	$res= mysql_query($sql);
	$res111=mysql_query($zcpd);
	$res222=mysql_query($zcpd);
	$ct= @mysql_num_rows($res);
	while($fanhui111=mysql_fetch_array($res222)) while($fanhui=mysql_fetch_array($res111))
	{
		$jqm="select `cathy_jqm` from cathy_hmdjqm where cathy_jqm='$jiqima'";
		$ress1122=mysql_query($jqm);
		$hmdjqm= @mysql_num_rows($ress1122);
		if($hmdjqm==0)
		{
			if($fanhui['kaiqizhuce']=="yes") 
			{
				if ($ct==0) 
				{
					$cj = $fanhui111['zcsysj'];
					$sssj=date('Y-m-d H:i:s',strtotime('+'.$cj.' minute'));
					$sql= "insert into `cathy_user` ( `id`, `cathy_user`, `cathy_mima`, `cathy_zcsj`, `cathy_dqsj`, `cathy_cjmm` ) values (  '',  '$user',  '$pass',  '$regtimes',  '$sssj' ,  '$user_txt' )";
					$res= mysql_query($sql);
					if($res) 
					{
						if($cj=="no") 
						{
							mysql_close($con);
							exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：注册成功！垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
						}
						else
						{
							mysql_close($con);
							exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：注册成功。系统自动赠送您'.$cj.'分钟使用数！垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
						}
					}
					else
					{
						mysql_close($con);
						exit(stringToHex(rc4($aqmy,'注册失败')));
					}
				}
				else
				{
					mysql_close($con);
					exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：该用户名已经被注册啦！垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
				}
			}
			else
			{
				mysql_close($con);
				exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：暂时无法注册,请联系管理！垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
			}
		}
		else
		{
			mysql_close($con);
			exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：您的IP被禁止注册,请联系管理！垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
		}
	}
}

?>