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
$fbsjc=rc4($aqmy,base64_decode($_GET['cz1']));
$time = date("Y-m-d H:i:s");
$user=base64_decode(rc4($aqmy,$_POST['user']));
$pass=base64_decode(rc4($aqmy,$_POST['pass']));
$jiqima=string_exist(trim($_POST['cz']));
if($token=='login') 
{
	if(!is_numeric($fbsjc)||strpos($fbsjc,”.”)!==false)
	{
		mysql_close($con);
		exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：软件可能被破解垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
	}
	else
	{
		$fbsj=time();
		$jieguo=$fbsj-$fbsjc;
		if ($jieguo>="10")
		{
			mysql_close($con);
			exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：链接失效垃圾随机：传进来的参数：'.$fbsjc."现在的时间戳：".$fbsj."结果值：".$jieguo)));
		}
		else
		{
			$sql="select * from cathy_user where cathy_user='$user' and cathy_mima='$pass'";
			$shuju="select * from cathy_shuju order by id desc";
			$ress=mysql_query($sql);
			$res111=mysql_query($shuju);
			$rows= @mysql_num_rows($ress);
			$jqm="select `cathy_jqm` from cathy_hmdjqm where cathy_jqm='$jiqima'";
			$ress1122=mysql_query($jqm);
			$hmdjqm= @mysql_num_rows($ress1122);
			if($hmdjqm==0)
			{
				$yhm="select `cathy_yhm` from cathy_hmdyhm where cathy_yhm='$user'";
				$ress1122=mysql_query($yhm);
				$hmdyhm= @mysql_num_rows($ress1122);
				if($hmdyhm==0)
				{
					if($rows==1) 
					{
						$ress=mysql_query($sql);
						while($row=mysql_fetch_array($ress)) while($fanhui=mysql_fetch_array($res111)) if($fanhui['jiqimapd']=="no") 
						{
							if (strtotime($row['cathy_dqsj'])>= strtotime($time)) 
							{
								$sjc=strtotime($time);
								$sql="update cathy_user set zxsjc='$sjc' where cathy_user='$user'";
								$res= mysql_query($sql);
								$xcdlsjc=date('Y-m-d H:i:s',strtotime('+'.$fanhui['jiqimapd'].' minute'));
								$sql="update cathy_user set xcdlsj='$xcdlsjc' where cathy_user='$user'";
								$res= mysql_query($sql);
								$sql="update cathy_user set jiqima='$jiqima' where cathy_user='$user'";
								$res= mysql_query($sql);
								$sql="select * from cathy_user where cathy_user='$user' and cathy_mima='$pass'";
								$ress=mysql_query($sql);
								while($row=mysql_fetch_array($ress)) mysql_close($con);
								exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s"))."随机垃圾：用户ID:".$row['id'] ."丨时间搓：".$row['zxsjc']." 到期时间:".$row['cathy_dqsj'] ."丨登录成功！返回数据：".$fanhui['shujua']."垃圾随机".strtotime(date("Y-m-d H:i:s")))));
							}
							else
							{
								mysql_close($con);
								exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：账号过期垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
							}
						}
						else
						{
							if($row['jiqima']=="") 
							{
								if (strtotime($row['cathy_dqsj'])>= strtotime($time)) 
								{
									$sjc=strtotime($time);
									$sql="update cathy_user set zxsjc='$sjc' where cathy_user='$user'";
									$res= mysql_query($sql);
									$xcdlsjc=date('Y-m-d H:i:s',strtotime('+'.$fanhui['jiqimapd'].' minute'));
									$sql="update cathy_user set xcdlsj='$xcdlsjc' where cathy_user='$user'";
									$res= mysql_query($sql);
									$sql="update cathy_user set jiqima='$jiqima' where cathy_user='$user'";
									$res= mysql_query($sql);
									$sql="select * from cathy_user where cathy_user='$user' and cathy_mima='$pass'";
									$ress=mysql_query($sql);
									while($row=mysql_fetch_array($ress)) mysql_close($con);
									exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s"))."随机垃圾：用户ID:".$row['id'] ."丨时间搓：".$row['zxsjc']." 到期时间:".$row['cathy_dqsj'] ."丨登录成功！返回数据：".$fanhui['shujua']."垃圾随机".strtotime(date("Y-m-d H:i:s")))));
								}
								else
								{
									mysql_close($con);
									exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：账号过期垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
								}
							}
							else
							{
								if($row['jiqima']==$jiqima) 
								{
									if (strtotime($row['cathy_dqsj'])>= strtotime($time)) 
									{
										$sjc=strtotime($time);
										$sql="update cathy_user set zxsjc='$sjc' where cathy_user='$user'";
										$res= mysql_query($sql);
										$xcdlsjc=date('Y-m-d H:i:s',strtotime('+'.$fanhui['jiqimapd'].' minute'));
										$sql="update cathy_user set xcdlsj='$xcdlsjc' where cathy_user='$user'";
										$res= mysql_query($sql);
										$sql="update cathy_user set jiqima='$jiqima' where cathy_user='$user'";
										$res= mysql_query($sql);
										$sql="select * from cathy_user where cathy_user='$user' and cathy_mima='$pass'";
										$ress=mysql_query($sql);
										while($row=mysql_fetch_array($ress)) mysql_close($con);
										exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s"))."随机垃圾：用户ID:".$row['id'] ."丨时间搓：".$row['zxsjc']." 到期时间:".$row['cathy_dqsj'] ."丨登录成功！返回数据：".$fanhui['shujua']."垃圾随机".strtotime(date("Y-m-d H:i:s")))));
									}
									else
									{
										mysql_close($con);
										exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：账号过期垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
									}
								}
								else
								{
									if(strtotime($row['xcdlsj'])>= strtotime($time)) 
									{
										mysql_close($con);
										exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s"))."随机垃圾：系统禁止".$fanhui['jiqimapd']."分钟内在不同机器进行登录！垃圾随机：".strtotime(date("Y-m-d H:i:s")))));
									}
									else
									{
										if (strtotime($row['cathy_dqsj'])>= strtotime($time)) 
										{
											$sjc=strtotime($time);
											$sql="update cathy_user set zxsjc='$sjc' where cathy_user='$user'";
											$res= mysql_query($sql);
											$xcdlsjc=date('Y-m-d H:i:s',strtotime('+'.$fanhui['jiqimapd'].' minute'));
											$sql="update cathy_user set xcdlsj='$xcdlsjc' where cathy_user='$user'";
											$res= mysql_query($sql);
											$sql="update cathy_user set jiqima='$jiqima' where cathy_user='$user'";
											$res= mysql_query($sql);
											$sql="select * from cathy_user where cathy_user='$user' and cathy_mima='$pass'";
											$ress=mysql_query($sql);
											while($row=mysql_fetch_array($ress)) mysql_close($con);
											exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s"))."随机垃圾：用户ID:".$row['id'] ."丨时间搓：".$row['zxsjc']." 到期时间:".$row['cathy_dqsj'] ."丨登录成功！返回数据：".$fanhui['shujua']."垃圾随机".strtotime(date("Y-m-d H:i:s")))));
										}
										else
										{
											mysql_close($con);
											exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：账号过期垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
										}
									}
								}
							}
						}
					}
					else
					{
						mysql_close($con);
						exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：登陆账号密码错误！垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
					}
				}
				else
				{
					mysql_close($con);
					exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：您的用户名被禁止登陆,请联系管理！垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
				}
			}
			else
			{
				mysql_close($con);
				exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：您的IP被禁止登陆,请联系管理！垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
			}
		}
	}
}
else
{
	mysql_close($con);
	exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：软件可能被破解垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
}
?>