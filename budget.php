<?php
require_once("include/connection.php");
require_once("include/functions.php");

$b=100;
$c=1;
while($c<=11)
{
	if($_POST[''.$c.'']!="None")
	{
	$result=mysql_query("select * from player where pname='"
	.$_POST[''.$c.'']."'");
	$r=mysql_fetch_array($result);
	$temp=$r['price'];
	$b=$b-$temp;
	}
	$c++;
}
echo $b;
?>