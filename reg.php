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
					if($res)
					{
					    
						if($cj=='0')
						{
						    $sssj=date('Y-m-d H:i:s');
					        $sql= "insert into `cathy_user` ( `id`, `cathy_user`, `cathy_mima`, `cathy_zcsj`, `cathy_dqsj`, `cathy_cjmm` , `jiqima`) values (  '',  '$user',  '$pass',  '$regtimes',  '$sssj' ,  '$user_txt',  '$jiqima' )";
					        $res= mysql_query($sql);
							mysql_close($con);
							exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：注册成功！垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
						}
						else
						{
						    $sssj=date('Y-m-d H:i:s',strtotime('+'.$cj.' minute'));
					        $sql= "insert into `cathy_user` ( `id`, `cathy_user`, `cathy_mima`, `cathy_zcsj`, `cathy_dqsj`, `cathy_cjmm` , `jiqima`) values (  '',  '$user',  '$pass',  '$regtimes',  '$sssj' ,  '$user_txt',  '$jiqima' )";
					        $res= mysql_query($sql);
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
				exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：关闭注册,请联系管理！垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
			}
		}
		else
		{
			mysql_close($con);
			exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'随机垃圾：您的IP被禁止注册,请联系管理！垃圾随机：'.strtotime(date("Y-m-d H:i:s")))));
		}
	}
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
?>