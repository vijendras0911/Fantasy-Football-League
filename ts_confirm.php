<?php
require_once("header1.php");
?>

<div id="confirm">
<?php
$count=1;
while($count<=11)
{
	if($_POST[''.$count.'']!="None")
	{
		$pname=$_POST[''.$count.''];
		$up=mysql_query("select * from player where
		pname='".$pname."'");
		$row1=mysql_fetch_array($up);
		
		mysql_query("INSERT INTO selects values('".$_SESSION
		['uid']."','".$row1['pid']."','".$count."')") or
		 die('error updating');
	}
	$count++;
}
?>
Your team has been registered
<a href="myteam.php">Continue</a>
</div>
</div>