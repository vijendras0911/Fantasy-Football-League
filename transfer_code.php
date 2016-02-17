<div class="image">
  <?php
	$row1=mysql_fetch_array($display);
    $display1=mysql_query("select * from  player where 
	pid='".$row1['pid']."'");
    $row2=mysql_fetch_array($display1);
    echo ' <img src="images/'.$row2['team'].'.png" 
	width="45%" height="90%"  align="middle"/> ';
	if(isset($id))
	$id=$id+1;
	else
	$id=1;
   ?>
  </div>
  <div class="info">
  <img src="images/<?php echo $row2['status'] ; ?>.png" height="100%"/><?php echo ' '.$row2['pname'] ;?>
  </div>
  <div class="pr"><?php echo $row2['price'] ;?>
  </div>
  <div class="sel1">
  <select id="<?php echo $id; ?>" name="<?php echo "s".$id; ?>" onchange="get1();">
  <?php require("display_player.php");?>
  </select>
  </div>
  <div class="sel2">
  </div>