<?php
header ("Content-Type: text/html; charset=utf-8");

// добавление персоны
$cu=mysqli_connect("127.0.0.1","root","","pet2");
if (!$cu){
	echo 'база ноу коннект';	
}else{
//----------------------------------
	mysqli_query($cu,"SET NAMES utf8"); 
//-------------------------------------------- 
$w1=(isset($_POST['img']))?($_POST['img']):'';// иконка
$w2=(isset($_POST['who']))?($_POST['who']):'Синица';// имя иконки
$w3=(isset($_POST['txt']))?($_POST['txt']):'';
$v=mysqli_query($cu,"INSERT INTO `fote` (`img`, `who`) VALUES('".$w1."','".$w2."')");
$ico=mysqli_insert_id($cu);// айди новой иконки
$s="INSERT INTO `grs` (`nom`, `phote`, `txt`, `usa`) VALUES
	('".$w2."', '".$ico."', '".$w3."', 0)";
$k=mysqli_query($cu,$s);////
echo mysqli_insert_id($cu);// последняя добавленпч група уходит в след форму
//$s="INSERT INTO `peps` (`g`) VALUES(0)";// пох что добавить, значение будет перезаписано
$s="INSERT INTO `koys` (`g`) VALUES(0)";// пох что добавить, значение будет перезаписано
$k=mysqli_query($cu,$s);// добавил для обьема перед полной перезаписью
//********************
//********************
$su_grs=mysqli_query($cu,"SELECT * FROM `grs` ORDER BY `nom`");
$n=1;
while ($grs=mysqli_fetch_assoc($su_grs)){
	$i=$grs['id'];
	//$s="UPDATE `peps` SET g='$i' WHERE id='$n'";
	$s="UPDATE `koys` SET g='$i' WHERE id='$n'";	
	$k=mysqli_query($cu,$s);
	$s="UPDATE `grs` SET pep='$n' WHERE id='".$grs['id']."'";
	$k=mysqli_query($cu,$s);	
	$s="UPDATE `grs` SET pip='".(($n-1)%5)."' WHERE id='".$grs['id']."'";
	$k=mysqli_query($cu,$s);	
	$n++;
	}	
//----------------------------------
	mysqli_close($cu); 
}	
?>
