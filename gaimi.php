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

?>