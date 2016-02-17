<link rel="stylesheet" type="text/css" href="css/navigation.css" />
<link rel="stylesheet" type="text/css" href="css/fixtures_tables.css" />

<?php
require("include/connection.php");
require("include/functions.php");

if(isset($_POST['gw']))
{
mysql_query("UPDATE admin SET gw='".$_POST['gws']."'") or die('error updating');

}

if(isset($_POST['update']))
{
	echo "in Update";
//fetch game week
$gameweek=mysql_query("select * from  admin");
$row=mysql_fetch_array($gameweek);

//player points update

$count=1;
while($count<=11)
{
	if($_POST[''.$count.'']!="None")
	{
		mysql_query("UPDATE player SET pgw".$row['gw']."='".$_POST['p'.$count.'']."' WHERE pname='". $_POST[''.$count.'']."'") or die('error updating');
	echo $_POST[''.$count.'']." updated";	
	
	$x=mysql_query("select * from player where pname='". $_POST[''.$count.'']."'");
	$y=mysql_fetch_array($x);
	$gt=$y['pgw1']+$y['pgw2']+$y['pgw3']+$y['pgw4']+$y['pgw5'];
	mysql_query("UPDATE player SET ptotal='".$gt."' WHERE pname='". $_POST[''.$count.'']."'") or die('error updating');
	}
	$count++;
}
}

if(isset($_POST['insert']))
{
$name=$_POST["player_name"];
$team=$_POST["player_team"];
$price=$_POST["player_price"];
$cat=$_POST["category"];   
$class=$_POST["class"];
$status=$_POST["status"];  

mysql_query("insert into player (pname,team,category,price,class,status) values('".$name."','".$team."','".$cat."','".$price."','".$class."','".$status."')") or die('error inserting');

echo "inserted";


}
if(isset($_POST['transbut']))
{
	if($_POST['transfer']=="Enable")
	$te=1;
	else
	$te=0;
mysql_query("UPDATE admin SET transfers='".$te."'") or die('error updating');
}

if(isset($_POST['upoints']))
{
	echo "in upoints";
//fetch game week
$gameweek=mysql_query("select * from  admin");
$row=mysql_fetch_array($gameweek);

$result=mysql_query("select * from user ")	;
while($row1=mysql_fetch_array($result))
{
echo $row1['uid']."  ";
//fetch his players pid
$result1=mysql_query("select * from selects where uid='".$row1['uid']."'");

$points=0;
while($row2=mysql_fetch_array($result1)) 
{
	//fetch the player
	$var1=mysql_query("select * from player where pid='".$row2['pid'].
	"'");
	$var=mysql_fetch_array($var1);
	echo $var['pname']."".$var['pgw'.$row['gw']]."  ";
$points=$points+$var['pgw'.$row['gw']];
}

echo $points."  " ;
mysql_query("UPDATE user SET gw".$row['gw']."='".$points."' where uid='".$row1['uid']."'") or die('error updating');
}

$result3=mysql_query("select * from user ")	;
while($row3=mysql_fetch_array($result3))
{
$points1=0;
$points1=$row3['gw1']+$row3['gw2']+$row3['gw3']+$row3['gw4']+$row3['gw5']-$row3['transpen'];
echo $points1;
mysql_query("UPDATE user SET total='".$points1."' where uid='".$row3['uid']."'") or die('error updating');
}
}

if(isset($_POST['urank']))
{
	echo "in Rank ";
$c=1;
$u=mysql_query("select * from user order by total desc ");
while($v=mysql_fetch_array($u))
{
mysql_query("UPDATE user SET rank='".$c."' where uid='".$v['uid']."'") or die('error updating');
$c++;
}
}
if(isset($_POST['status']))
{
	if($_POST['plyr']!="None")
	{
	mysql_query("UPDATE player set status='".$_POST['pstat']."' where pname='".$_POST['plyr']."'") or die('error updating');
	}
}
?>
<html>
<head></head>
<body>
<div id="header">
<img src="images/newbanner.png" width="100%" height="100%" /> 
</div>
<div id="dispadmin" align="center">
<hr>
<!--/////////////////////////////////////////////////-->
<p align="center"><?php
$gameweek=mysql_query("select * from  admin");
$row=mysql_fetch_array($gameweek);
echo "Gameweek ".$row['gw'];
?></p>
<hr>
<!--/////////////////////////////////////////////////-->
USERS:
<table align="center" border="1px" cellspacing="0px" width="100%" style="color:#FFF">
<?php
$gplayers=mysql_query("select * from user order by rank");

echo '<tr><th>UID</th><th>Username</th><th>Rank</th><th>Team Name</th><th>Manager</th><th>Total Points</th></tr>';
while($grow=mysql_fetch_assoc($gplayers))
{
	echo '<tr><td align="center">'.$grow['uid'].'</td><td align="center">'.$grow['username'].'</td><td align="center">'.$grow['rank'].'</td><td align="center">'.$grow['teamname'].'</td><td align="center">'.$grow['fname'].' '.$grow['lname'].'</td><td align="center">'.$grow['total'].'</td></tr>';
}
?>
</table><br>
<hr>
<!--/////////////////////////////////////////////////-->
<form  method="post" action="admin.php">
Change Gameweek=
<select name="gws">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
 </select>
 <input type="submit" value="Change" name="gw"/>
</form>
<hr>
<!--/////////////////////////////////////////////////-->
UPDATE PLAYER STATUS:
<form method="post" action="admin.php">
Player:<select name="plyr">
<option>None</option>
 <?php 
 $display9=mysql_query("select * from  player");
 while($row9=mysql_fetch_array($display9))
{
	echo "<option>".$row9['pname']."</option>";
}
 ?>
</select>
<select name="pstat">
<option>fit</option>
<option>doubtful</option>
<option>injured</option>
</select>
<input type="submit" name="status" value="UPDATE STATUS" />
</form>
<hr>
 <!--/////////////////////////////////////////////////-->
UPDATE PLAYER POINTS:
<?php
 $i=1;
 while ($i<=11)
 {
?>
<form method="post" action="admin.php">
 Player: <select name="<?php echo $i; ?>"> 
 
 <option>None</option>
 <?php 
 $display2=mysql_query("select * from  player");
 while($row2=mysql_fetch_array($display2))
{
	echo "<option>".$row2['pname']."</option>";
}
 ?>
</select>
 Points:<input type="text" name="<?php echo "p".$i; ?>"/>
 <br>
<?php
 $i=$i+1;
 }
?>  
 <input type="submit" value="Update" name="update"/>
  </form>
<hr>
<!--/////////////////////////////////////////////////-->
<form action="admin.php " method="post">
<input type="submit" value="UPDATE USER POINTS" name="upoints" />
</form>
<hr>
<!--/////////////////////////////////////////////////-->
<form action="admin.php" method="post">
<input type="submit" value="UPDATE USER RANK" name="urank"/>
</form>
<hr>
<!--/////////////////////////////////////////////////-->  
INSERT PLAYER:<br>
<form  method="post" action="admin.php">
Name: <input type ="text" name="player_name"/>
Team: <input type ="text" name="player_team"/>
Price: <input type ="text"  name="player_price"/>
Category: <input type ="text"  name="category"/>
Class: <input type ="text"  name="class"/>
Status:  <select name="status">
<option>fit</option>
<option>doubtful</option>
<option>injured</option>
 </select>
<input type="submit" value="Insert" name="insert" />
<br>
</form>
<hr>
<!--/////////////////////////////////////////////////-->
TRANSFERS :
<form method="post" action="admin.php">
<select name="transfer">
<option>Enable</option>
<option>Disable</option>
</select>
<input type="submit" value="Change" name="transbut" />
</form>
<hr>
<!--/////////////////////////////////////////////////-->
<form action="index.php">
<input type="submit" value="LOGOUT"/>
</form>
</div>
</body>
</html>