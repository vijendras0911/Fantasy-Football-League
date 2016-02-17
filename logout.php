<?php
session_start();
if(isset($_SESSION['uid']))
{
session_destroy();
}
$redirectUrl = "http://localhost/fffl/index.php";
        echo "<script type=\"text/javascript\">";
        echo "alert(\"LOG OUT SUCCESSFULL.\");";
        echo "window.location.href = '$redirectUrl'";
        echo "</script>";
?>