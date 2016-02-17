<?php

if(isset($_POST['logbut']))
{
	require_once("include/connection.php");
    require_once("include/functions.php");
    require_once("include/constants.php");

	$username=$_POST['uname'];
    $password=$_POST['pass'];
	
	$query1=mysql_query("select * from admin");
	$query2=mysql_fetch_array($query1);
	if($query2['username']==$username&&$query2['password']==$password)
	{
		$redirectUrl =
			"http://localhost/fffl/admin.php";
            echo "<script type=\"text/javascript\">";
            echo "window.location.href = '$redirectUrl'";
            echo "</script>";
		
	}
	else
	{
	$query=mysql_query("select * from user where
	username='".$username."'");
	$numrows=mysql_num_rows($query);
	
	if($numrows!=0)
	{
		    $row=mysql_fetch_assoc($query);
			$dbuserid=$row['uid'];
			$dbusername=$row['username'];
			$dbpassword=$row['password'];
			
			if($username==$dbusername&&$password==
			$dbpassword)
		    {
			session_start();	
			$_SESSION['uid']=$dbuserid;
			$_SESSION['views']=1;
			
			$redirectUrl =
			"http://localhost/fffl/myteam.php";
            echo "<script type=\"text/javascript\">";
            echo "window.location.href = '$redirectUrl'";
            echo "</script>";
		    }
			else
			{
			$redirectUrl = "http://localhost/fffl/index.php";
        echo "<script type=\"text/javascript\">";
        echo "alert(\"INCORRECT USERNAME OR PASSWORD.\");";
        echo "window.location.href = '$redirectUrl'";
        echo "</script>";
			}
	}
	else
	{
		$redirectUrl = "http://localhost/fffl/index.php";
        echo "<script type=\"text/javascript\">";
        echo "alert(\"INCORRECT USERNAME OR PASSWORD.\");";
        echo "window.location.href = '$redirectUrl'";
        echo "</script>";
	}
	}
}
?>
<?php
require_once("header3.php");
?>
<div id="displaytable">
<img src="images/new.jpg" width="100%" height="100%" />
<div id="maintab">
  
<div id="home">
<a href="index.php " >
<img src="images/home b.png" width="100%" height="100%" />
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

<div id="loginheader">

<form action="index.php" method="post" style="color:#FFF" id="log" name="log">
User Name: <input type="text" name="uname" />
Password: <input type="password" name="pass" />
<input type="submit" style="background-color:#FFF" value="LOGIN" name="logbut" id="logbut"/>
<a href="registration.php" style="color:#990"> new user ?</a>
</form>
</div>
<div id="ban" >
<img src="images/Premier-League-Preview-Manchester-United-Arse_1103954.jpg" width="50%" height="80%" hspace="47%" vspace="3%"/>

<div id="ban1" align="center" style="padding-top:2%">
<font style="text-align:justify">FOOTBALL FANTASY LEAGUE</font>
<p align="justify" style="font-weight:normal"><font style="font-size:18px">With the arrival of Football Fantasy League,your football fantasy is only going to increase.Join it now for FREE and you can win exciting prizes.</font></p> 
<a href="registration.php" style="color:#990">SIGN UP</a>
</div>
</div>
<div id="pick1">
<img src="images/hp-kit-4.png" height="46%" width="90%" hspace="5%" vspace="2%">
<center><font style="font-weight:bold">1.Pick your team</font></center>
<p align="justify" style="padding:5px">Use your budget of £100m to pick a squad of 11 players from the Premier League.</p>
<br><br>

</div>
<div id="pick2">
<img src="images/3step-2of3.png" height="46%" width="90%" hspace="5%" vspace="2%">
<center><font style="font-weight:bold">2.Compete in global league</font></center>
<p align="justify" style="padding:5px">PLaying in FFL gives an oportunity to compete with players from all over the globe.</p>
</div>
<div id="pick3">
<img src="images/3step-3of3.png" height="46%" width="90%" hspace="5%" vspace="2%">
<center><font style="font-weight:bold">3.Pick your team each week</font></center>
<p align="justify" style="padding:5px">Pick your starting 11 each Gameweek by using ur transfers option.</p>
</div>
<div id="prize">
<center><font style="font-weight:bold">Great prizes up for grabs</font></center>
<img src="images/home-extra.jpg" height="65%" width="30%"  vspace="9px"
 hspace="10px%" />
 <div id="prize1">
 Play FFL and win prizes like tickets to BPL matches.Also Manager of the Season will get a special prize at the end of the season.</div>
</div>


<div id="contact">
<center><font style="font-weight:bold">Contact us and Statistics</font></center>
<img src="images/stats.jpg" height="65%" width="30%"  vspace="9px"
 hspace="10px%" />
 <div id="prize1" style="padding:5px">
 For any queries on FFL,email at ffl@gmail.com.<a href="http://www.espnstar.com/football/stats-centre/" style="color:#FFF">Know more stats about the players you have selected in your team.</a> 
 </div>
</div>

</div>
</body>
</html>