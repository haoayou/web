<?php
//加密方式：phpjm加密，代码还原率100%。

//发现了time,请自行验证这套程序是否有时间限制.
//此程序由【找源码】http://Www.ZhaoYuanMa.Com (VIP会员功能）在线逆向还原，QQ：7530782
?>
<?php
include_once('config.php');
include_once('ABC.php');
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

?>