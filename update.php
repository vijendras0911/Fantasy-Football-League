<?php
require_once("include/connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

$name1=$_POST["player_name1"];
$team1=$_POST["player_team1"];
$price1=$_POST["player_price1"];  

mysql_query("UPDATE player SET price='".$price1."',team='".$team1."' WHERE pname='".$name1."'") or die('error updating');

echo "updated";

?>
</body>
</html>