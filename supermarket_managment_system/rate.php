<html>
<body>
<?php
$host="localhost";
$username="rahman";
$password="653201";
$db_name="s_market";

mysql_connect("$host", "$username", "$password")or die("cannot connect to the DB");
mysql_select_db("$db_name")or dir("connot select DB");
mysql_query("set names utf8");

$sql="SELECT `good_list`.`barcode` FROM `good_list` ";
$result1=mysql_query($sql);
if($result1 == FALSE) echo 'query faild';
//����good_list�е�����rate����û����Ʒ


while($row=mysql_fetch_assoc($result1))
{
$barcode=$row['barcode'];

if(mysql_num_rows(mysql_query("SELECT `rate`.`barcode` FROM `rate` WHERE `rate`.`barcode` = '$barcode'"))==0)
{echo $barcode . '<br />';
$sql="INSERT INTO `rate`(`barcode`, `count`) VALUES ('$barcode',0);";
$result2=mysql_query($sql);
if($result2 == FALSE) echo 'query faild2';
}
}//�ѵ���������Ʒ�ŵ�rate��

$sql="SELECT `record`.`barcode` FROM `record` WHERE 1";
$result3=mysql_query($sql);
if($result3 == FALSE) echo 'query faild3';
//record�е�data����������rate���

while($row=mysql_fetch_assoc($result3))
{
$barcode=$row['barcode'];
if(mysql_num_rows(mysql_query("SELECT * FROM `rate` WHERE `rate`.`barcode` = '$barcode'"))>=1)
{
$sql="UPDATE `rate` SET `count`=`count`+1 WHERE `rate`.`barcode` = '$barcode'";
$result4=mysql_query($sql);
if($result4 == FALSE) echo 'query faild4';
}
}
//���count��ֵ


echo '<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><center><h1>���а���³ɹ���</h1></center>';
echo 
'<form name="tiaozhuan" action="cashier_login.php">
<center><input type="submit" value="��ת������ģʽ"></center>
</form>';
?>

</body>
</html>