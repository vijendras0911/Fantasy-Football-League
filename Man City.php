<?php



$gplayers=mysql_query("select * from player where team='MNC' group by category");

echo '<tr><th>Name</th><th>Team</th><th>Category</th><th>Price</th><th>Points</th></tr>';
while($grow=mysql_fetch_assoc($gplayers))
{
	echo '<tr><td>'.$grow['pname'].'</td><td>'.$grow[
	'team'].'</td><td>'.$grow['category'].'</td><td>'.$grow[
	'price'].'</td><td>'.$grow
	['ptotal'].'</td></tr>';
}
?>