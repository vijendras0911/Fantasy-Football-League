<?php
require("include/connection.php");
require("include/functions.php");

if(isset($_POST['gw']))
{
mysql_query("UPDATE admin SET gw='".$_POST['gws']."'") or die('error updating');

}

if(isset($_POST['update']))
{
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

//fetch user
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

$points1=0;
$points1=$row1['gw1']+$row1['gw2']+$row1['gw3']+$row1['gw4']+$row1['gw5'];
echo $points1;
mysql_query("UPDATE user SET total='".$points1."' where uid='".$row1['uid']."'") or die('error updating');
}
$c=1;
$u=mysql_query("select * from user order by total ");
while($v=mysql_fetch_array($u))
{
mysql_query("UPDATE user SET rank='".$c."' where uid='".$v['uid']."'") or die('error updating');
$c++;
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
?>
<html>
<head></head>
<body>
<p align="center"><?php
$gameweek=mysql_query("select * from  admin");
$row=mysql_fetch_array($gameweek);
echo "Gameweek ".$row['gw'];
?></p>
USERS:

<table align="center" border="1px" cellspacing="0px" width="100%">
<?php
$gplayers=mysql_query("select * from user order by rank");

echo '<tr><th>UID</th><th>Username</th><th>Rank</th><th>Team Name</th><th>Manager</th><th>Total Points</th></tr>';
while($grow=mysql_fetch_assoc($gplayers))
{
	echo '<tr><td align="center">'.$grow['uid'].'</td><td align="center">'.$grow['username'].'</td><td align="center">'.$grow['rank'].'</td><td align="center">'.$grow['teamname'].'</td><td align="center">'.$grow['fname'].' '.$grow['lname'].'</td><td align="center">'.$grow['total'].'</td></tr>';
}
?>
</table><br>

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
 
UPDATE PLAYER
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
  
<form  method="post" action="admin.php">
INSERT PLAYER<br>
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
<form method="post" action="admin.php">
Transfer :
<select name="transfer">
<option>Enable</option>
<option>Disable</option>
</select>
<input type="submit" value="Change" name="transbut" />
</form>
<form action="index.php">
<input type="submit" value="LOGOUT"/>
</form>
</body>
</html>