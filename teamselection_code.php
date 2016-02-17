<?php
	if(isset($id))
	$id=$id+1;
	else
	$id=1;
   ?>

<div class="image">
  <img src="images/shirt_0.png" align="middle" height="90%" width="48%"/>
  </div>
  <div class="info">
  <font color="#000000">Select</font>
  </div>
  <div class="pr">
  <font color="#000000" >
  <?php 
  if($id==1)
  {
	  echo "Goal Keeper";
  }
  else if($id==2||$id==3||$id==4||$id==5)
  {
	  echo "Defender";
  }
  else if($id==6||$id==7||$id==8||$id==9)
  {
	  echo "Mid Fielder";
  }
  else if($id==10||$id==11)
  {
	  echo "Forward";
  }
  ?>
  </font  >
  </div>
  
  
  <div class="sel1">
  <select id="<?php echo $id; ?>" name="<?php echo "s".$id; ?>" onchange="get();">
  <?php require("ts_display_player.php");?>
  </select>
  </div>
  <div class="sel2">
  </div>
  