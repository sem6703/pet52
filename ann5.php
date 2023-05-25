<?php
header ("Content-Type: text/html; charset=utf-8");


// вход айди группы	
// выход аннотация
$id_grs=(isset($_GET['i']))?(int)($_GET['i']):-1;	


$cu=mysqli_connect("127.0.0.1","root","","pet2");
if (!$cu){
	echo 'база ноу коннект';	
}else{
//----------------------------------
	mysqli_query($cu,"SET NAMES utf8"); 
//--------------------------------------------  
	$su_grs=mysqli_query($cu,"SELECT * FROM `grs` WHERE `id`=".$id_grs); 
	$grs=mysqli_fetch_assoc($su_grs);

	echo $grs['txt'];// аннотация группы

//----------------------------------
	mysqli_close($cu); 
}	
?>
