<?php
header ("Content-Type: text/html; charset=utf-8");

// вход группа
//	выход портрет
$gid=(isset($_GET['i']))?(int)($_GET['i']):-1;	
$cu=mysqli_connect("127.0.0.1","root","","pet2");
if (!$cu){
	echo 'база ноу коннект';	
}else{
//----------------------------------
	mysqli_query($cu,"SET NAMES utf8"); 
//--------------------------------------------  
	$grss=mysqli_query($cu,"SELECT * FROM `grs` WHERE `id`=".$gid); 
	$grs=mysqli_fetch_assoc($grss);
	$fotes=mysqli_query($cu,"SELECT * FROM `fote` WHERE `id`=".(int)$grs['phote']); 
	$fote=mysqli_fetch_assoc($fotes);
	
echo "<div class='pot'>";
echo $fote['img'];
echo "</div>";	

//----------------------------------
	mysqli_close($cu); 
}	



?>
