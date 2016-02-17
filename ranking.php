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
<img src="images/transfers r copy.png" id="tr" name="tr" onMouseOver="document.images['tr'].src='images/transfers b copy.png'" onMouseOut="document.images['tr'].src='images/transfers r copy.png'" onClick="document.images['tr'].src='images/transfers b copy.png.png'" width="100%" height="100%" />
</a>
</div>

<div id="rankings">
<a href="ranking.php">
<img src="images/rank b copy.png"  width="100%" height="100%" />
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
<font  size="+1">
<div id="ranks">
<table align="center" border="1px" cellspacing="0px" width="100%">
<?php
$gplayers=mysql_query("select * from user order by rank");

echo '<tr><th>Rank</th><th>Team Name</th><th>Manager</th><th>Total Points</th></tr>';
while($grow=mysql_fetch_assoc($gplayers))
{
	echo '<tr><td align="center">'.$grow['rank'].'</td><td align="center">'.$grow['teamname'].'</td><td align="center">'.$grow['fname'].' '.$grow['lname'].'</td><td align="center">'.$grow['total'].'</td></tr>';
}
?>
</table>
</div>

</div>
</body>
</html>