<?php
require_once("header.php");
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
		
		mysql_query("UPDATE selects SET pid='".$row1['pid'].
		"' WHERE uid='".$_SESSION['uid']."' and pnum='".$count.
		"'") or
		 die('error updating');
		 echo $_POST[''.$count.'']." transfered in<br>";
	}
	$count++;
}
?>
Go to My Team Page to view your Updated Line up
</div>
</div>