<?php
//加密方式：phpjm加密，代码还原率100%。
//此程序由【找源码】http://Www.ZhaoYuanMa.Com (VIP会员功能）在线逆向还原，QQ：7530782 
?>
?<?php
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
$token=$_GET['token'];
$user=base64_decode(rc4($aqmy,$_POST['user']));
$pass=base64_decode(rc4($aqmy,$_POST['pass']));
$sql="select * from cathy_admin where admin_user='$user' and admin_pass='$pass'";
$res=mysql_query($sql);
$rownum= @mysql_num_rows($res);
if($rownum==1) 
{
	if($token=='admin_up') 
	{
		admin_up();
	}
	if($token=='admin_del') 
	{
		admin_del();
	}
	if($token=='admin_list') 
	{
		user_list();
	}
	if($token=='admin_shuju') 
	{
		admin_shuju();
	}
	if($token=='admin_dqsj') 
	{
		admin_dqsj();
	}
	if($token=='admin_zcpd') 
	{
		admin_zcpd();
	}
	if($token=='admin_gg') 
	{
		admin_gg();
	}
	if($token=='admin_szbbh') 
	{
		admin_szbbh();
	}
	if($token=='admin_zcmrsj') 
	{
		admin_zcmrsj();
	}
	if($token=='admin_tjczk') 
	{
		admin_tjczk();
	}
	if($token=='admin_scczk') 
	{
		admin_scczk();
	}
	if($token=='admin_dqczk') 
	{
		admin_dqczk();
	}
	if($token=='admin_dlxz') 
	{
		admin_dlxz();
	}
	if($token=='admin_hmdjqm') 
	{
		admin_hmdjqm();
	}
	if($token=='admin_scjqm') 
	{
		admin_scjqm();
	}
	if($token=='admin_dqhmdyhm') 
	{
		admin_dqhmdyhm();
	}
	if($token=='admin_schmdyhm') 
	{
		admin_schmdyhm();
	}
	if($token=='admin_tjhmdyhm') 
	{
		admin_tjhmdyhm();
	}
}
else 
{
	echo '管理员账户密码错误！';
}
function admin_up() 
{
	$id= string_exist(trim($_POST['id']));
	$newspass= string_exist(trim($_POST['newpass']));
	$sql="update cathy_user set cathy_mima='$newspass' where id='$id'";
	$res= mysql_query($sql);
	if($res) 
	{
		echo "修改成功";
	}
	else 
	{
		echo '修改失败';
	}
	mysql_close($con);
	unset($res);
}
function admin_del() 
{
	$user= string_exist(trim($_POST['vuser']));
	$sql="delete from cathy_user where cathy_user='$user'";
	$res= mysql_query($sql);
	if($res) 
	{
		echo "删除成功";
	}
	else 
	{
		echo '删除失败';
	}
	mysql_close($con);
	unset($res);
}
function user_list() 
{
	$sql="select * from cathy_user order by id desc";
	$res=mysql_query($sql);
	while($row=mysql_fetch_array($res)) 
	{
		echo "id:".$row['id'] ." user:". $row['cathy_user']." pass:".$row['cathy_mima']." time:".$row['cathy_zcsj']." cjmm:".$row['cathy_cjmm']."daoqi:".$row['cathy_dqsj']."丨";
		mysql_close($con);
	}
}
function admin_shuju() 
{
	$fanhuishuju= $_POST['shuju'];
	$sql="update cathy_shuju set shujua='$fanhuishuju' where id='1'";
	$res= mysql_query($sql);
	if($res) 
	{
		echo "设置成功";
	}
	else 
	{
		echo '设置失败';
	}
	mysql_close($con);
	unset($res);
}
function admin_dqsj() 
{
	$vuser= string_exist(trim($_POST['vuser']));
	$daoqishijian= string_exist(trim($_POST['shijian']));
	$sql="update cathy_user set cathy_dqsj='$daoqishijian' where cathy_user='$vuser'";
	$res= mysql_query($sql);
	if($res) 
	{
		echo "设置成功";
	}
	else 
	{
		echo '设置失败';
	}
	mysql_close($con);
	unset($res);
}
function admin_zcpd() 
{
	$fanhuishuju= string_exist(trim($_POST['zcpd']));
	$sql="update cathy_shuju set kaiqizhuce='$fanhuishuju' where id='1'";
	$res= mysql_query($sql);
	if($res) 
	{
		echo "设置成功";
	}
	else 
	{
		echo '设置失败';
	}
	mysql_close($con);
	unset($res);
}
function admin_gg() 
{
	$fanhuishuju= string_exist(trim($_POST['xggg']));
	$sql="update cathy_shuju set gonggao='$fanhuishuju' where id='1'";
	$res= mysql_query($sql);
	if($res) 
	{
		echo "设置成功";
	}
	else 
	{
		echo '设置失败';
	}
	mysql_close($con);
	unset($res);
}
function admin_zcmrsj() 
{
	$fanhuishuju= string_exist(trim($_POST['sj']));
	$sql="update cathy_shuju set zcsysj='$fanhuishuju' where id='1'";
	$res= mysql_query($sql);
	if($res) 
	{
		echo "设置成功";
	}
	else 
	{
		echo '设置失败';
	}
	mysql_close($con);
	unset($res);
}
function admin_szbbh() 
{
	$fanhuishuju= string_exist(trim($_POST['bbh']));
	$xgdz= string_exist(trim($_POST['gxdz']));
	$sql="update cathy_shuju set bbh='$fanhuishuju' where id='1'";
	$res= mysql_query($sql);
	$sql="update cathy_shuju set gxdz='$xgdz' where id='1'";
	$res= mysql_query($sql);
	if($res) 
	{
		echo "设置成功";
	}
	else 
	{
		echo '设置失败';
	}
	mysql_close($con);
	unset($res);
}
function admin_tjczk() 
{
	$tianshu= string_exist(trim($_POST['tianshu']));
	$kahao= string_exist(trim($_POST['kahao']));
	$sql= "insert into `cathy_czk` ( `cathy_tianshu`, `cathy_kahao` ) values (  '$tianshu',  '$kahao')";
	$res= mysql_query($sql);
	if($res) 
	{
		echo "添加成功";
	}
	else 
	{
		echo '添加失败';
	}
	mysql_close($con);
	unset($res);
}
function admin_scczk() 
{
	$kahao= string_exist(trim($_POST['kahao']));
	$sql="delete from cathy_czk where cathy_kahao='$kahao'";
	$res= mysql_query($sql);
	if($res) 
	{
		echo "删除成功";
	}
	else 
	{
		echo '删除失败';
	}
	mysql_close($con);
	unset($res);
}
function admin_dqczk() 
{
	$sql="select * from cathy_czk order by cathy_kahao desc";
	$res=mysql_query($sql);
	while($row=mysql_fetch_array($res)) 
	{
		echo "天数:".$row['cathy_tianshu'] ." 卡号:". $row['cathy_kahao']." 使用者:".$row['Cathy_syz']." 使用时间:".$row['Cathy_sysj']."丨";
		mysql_close($con);
	}
}
function admin_dlxz() 
{
	$fanhuishuju= string_exist(trim($_POST['fzs']));
	$sql="update cathy_shuju set jiqimapd='$fanhuishuju' where id='1'";
	$res= mysql_query($sql);
	if($res) 
	{
		echo "设置成功";
	}
	else 
	{
		echo '设置失败';
	}
	mysql_close($con);
	unset($res);
}
function admin_hmdjqm() 
{
	$sql="select * from cathy_hmdjqm order by cathy_jqm desc";
	$res=mysql_query($sql);
	while($row=mysql_fetch_array($res)) 
	{
		echo "hmdjqm:".$row['cathy_jqm'] ." QQ:". $row['cathy_SJ']." IP:".$row['cathy_IP']." yuanyin:".$row['cathy_yy']." ***";
		mysql_close($con);
	}
}
function admin_scjqm() 
{
	$jiqima= string_exist(trim($_POST['jiqima']));
	$sql="delete from cathy_hmdjqm where cathy_jqm='$jiqima'";
	$res= mysql_query($sql);
	if($res) 
	{
		echo "删除成功";
	}
	else 
	{
		echo '删除失败';
	}
	mysql_close($con);
	unset($res);
}
function admin_dqhmdyhm() 
{
	$sql="select * from cathy_hmdyhm order by cathy_yhm desc";
	$res=mysql_query($sql);
	while($row=mysql_fetch_array($res)) 
	{
		echo "hmdyhm:".$row['cathy_yhm'] ." ***";
		mysql_close($con);
	}
}
function admin_schmdyhm() 
{
	$yonghuming= string_exist(trim($_POST['yhm']));
	$sql="delete from cathy_hmdyhm where cathy_yhm='$yonghuming'";
	$res= mysql_query($sql);
	if($res) 
	{
		echo "删除成功";
	}
	else 
	{
		echo '删除失败';
	}
	mysql_close($con);
	unset($res);
}
function admin_tjhmdyhm() 
{
	$yhm= string_exist(trim($_POST['yhm']));
	$sql= "insert into `cathy_hmdyhm` ( `cathy_yhm` ) values (  '$yhm')";
	$res= mysql_query($sql);
	if($res) 
	{
		echo "添加成功";
	}
	else 
	{
		echo '添加失败';
	}
	mysql_close($con);
	unset($res);
}

?>