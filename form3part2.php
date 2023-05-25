<?php
header ("Content-Type: text/html; charset=utf-8");


// сопоставление редактируется юзером
$cu=mysqli_connect("127.0.0.1","root","","pet2");
if (!$cu){
	echo 'база ноу коннект';	
}else{
//----------------------------------
	mysqli_query($cu,"SET NAMES utf8"); 
//-------------------------------------------- 
$txt=(isset($_POST['txt']))?($_POST['txt']):'';
$act=(isset($_POST['act']))?($_POST['act']):'';
	
$s="SELECT * FROM `ava` WHERE `link`=$act";///  авы всех групп в акте	
$avav=mysqli_query($cu,$s);

echo "[";//avon=
while($ava=mysqli_fetch_assoc($avav)){
echo "{id:".$ava['id'].
",g:".$ava['g'].
",link:".$ava['link'].
",god:'".$ava['god'].
"',coop:'".$ava['coop'].
"',he:'".$ava['he'].
"',role:".$ava['role'].
",svet:".$ava['svet'].
",bj:".$ava['bj'].
"},";
}
echo "];";
///*********************************************************

//----------------------------------
	mysqli_close($cu); 
}	
?>
