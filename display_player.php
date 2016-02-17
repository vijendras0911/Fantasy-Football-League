<?php
if($id==1)
{
$display2=mysql_query("select * from  player where category='gk' and pid not in(select pid from selects where uid='".$_SESSION['uid']."')");
echo "<option>None</option>";
while($row2=mysql_fetch_array($display2))
{
	echo "<option>".$row2['pname']."</option>";
}
}

if($id==2||$id==3||$id==4||$id==5)
{
$display2=mysql_query("select * from  player where category='def' and pid not in(select pid from selects where uid='".$_SESSION['uid']."')");
echo "<option>None</option>";
while($row2=mysql_fetch_array($display2))
{
	echo "<option>".$row2['pname']."</option>";
}
}

if($id==6||$id==7||$id==8||$id==9)
{
$display2=mysql_query("select * from  player where category='mid' and pid not in(select pid from selects where uid='".$_SESSION['uid']."')");
echo "<option>None</option>";
while($row2=mysql_fetch_array($display2))
{
	echo "<option>".$row2['pname']."</option>";
}
}

if($id==10||$id==11)
{
$display2=mysql_query("select * from  player where category='fwd' and pid not in(select pid from selects where uid='".$_SESSION['uid']."')");
echo "<option>None</option>";
while($row2=mysql_fetch_array($display2))
{
	echo "<option>".$row2['pname']."</option>";
}
}
?>