<?php
require_once("include/connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upadate database</title>
</head>

<body>
<?php

$name=$_POST["player_name"];
$team=$_POST["player_team"];
$price=$_POST["player_price"];
$cat=$_POST["category"];     

mysql_query("insert into player (pname,team,category,price) values('".$name."','".$team."','".$cat."','".$price."')") or die('error inserting');

echo "inserted";

?>
</body>
</html>