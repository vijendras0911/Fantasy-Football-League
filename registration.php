<?php
require_once("header3.php");
?>
<div id="displaytable">
<img src="images/new.jpg" width="100%" height="100%" />
<div id="maintab">
  
<div id="home">
<a href="index.php " >
<img src="images/home r.png" id="hom" name="hom" onMouseOver="document.images['hom'].src='images/home b.png'" onMouseOut="document.images['hom'].src='images/home r.png'" onClick="document.images['hom'].src='images/home b.png'" width="100%" height="100%" />
</a>
</div>  


<div id="rules1">
<a href="rules1.php " >
<img src="images/rules large r.png" id="rul1" name="rul1" onMouseOver="document.images['rul1'].src='images/rules large b.png'" onMouseOut="document.images['rul1'].src='images/rules large r.png'" onClick="document.images['rul1'].src='images/rules large b.png'" width="100%" height="100%" />
</a>
</div>

<div id="fixtures1">
<a href=" fixtures2.php" >
<img src="images/fix large r.png" id="fi1" name="fi1" onMouseOver="document.images['fi1'].src='images/fix large b.png'" onMouseOut="document.images['fi1'].src='images/fix large r.png'" onClick="document.images['fi1'].src='images/fix large b.png'" width="100%" height="100%" />
</a>
</div>

<div id="about">
<a href="aboutus.php" >
<img src="images/abt large r.png" id="abt1" name="abt1" onMouseOver="document.images['abt1'].src='images/abt large b.png'" onMouseOut="document.images['abt1'].src='images/abt large r.png'" onClick="document.images['abt1'].src='images/abt large b.png'" width="100%" height="100%" />
</a>
</div>

</div>
<div id="displaytable2">
<img src="images/new.jpg" width="100%" height="100%" />
<?php
if(isset($_POST['regit']))
{
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$uname=$_POST["uname"];
$password=$_POST["pass"];
$password1=$_POST["pass1"];
$tname=$_POST["teamname"];

$query=mysql_query("select * from user where
username='".$uname."'");
$numrows=mysql_num_rows($query);

if($fname==""||$lname==""||$uname==""||$password==""||$password1==""||$tname=="")
{
	echo "<script type=\"text/javascript\">";
echo "alert(\"ENTER ALL FIELDS.\");";
echo "</script>";
}
else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fname)||preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lname)||preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $uname)||preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $tname))
{
	echo "<script type=\"text/javascript\">";
echo "alert(\"SPECIAL CHARACTERS ARE NOT ALLOWED.\");";
echo "</script>";
}
else if($password!=$password1)
{
	echo "<script type=\"text/javascript\">";
echo "alert(\"PASSWORD CONFIRMATION INCORRECT.\");";
echo "</script>";
}
else if($numrows!=0)
{
	echo "<script type=\"text/javascript\">";
echo "alert(\"THIS USER NAME IS NOT AVAILABLE.\");";
echo "</script>";
}
else
{
mysql_query("insert into user (Fname,Lname,username,password,teamname) values('".$fname."','".$lname."','".$uname."','".$password."','".$tname."')");

$result = mysql_query("select * from user where username='".$uname."'");
$row = mysql_fetch_array($result);

$count=1;
$tv=0;
while($count<=11)
{
	if($_POST['s'.$count.'']!="None")
	{
		$pname=$_POST['s'.$count.''];
		$up=mysql_query("select * from player where
		pname='".$pname."'");
		$row1=mysql_fetch_array($up);
		
		mysql_query("INSERT INTO selects values('".$row
		['uid']."','".$row1['pid']."','".$count."')") or
		 die('error updating');
		 $tv=$tv+$row1['price'];
	}
	$count++;
}
$br=100-$tv;
mysql_query("UPDATE user set teamvalue='".$tv."',budgetrem='".$br."' where username='".$uname."'") or die('error updating');

$redirectUrl = "http://localhost/fffl/index.php";
echo "<script type=\"text/javascript\">";
echo "alert(\"Your Registration has been Confirmed.\");";
echo "window.location.href = '$redirectUrl'";
echo "</script>";
}
}
?>


<form method="post" action="registration.php" name="form" >
<div id="register" style="padding-left:10px">
<table border="0" height="100%" width="100%" cellspacing="0px">
<tr><td>First Name:</td><td> <input maxlength="10" type="text" name="fname" value="<?php if(isset($_POST['regit']))
{
	echo $_POST['fname'];
}
else
{
	echo "";
}?>" /><font style="font-style:oblique"><font style="font-size:9px">(should be less than 10 letters)</font></font></td></tr>

<tr><td>Last Name:</td><td> <input maxlength="10" type="text" name="lname" value="<?php if(isset($_POST['regit']))
{
	echo $_POST['lname'];
}
else
{
	echo "";
}?>" /><font style="font-style:oblique"><font style="font-size:9px">(should be less than 10 letters)</font></font></td></tr>

<tr><td>User Name:</td><td> <input maxlength="10" type="text" name="uname" value="<?php if(isset($_POST['regit']))
{
	echo $_POST['uname'];
}
else
{
	echo "";
}?>" /><font style="font-style:oblique"><font style="font-size:9px">(should be less than 10 letters)</font></font></td></tr>

<tr><td>Password:</td><td> <input maxlength="10" type="password" name="pass" /><font style="font-style:oblique"><font style="font-size:9px">(should be less than 10 letters)</font></font></td></tr>

<tr><td>Conform Password:</td><td> <input maxlength="10" type="password" name="pass1" /><font style="font-style:oblique"><font style="font-size:9px">(should be less than 10 letters)</font></font></td></tr>

<tr><td>Team Name:</td><td> <input maxlength="20" type="text" name="teamname" value="<?php if(isset($_POST['regit']))
{
	echo $_POST['teamname'];
}
else
{
	echo "";
}?>" /><font style="font-style:oblique"><font style="font-size:9px">(should be less than 20 letters)</font></font></td></tr>
</table>
</div>
<div id="textreg">
REGISTRATION & TEAM SELECTION
</div>
<div id="inbank1">100</div>
<div id="teamval1">0</div>
<div id="up5" align="center">COST</div>
<div id="up6" align="center">BANK</div>
<div id="reginfo">
<table border="1px" cellspacing="0px" width="100%" align="center" height="100%">
<tr><td align="left"><img src="images/injured.png"/> - INJURED<br><img src="images/doubtful.png" /> - DOUBTFUL<br><img src="images/fit.png" /> - FIT</td></tr>
</table>
</div>
<div id="pitch1">
  
<img src="images/download.png" height="100%" width="100%" />

<div id="gk">
  <div id="gk1"><?php require("teamselection_code.php");?></div>
</div>
  
  <div id="def">
    <div id="def1"><?php require("teamselection_code.php");?></div>
    <div id="def2"><?php require("teamselection_code.php");?></div>
    <div id="def3"><?php require("teamselection_code.php");?></div>
    <div id="def4"><?php require("teamselection_code.php");?></div>
  </div>
  
  <div id="mf">
    <div id="mf1"><?php require("teamselection_code.php");?></div>
    <div id="mf2"><?php require("teamselection_code.php");?></div>
    <div id="mf3"><?php require("teamselection_code.php");?></div>
    <div id="mf4"><?php require("teamselection_code.php");?></div>
  </div>
  
  <div id="fwd">
    <div id="fwd1"><?php require("teamselection_code.php");?></div>
    <div id="fwd2"><?php require("teamselection_code.php");?></div>
    </div>
</div>

<div id="regbut">Register button will appear after all players are selected 
<input type="submit" value="Register" name="regit" id="regit" />
</div></form>

<div id="playersdisplay1">
<div id="pdhead">
<form style="padding-top:6%" name="form1">
PLAYERS SORT BY:<select id="pdselect" onchange="getOptions()">
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
</div>
</div>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$('#regit').hide();
</script>

</body>
</html>