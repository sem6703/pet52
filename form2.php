<?php
header ("Content-Type: text/html; charset=utf-8");

// добавление аватары
$cu=mysqli_connect("127.0.0.1","root","","pet2");
if (!$cu){
	echo 'база ноу коннект';	
}else{
//----------------------------------
	mysqli_query($cu,"SET NAMES utf8"); 
//-------------------------------------------- 

	$g=(isset($_POST['g']))?($_POST['g']):'';		
	$act=(isset($_POST['act']))?($_POST['act']):'';
// пушим в аватары
	$s="INSERT `ava` (bj,link) VALUES ($g,$act)";	
	$f=mysqli_query($cu,$s);
	$n=mysqli_insert_id($cu);
// вписываем в группы
	$d="UPDATE `grs` SET usa=usa+1, ava=$n, act=$act WHERE `id`=$g";
//echo $d;	
	$f=mysqli_query($cu,$d);	
// выгружаю в редактирование акт
// номер акта
$s="SELECT * FROM `kok` WHERE `id`=$act";
$txt=mysqli_query($cu, $s);
$kok=mysqli_fetch_assoc($txt);
echo ($kok['txt']);
//----------------------------------
	mysqli_close($cu); 
}	
?>
