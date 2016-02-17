<?php
session_start();

if(isset($_SESSION['views']))
$_SESSION['views']=$_SESSION['views']+1;



require_once("include/connection.php");
require_once("include/functions.php");

if(isset($_SESSION['uid'])!=true)
{
$redirectUrl = "http://localhost/fffl/index.php";
        echo "<script type=\"text/javascript\">";
        echo "alert(\"LOGIN FIRST.\");";
        echo "window.location.href = '$redirectUrl'";
        echo "</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Fantasy Football League</title>
<link rel="stylesheet" type="text/css" href="css/navigation.css" />
<link rel="stylesheet" type="text/css" href="css/fixtures_tables.css" />
<link rel="stylesheet" type="text/css" href="css/newcss.css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
function get1() {
	
	var x=new Array();
	x[0]=document.form.s1.value;
	x[1]=document.form.s2.value;
	x[2]=document.form.s3.value;
	x[3]=document.form.s4.value;
	x[4]=document.form.s5.value;
	x[5]=document.form.s6.value;
	x[6]=document.form.s7.value;
	x[7]=document.form.s8.value;
	x[8]=document.form.s9.value;
	x[9]=document.form.s10.value;
	x[10]=document.form.s11.value;
	var user=<?php echo $_SESSION['uid']; ?>;
	
	$.post('transbudget.php', { uid: user,1: x[0],2: x[1],3: x[2]
	,4: x[3],5: x[4],6: x[5],7: x[6],8: x[7],9: x[8],10: x[9
	],11: x[10] },
	function (output)
	{
		var but=true;
		var tv=output;
		$('#teamval').html(tv).show();
		var num=100-tv;
		var br=num.toFixed(1);
		$('#inbank').html(br).show();
		
		var td=0;
		two:for(var k=0;k<=10;k++)
	    {
		    if(x[k]!="None")
		    {
			 td++;
		    }
	    }
		
		$('#transdone').html(td).show();
	
	if(td==0)
	but=false;
		
	one:for(var i=0;i<=10;i++)
	{
		for(var j=0;j<=10;j++)
		{
			if(i!=j&&x[i]!="None")
			{
				if(x[i]==x[j])
				{
					alert("A player is selected twice");
					but=false;
					break one;
				}
			}
		}
	}
		
		if(output>100)
		{
			alert("Budget Exceeded");
			but=false;
		}
		$('#confirm').toggle(but);
	}
	 );
	}
</script>

<!-- Script for player display on transfers.php -->
<script type="text/javascript" >
function getOptions()
{
	var x=document.form1.pdselect.value;
	
	$.post('Points.php', {team: x},
	function (output)
	{
		$('#pdtable').html(output).show();
	}
	);
}
</script>

</head>

<body>

<div id="header">
<img src="images/newbanner.png" width="100%" height="100%" /> 
</div>
<div id="horbar"><!--?php echo "Views=". $_SESSION['views']; ?-->
<div id="lo">
<a href="logout.php"><img src="images/gcjb-logout-button.png" height="100%" width="100%"/></a>
</div>
<div id="mar" style="font-weight:bold">
<marquee loop="-1"><img src="images/ea2.png" height="100%" width="7%" align="top"/> GAMEWEEK 1 DEADLINE:4 OCT 11:00 hrs <img src="images/ea2.png" height="100%" width="7%" align="top"/> GAMEWEEK 2 DEADLINE:4 OCT 11:10 hrs <img src="images/ea2.png" height="100%" width="7%" align="top"/>  GAMEWEEK 3 DEADLINE:4 OCT 11:10 hrs <img src="images/ea2.png" height="100%" width="7%" align="top"/>  GAMEWEEK 4 DEADLINE:4 OCT 11:15 hrs <img src="images/ea2.png" height="100%" width="7%" align="top"/>  GAMEWEEK 5 DEADLINE:4 OCT 11:20 hrs <img src="images/ea2.png" height="100%" width="7%" align="top"/> </marquee>
</div>
</div>