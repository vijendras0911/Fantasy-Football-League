<?php
require_once("include/connection.php");
require_once("include/functions.php");

$display=mysql_query("select * from  selects where uid='".$_POST['uid']."' order by pnum");

$b=0;
while($row1=mysql_fetch_array($display))
{
$display1=mysql_query("select * from  player where pid='".$row1['pid']."'");
$row2=mysql_fetch_array($display1);
$b=$b+$row2['price'];
}
$c=1;
while($c<=11)
{
	if($_POST[''.$c.'']!="None")
	{
	$old=mysql_query("select * from  player where pid 
	in(select pid from  selects where uid='".$_POST['uid'].
	"' and pnum='".$c."')");
	$rold=mysql_fetch_array($old);
	$b=$b-$rold['price'];
	
	$result=mysql_query("select * from player where pname='"
	.$_POST[''.$c.'']."'");
	$r=mysql_fetch_array($result);
	$temp=$r['price'];
	$b=$b+$temp;
	}
	$c++;
}
echo $b;
?>