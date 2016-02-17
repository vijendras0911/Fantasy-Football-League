<?php
require_once("header.php");
?>
<div id="displaytable">
<img src="images/new.jpg" width="100%" height="100%" />
<div id="maintab">
  
  
<div id="myteam">
<a href="myteam.php">
<img src="images/my team blue copy.png" height="100%" width="100%" />
</a>
</div>

<div id="transfers">
<a href="transfers.php " >
<img src="images/transfers r copy.png" id="tr" name="tr" onMouseOver="document.images['tr'].src='images/transfers b copy.png'" onMouseOut="document.images['tr'].src='images/transfers r copy.png'" onClick="document.images['tr'].src='images/transfers b copy.png.png'" width="100%" height="100%" />
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

<div id="pitch">
  
<img src="images/download.png" height="100%" width="100%" />
<div id="gk">
  <div id="gk1"><?php require("include/myteam_code.php");?></div>
</div>
  
  <div id="def">
    <div id="def1"><?php require("include/myteam_code.php");?></div>
    <div id="def2"><?php require("include/myteam_code.php");?></div>
    <div id="def3"><?php require("include/myteam_code.php");?></div>
    <div id="def4"><?php require("include/myteam_code.php");?></div>
  </div>
  
  <div id="mf">
    <div id="mf1"><?php require("include/myteam_code.php");?></div>
    <div id="mf2"><?php require("include/myteam_code.php");?></div>
    <div id="mf3"><?php require("include/myteam_code.php");?></div>
    <div id="mf4"><?php require("include/myteam_code.php");?></div>
  </div>
  
  <div id="fwd">
    <div id="fwd1"><?php require("include/myteam_code.php");?></div>
    <div id="fwd2"><?php require("include/myteam_code.php");?></div>
  </div>
</div>

<div id="selection">
<font size="">
<table border="1px" cellspacing="0px" width="100%" align="center" height="100%">
<tr><td align="center">MANAGER:</td><td align="center"><?php echo $row['fname']." ".$row['lname']?></td></tr>
<tr><td align="center">USER NAME:</td><td align="center"><?php echo $row['username']?></td></tr>
<tr><td align="center">RANK:</td><td align="center"><?php echo $row['rank']?></td></tr>
<tr><td align="center">TOTAL POINTS:</td><td align="center"><?php echo $row['total']?></td></tr>
<tr><td align="center">TEAM VALUE:</td><td align="center"><?php echo $row['teamvalue']?></td></tr>
<tr><td align="center">IN THE BANK:</td><td align="center"><?php echo $row['budgetrem']?></td></tr>
</table> 
</font>
</div>
<div id="selection1">
<table border="1px" cellspacing="0px" width="100%" align="center" height="100%">
<tr><td align="center"><a href="gwpts.php" style="color:#FFF">ALL GAMEWEEK POINTS</a></td></tr>
<tr><td align="center"><img src="images/injured.png"/> - INJURED<br><img src="images/doubtful.png" /> - DOUBTFUL<br><img src="images/fit.png" /> - FIT</td></tr>
</table>

</div>
</div>

</body>
</html>

