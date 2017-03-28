<?php
//加密方式：php源码混淆类加密。免费版地址:http://www.zhaoyuanma.com/phpjm.html 免费版不能解密,可以使用VIP版本。

//发现了time,请自行验证这套程序是否有时间限制.
//此程序由【找源码】http://Www.ZhaoYuanMa.Com (免费版）在线逆向还原，QQ：7530782 
?>
<?php
include_once('config.php');
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
function rc4 ($pwd, $data) 
{
	$key[] ="";
	$box[] ="";
	$pwd_length = strlen($pwd);
	$data_length = strlen($data);
	for ($i = 0; $i < 256; $i++) 
	{
		$key[$i] = ord($pwd[$i % $pwd_length]);
		$box[$i] = $i;
	}
	for ($j = $i = 0; $i < 256; $i++) 
	{
		$j = ($j + $box[$i] + $key[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}
	for ($a = $j = $i = 0; $i < $data_length; $i++) 
	{
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$k = $box[(($box[$a] + $box[$j]) % 256)];
		$cipher .= chr(ord($data[$i]) ^ $k);
	}
	return $cipher;
}
function stringToHex ($s) 
{
	$r = "";
	$hexes = array ("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f");
	for ($i=0; $i<strlen($s);
	$i++) 
	{
		$r .= ($hexes [(ord($s
		{
			$i}
		) >> 4)] . $hexes [(ord($s
		{
			$i}
		) & 0xf)]);
	}
	return $r;
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