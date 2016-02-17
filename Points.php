<?php
require_once("include/connection.php");
require_once("include/functions.php");


if($_POST['team']=="None")
{
	echo "";
}
else if($_POST['team']=="Points")
{
$gplayers=mysql_query("select * from player order by ptotal desc");

echo '<tr><th colspan="2">Name</th><th>Team</th><th>Category</th><th>Price</th><th>Points</th></tr>';
while($grow=mysql_fetch_assoc($gplayers))
{
	echo '<tr><td><img src="images/'.$grow['status'].'.png" height="100%" width="90%"/></td><td>'.$grow['pname'].'</td><td>'.$grow[
	'team'].'</td><td>'.$grow['category'].'</td><td>'.$grow[
	'price'].'</td><td>'.$grow
	['ptotal'].'</td></tr>';
}
}
else
{
$gplayers=mysql_query("select * from player where team='".$_POST['team']."' order by class");

echo '<tr><th colspan="2">Name</th><th>Team</th><th>Category</th><th>Price</th><th>Points</th></tr>';
while($grow=mysql_fetch_assoc($gplayers))
{
	echo '<tr><td><img src="images/'.$grow['status'].'.png" height="100%" width="90%"/></td><td>'.$grow['pname'].'</td><td>'.$grow[
	'team'].'</td><td>'.$grow['category'].'</td><td>'.$grow[
	'price'].'</td><td>'.$grow
	['ptotal'].'</td></tr>';
}
}
?>