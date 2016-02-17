<?php
require_once("header.php");
?>
<div id="displaytable">
<img src="images/new.jpg" width="100%" height="100%" />
<div id="maintab">
  
  
<div id="myteam">
<a href="myteam.php">
<img src="images/my team red copy.png" id="mt" name="mt" onMouseOver="document.images['mt'].src='images/my team blue copy.png'" onMouseOut="document.images['mt'].src='images/my team red copy.png'" onClick="document.images['mt'].src='images/my team blue copy.png.png'" width="100%" height="100%" />
</a>
</div>

<div id="transfers">
<a href="transfers.php " >
<img src="images/transfers b copy.png" width="100%" height="100%" />
</a>
</div>

<div id="rankings">
<a href="ranking.php">
<img src="images/rank r copy.png" id="rnk" name="rnk" onMouseOver="document.images['rnk'].src='images/rank b copy.png'" onMouseOut="document.images['rnk'].src='images/rank r copy.png'" onClick="document.images['rnk'].src='images/rank b copy.png.png'" width="100%" height="100%" />
</a>
</div>

<div id="rules">
<a href="rules.php " >
<img src="images/rules r copy.png" id="rul" name="rul" onMouseOver="document.images['rul'].src='images/rules b copy.png'" onMouseOut="document.images['rul'].src='images/rules r copy.png'" onClick="document.images['rul'].src='images/rules b copy.png.png'" width="100%" height="100%" />
</a>
</div>

<div id="fixtures">
<a href=" fixtures1.php" >
<img src="images/fix r copy.png" id="fi" name="fi" onMouseOver="document.images['fi'].src='images/fix b copy.png'" onMouseOut="document.images['fi'].src='images/fix r copy.png'" onClick="document.images['fi'].src='images/fix b copy.png.png'" width="100%" height="100%" />
</div>

<div id="logout">
<a href="aboutus1.php" >
<img src="images/abt r copy.png" id="abt" name="abt" onMouseOver="document.images['abt'].src='images/abt b copy.png'" onMouseOut="document.images['abt'].src='images/abt r copy.png'" onClick="document.images['abt'].src='images/abt b copy.png.png'" width="100%" height="100%" />
</a>
</div>

</div>
<?php
if(isset($_POST['confirm']))
{
$admin1=mysql_query("select * from admin");
$ad1=mysql_fetch_array($admin1);
if($ad1['transfers']==1)
{
	
$count=1;
$tv=0;
$td=0;
while($count<=11)
{
	if($_POST['s'.$count.'']!="None")
	{
		$pname=$_POST['s'.$count.''];
		$up=mysql_query("select * from player where
		pname='".$pname."'");
		$row1=mysql_fetch_array($up);
		$tv=$tv+$row1['price'];
		
		$ol=mysql_query("select * from  selects where
		uid='".$_SESSION['uid']."' and pnum='".$count."'");
		$ol1=mysql_fetch_array($ol);
		
		$old=mysql_query("select * from player where
		pid='".$ol1['pid']."'");
		$old1=mysql_fetch_array($old);
		$tv=$tv-$old1['price'];
		
		mysql_query("UPDATE selects SET pid='".$row1['pid'].
		"' WHERE uid='".$_SESSION['uid']."' and pnum='".
		$count."'") or die('error updating');
		$td++;
	}
	$count++;
}
$result3 = mysql_query("select * from user where uid='".$_SESSION['uid']."'");
$row3= mysql_fetch_array($result3);
$tv1=$row3['teamvalue']+$tv;
$br=$row3['budgetrem']-$tv;

$admin=mysql_query("select * from admin");
$ad=mysql_fetch_array($admin);
if($ad['gw']==1)
{
mysql_query("UPDATE user set teamvalue='".$tv1."',budgetrem='".$br."' where uid='".$_SESSION['uid']."'") or die('error updating');
}
else
{
	if($td<=$row3['transfersrem'])
	{
		$tr=$row3['transfersrem']-$td;
		mysql_query("UPDATE user set teamvalue='".$tv1."',budgetrem='".$br."',transfersrem='".$tr."' where uid='".$_SESSION['uid']."'") or die('error updating');
		
	}
	else
	{
		$tp=5*($td-$row3['transfersrem']);
		$points=$row3['total']-$tp;
		$tp1=$row3['transpen']+$tp;
		mysql_query("UPDATE user set teamvalue='".$tv1."',budgetrem='".$br."',transfersrem='0',total='".$points."',transpen='".$tp1."' where uid='".$_SESSION['uid']."'") or die('error updating');
	}
}

$redirectUrl = "http://localhost/fffl/myteam.php";
echo "<script type=\"text/javascript\">";
echo "window.location.href = '$redirectUrl'";
echo "</script>";
}
else
{
	
	echo "<script type=\"text/javascript\">";
echo "alert(\"DEADLINE HAS PASSED.TRANSFERS HAVE BEEN DISABLED.\");";
echo "</script>";
}
}


$display=mysql_query("select * from  selects where uid='".$_SESSION['uid']."' order by pnum");
?>


<div id="teamname" style="padding-top:4px">
<?php
$admin=mysql_query("select * from admin");
$ad = mysql_fetch_array($admin);
$result = mysql_query("select * from user where uid='".$_SESSION['uid']."'");
$row = mysql_fetch_array($result);
echo $row['teamname']." (Gameweek ".$ad['gw'].")";
?>
</div>
<form action="transfers.php" method="post" name="form">
<div id="pitch">  
<img src="images/download.png" height="100%" width="100%" />

<div id="gk">
  <div id="gk1"><?php require("transfer_code.php");?></div>
</div>
  
  <div id="def">
    <div id="def1"><?php require("transfer_code.php");?></div>
    <div id="def2"><?php require("transfer_code.php");?></div>
    <div id="def3"><?php require("transfer_code.php");?></div>
    <div id="def4"><?php require("transfer_code.php");?></div>
  </div>
  
  <div id="mf">
    <div id="mf1"><?php require("transfer_code.php");?></div>
    <div id="mf2"><?php require("transfer_code.php");?></div>
    <div id="mf3"><?php require("transfer_code.php");?></div>
    <div id="mf4"><?php require("transfer_code.php");?></div>
  </div>
  
  <div id="fwd">
    <div id="fwd1"><?php require("transfer_code.php");?></div>
    <div id="fwd2"><?php require("transfer_code.php");?></div>
    </div>
</div>
<div id="regbut1">
Conform button appears if transfer conditions are satisfied
<input type="submit" value="Confirm Transfers" name="confirm" id="confirm" />
</div>
</form>
<div id="playersdisplay">
<div id="pdhead">
<form name="form1" style="padding-top:6%">
PLAYERS SORT BY:<select id="pdselect" name="pdselect" onchange="getOptions();">
<option>None</option>
<option>MUN</option>
<option>MNC</option>
<option>ARS</option>
<option>CHE</option>
<option>TOT</option>
<option>NOR</option>
<option>Points</option>
</select>
</form>
</div>
<div id="pdbody">
<table id="pdtable" width="100%" border="1px" cellspacing="0px" height="100%">
</table>
</div>

</div>

<div id="up1" align="center">COST</div>
<div id="up2" align="center">BANK</div>
<div id="up3" align="center">TRASFERS DONE</div>
<div id="up4" align="center">FREE TRANSFER</div>
<div id="teamval">
<?php echo $row['teamvalue']; ?>
</div>

<div id="inbank">
<?php echo $row['budgetrem']; ?>
</div>

<div id="transdone">
0
</div>

<div id="transrem">
<?php
$admin2=mysql_query("select * from admin");
$ad2=mysql_fetch_array($admin2);
if($ad2['gw']!=1)
{
echo $row['transfersrem'];
}
else
{
echo '<font size="+2">UNLIMITED</font>';
}?>
</div>
</div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$('#confirm').hide();
</script>
</body>
</html>
