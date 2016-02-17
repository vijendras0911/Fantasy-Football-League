
<?php
require_once("header3.php");

?>



<div id="pitch1">
<form action="ts_confirm.php" method="post">
  
<img src="images/download.png" height="100%" width="100%" />

<div id="gk">
  <div id="gk1"><?php require("teamselection_code.php");?></div>
</div>
  
  <div id="def">
    <div id="def1"><?php require("teamselection_code.php");?></div>
    <div id="def2"><?php require("teamselection_code.php");?></div>
    <div id="def3"><?php require("teamselection_code.php");?></div>
    <div id="def4"><?php require("teamselection_code.php");?></div>
  </div>
  
  <div id="mf">
    <div id="mf1"><?php require("teamselection_code.php");?></div>
    <div id="mf2"><?php require("teamselection_code.php");?></div>
    <div id="mf3"><?php require("teamselection_code.php");?></div>
    <div id="mf4"><?php require("teamselection_code.php");?></div>
  </div>
  
  <div id="fwd">
    <div id="fwd1"><?php require("teamselection_code.php");?></div>
    <div id="fwd2"><?php require("teamselection_code.php");?></div>
    </div>
    <input type="submit" value="Confirm Team"/>
</form>
  </div>

<div id="playersdisplay1">
<div id="pdhead">
Sort by:<select id="pdselect" onchange="getOptions()">
<option>None</option>
<option>Man Utd</option>
<option>Man City</option>
<option>Arsenal</option>
<option>Chelsea</option>
<option>Tottenham</option>
<option>Norwich</option>
<option>Points</option>
</select>
</div>
<div id="pdbody">
<table id="pdtable" width="100%" border="1px" cellspacing="0px">
</table>
</div>

</div>
</div>


</body>
</html>
