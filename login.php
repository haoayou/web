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
	if(!is_numeric($fbsjc)||strpos($fbsjc,��.��)!==false)
	{
		mysql_close($con);
		exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'���������������ܱ��ƽ����������'.strtotime(date("Y-m-d H:i:s")))));
	}
	else
	{
		$fbsj=time();
		$jieguo=$fbsj-$fbsjc;
		if ($jieguo>="10")
		{
			mysql_close($con);
			exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'�������������ʧЧ����������������Ĳ�����'.$fbsjc."���ڵ�ʱ�����".$fbsj."���ֵ��".$jieguo)));
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
								exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s"))."����������û�ID:".$row['id'] ."حʱ��꣺".$row['zxsjc']." ����ʱ��:".$row['cathy_dqsj'] ."ح��¼�ɹ����������ݣ�".$fanhui['shujua']."�������".strtotime(date("Y-m-d H:i:s")))));
							}
							else
							{
								mysql_close($con);
								exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'����������˺Ź������������'.strtotime(date("Y-m-d H:i:s")))));
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
									exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s"))."����������û�ID:".$row['id'] ."حʱ��꣺".$row['zxsjc']." ����ʱ��:".$row['cathy_dqsj'] ."ح��¼�ɹ����������ݣ�".$fanhui['shujua']."�������".strtotime(date("Y-m-d H:i:s")))));
								}
								else
								{
									mysql_close($con);
									exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'����������˺Ź������������'.strtotime(date("Y-m-d H:i:s")))));
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
										exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s"))."����������û�ID:".$row['id'] ."حʱ��꣺".$row['zxsjc']." ����ʱ��:".$row['cathy_dqsj'] ."ح��¼�ɹ����������ݣ�".$fanhui['shujua']."�������".strtotime(date("Y-m-d H:i:s")))));
									}
									else
									{
										mysql_close($con);
										exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'����������˺Ź������������'.strtotime(date("Y-m-d H:i:s")))));
									}
								}
								else
								{
									if(strtotime($row['xcdlsj'])>= strtotime($time)) 
									{
										mysql_close($con);
										exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s"))."���������ϵͳ��ֹ".$fanhui['jiqimapd']."�������ڲ�ͬ�������е�¼�����������".strtotime(date("Y-m-d H:i:s")))));
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
											exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s"))."����������û�ID:".$row['id'] ."حʱ��꣺".$row['zxsjc']." ����ʱ��:".$row['cathy_dqsj'] ."ح��¼�ɹ����������ݣ�".$fanhui['shujua']."�������".strtotime(date("Y-m-d H:i:s")))));
										}
										else
										{
											mysql_close($con);
											exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'����������˺Ź������������'.strtotime(date("Y-m-d H:i:s")))));
										}
									}
								}
							}
						}
					}
					else
					{
						mysql_close($con);
						exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'�����������½�˺�����������������'.strtotime(date("Y-m-d H:i:s")))));
					}
				}
				else
				{
					mysql_close($con);
					exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'��������������û�������ֹ��½,����ϵ�������������'.strtotime(date("Y-m-d H:i:s")))));
				}
			}
			else
			{
				mysql_close($con);
				exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'�������������IP����ֹ��½,����ϵ�������������'.strtotime(date("Y-m-d H:i:s")))));
			}
		}
	}
}
else
{
	mysql_close($con);
	exit(stringToHex(rc4($aqmy,strtotime(date("Y-m-d H:i:s")).'���������������ܱ��ƽ����������'.strtotime(date("Y-m-d H:i:s")))));
}
?>