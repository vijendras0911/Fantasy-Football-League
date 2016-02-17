<?php
require_once("include/connection.php");
require_once("include/functions.php");
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
function get() {
	
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
	
	$.post('budget.php', { 1: x[0],2: x[1],3: x[2],4: x[3],5
	: x[4],6: x[5],7: x[6],8: x[7],9: x[8],10: x[9],11: x[10
	] },
	function (output)
	{
		$('#inbank1').html(output).show();
		var tv=100-output;
		var tv1=tv.toFixed(1);
		$('#teamval1').html(tv1).show();
	
	var but=true;	
	two:for(var k=0;k<=10;k++)
	{
		if(x[k]=="None")
		{
			but=false;
			break two;
		}
	}
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
		
		if(output<0)
		{
			alert("Budget Exceeded");
			but=false;
		}
		$('#regit').toggle(but);
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
<div id="horbar1" align="center">
<img src="images/bpl.png" height="100%" width="32%"  />

<img src="images/ea1.png" height="100%" width="32%" />
<img src="images/New_SoccernetStore_304x50.jpg" height="100%" width="32%" />
</div>

