<?php
header ("Content-Type: text/html; charset=utf-8");


// вход строка с айди аватары	
// выход аннотация
$avaid=(isset($_GET['i']))?(int)(preg_replace("/ix|jx/","",$_GET['i'])):-1;	


$cu=mysqli_connect("127.0.0.1","root","","pet2");
if (!$cu){
	echo 'база ноу коннект';	
}else{
//----------------------------------
	mysqli_query($cu,"SET NAMES utf8"); 
//--------------------------------------------  
	$s_u="SELECT * FROM `ava` WHERE `id`=".(int)$avaid;	
	$su_ava=mysqli_query($cu,$s_u);	
	$ava=mysqli_fetch_assoc($su_ava);
	$su_grs=mysqli_query($cu,"SELECT * FROM `grs` WHERE `id`=".(int)$ava['g']); 
	$grs=mysqli_fetch_assoc($su_grs);
	echo $grs['txt']; // аннотация
//----------------------------------
	mysqli_close($cu); 
}	
?>
