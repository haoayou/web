<?php
include_once '../configs.php';
startl();
$link = pConnDB();
if(LoginAdmin($link)==true)
{
$c_md5 = fanSql($_GET['md5']);
$result = mysql_query("UPDATE `configs` SET `client_md5` = '$c_md5'");
echo $result;
}else{
    echo '����Ա��Ϣ����';
}
endl();
mysql_close($link);