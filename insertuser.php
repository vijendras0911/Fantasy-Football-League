<?php
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$uname=$_POST["uname"];
$password=$_POST["pass"];
$tname=$_POST["teamname"];

session_start();

if(isset($_SESSION['views']))
$_SESSION['views']=$_SESSION['views']+1;
else
$_SESSION['views']=1;


require_once("include/connection.php");
require_once("include/functions.php");

mysql_query("insert into user (Fname,Lname,username,password,teamname) values('".$fname."','".$lname."','".$uname."','".$password."','".$tname."')") or die('error inserting');

if(isset($_SESSION['uid'])!=true)
{
$result = mysql_query("select * from user where username='".$uname."'");
$row = mysql_fetch_array($result);
$_SESSION['uid']=$row['uid'];
}
?>
<?php
require_once("header2.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<div id="register">
Welcome,<?php echo $uname; ?>
<a href="teamselection.php">Continue</a>
</div>
</div>
</body>
</html>