<?php
//加密方式：phpjm加密，代码还原率100%。
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
mysql_query("set names 'gbk'");
mysql_select_db($mysql_db,$con);
$user=base64_decode(rc4($aqmy,$_POST['user']));
$kahao= string_exist(trim($_POST['kahao']));
$time = date("Y-m-d H:i:s");
$sql="select * from cathy_czk where cathy_kahao='$kahao'";
$ress=mysql_query($sql);
while($row=mysql_fetch_array($ress)) $sj = $row['cathy_tianshu'];
$shuju="select * from cathy_czk order by cathy_kahao='$kahao'";
$res111=mysql_query($shuju);
while($fanhui=mysql_fetch_array($res111)) $syz = $fanhui['Cathy_syz'];
if($sj=="") 
{
	mysql_close($con);
	exit(stringToHex(rc4($aqmy,'卡号不存在')));
}
else 
{
	if($syz=="") 
	{
		$sql1="select * from cathy_user where cathy_user='$user'";
		$ress1=mysql_query($sql1);
		while($row1=mysql_fetch_array($ress1)) $dqsj = $row1['cathy_dqsj'];
		$sssj=date("Y-m-d H:i:s",strtotime("$dqsj +".$sj." day"));
		$sql="update cathy_user set cathy_dqsj='$sssj' where 

cathy_user='$user'";
		$res= mysql_query($sql);
		if($res) 
		{
			$sql="update cathy_czk set Cathy_syz='$user' where cathy_kahao='$kahao'";
			$res= mysql_query($sql);
			$sql="update cathy_czk set Cathy_sysj='$time' where cathy_kahao='$kahao'";
			$res= mysql_query($sql);
			mysql_close($con);
			exit(stringToHex(rc4($aqmy,"充值成功,充值时间:".$sj."天。到期时间：".$sssj)));
		}
		else 
		{
			mysql_close($con);
			exit(stringToHex(rc4($aqmy,'充值失败,请联系管理员！')));
		}
		unset($res);
	}
	else 
	{
		mysql_close($con);
		exit(stringToHex(rc4($aqmy,'此卡号已经被充值')));
	}
}
?>