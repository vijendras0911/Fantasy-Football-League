<p align="center">
Man United <img src="images/badge_10.png" height="80%" /> Vs<img src="images/badge_9.png" height="80%"> Man City
</p>

<p align="center">
<font color="#FFFFFF" size="+3">Chelsea <img src="images/badge_5.png" height="80%" /> Vs <img src="images/badge_8.png" height="80%"> Liverpool
</font>
</p>

<p align="center">
<font color="#FFFFFF" size="+3">Tottenham <img src="images/badge_17.png" height="80%" /> Vs <img src="images/badge_1.png" height="80%"> Arsenal
</font>

<table width="80%" border="0" cellpadding="2" height="100%">
  <tr align="center">
    <td align="center">Man United <img src="images/badge_10.png" height="80%" /></td>
    <td align="center">Vs</td>
    <td align="center"><img src="images/badge_5.png" height="80%" /> Chelsea</td>
    
    
    
<p align="center">Game Week 1</p>
<hr color="#FFFFFF" />
</div>
<div class="table2">
<p align="center">
Man United <img src="images/badge_10.png" height="80%" /> Vs <img src="images/badge_9.png" height="80%"> Man City
</p>
</div>
<div class="table3">
<p align="center">
Liverpool <img src="images/badge_8.png" height="80%" /> Vs <img src="images/badge_5.png" height="80%"> Chelsea
</p>
</div>
<div class="table4">
<p align="center">
Tottenham <img src="images/badge_17.png" height="80%" /> Vs <img src="images/badge_1.png" height="80%"> Arsenal
</p>
</div>
<div class="table5">
</div>


var but=true;
	var x1=document.form.s1.value;
	var x2=document.form.s2.value;
	var x3=document.form.s3.value;
	var x4=document.form.s4.value;
	var x5=document.form.s5.value;
	var x6=document.form.s6.value;
	var x7=document.form.s7.value;
	var x8=document.form.s8.value;
	var x9=document.form.s9.value;
	var x10=document.form.s10.value;
	var x11=document.form.s11.value;
	if(x1=="None"||x2=="None"||x3=="None"||x4=="None"||x5==
	"None"||x6=="None"||x7=="None"||x8=="None"||x9=="None"||
	x10=="None"||x11=="None")
	{
		but=false;
	}
	if(but)
	$('#regbut').html(<input type="submit" value="Register"
	name="register" />).show();
	else
	$('#regbut').html("Register").show();


