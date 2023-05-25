<?php
header ("Content-Type: text/html; charset=utf-8");

$pga=0;
$sz=5;//50
if (isset($_GET['pg'])) $pga=$_GET['pg'];// онмер страницы перебивает avaid
if (isset($_GET['k'])) $ban5=$_GET['k']==$sz;
//if (isset($_GET['koy'])) $koy=$_GET['koy']; else $koy=0;// койка
if (isset($_GET['g'])) $g=$_GET['g']; else $g=0;// група
// avaid аватар
$avaid=(isset($_GET['avaid']))?(int)$_GET['avaid']:0;
// куда строки выдавать 5-в лист 1-в п/б
//
echo $avaid;

$cu=mysqli_connect("127.0.0.1","root","","pet3");
if (!$cu){
	echo 'база ноу коннект';	
}else{
//----------------------------------
   mysqli_query($cu,"SET NAMES utf8"); 
//--------------------------------------------  
if($g==0){// если група незашла в параметрах извлечь самому
	$avas=mysqli_query($cu,"SELECT * FROM `ava` WHERE id=$avaid");
	$ava=mysqli_fetch_assoc($avas);
	$g=$ava['g'];}
if($avaid==0){// нет авы 
	
	}	

$su_koys="SELECT * FROM `koys` WHERE g=$g";
//echo $su_koys;

$koys=mysqli_query($cu,$su_koys);
$koy=mysqli_fetch_assoc($koys);
$m=$koy['id']-1;

$pg=$yy=($m-$m%$sz)/$sz;//столбец. учел что нумерация с единицы
$koy=$xx=$m % $sz;// строка	

//************************** 
$start=$pg*$sz;//+$koy;
$pagesz=($ban5)?$sz:1;

$su_grz=mysqli_query($cu,"SELECT * FROM `grz` ORDER BY `nom` LIMIT ".
(int)$start.",".(int)$pagesz); //

$n=0;	
while ($grz=mysqli_fetch_assoc($su_grz)){//j
	$n++;	
	$pin="";		
	if ($grz['phote']>0){
			$fotes=mysqli_query($cu,"SELECT * FROM fote WHERE id=".(int)$grz['phote']);
			$fote=mysqli_fetch_assoc($fotes);	
			if($ban5){
			echo "<div class='d3' id='di$n'";}
			else{
			echo "<div class='d3'";}
			
			echo " onclick=\"fx(".$grz['id'].");\">";//.",".$grs['pip']			
			echo $fote['img']." <tt>";
			echo ($n+$start)."</tt> ".$pin.$grz['nom'];
			}
			else
			{
			echo "<div class='d3 p8' id='di$n'> <tt>".($n+$start)."</tt> ".$pin.$grz['nom'];//
			}
   $d=mysqli_query($cu,"SELECT * FROM `ava` WHERE `g`='".
		(int)$grz['id']."' ORDER BY `god`"); //все акты персоны
   $avis='';// накопитель аватар
   while ($ava=mysqli_fetch_assoc($d)){//	
		$role=$ava['role'];// подмена цифр буквами
		if ($role==1)$role='<b>R</b>';
		if ($role==7)$role='<b>D</b>';
		if ($role==4)$role='<b>M</b>';
		if ($role==8)$role='d';
		if ($role==2)$role='R';		
		if ($role==3)$role='r';
		if ($role==5)$role='M';
		if ($role==6)$role='m';	
		
		$avis.=' <a class="pec';// начало авы
		//$avis.=" ".($avaid)." ";
		$avis.=($avaid==$ava['id'])?' acti':'';
		$avis.='" title="'.$ava['god']
			.' '.$ava['coop']
			.' |as: '.$ava['he'];
			
		//if (!$ban5)$avis.='"  id="ix'.($ava['id']); else $avis.='"  id="jx'.($ava['id']);

		$avis.='" onclick="event.stopPropagation();';
		$avis.=($ban5)?'fy':'fb';	
		//$avis.='(this,'.$ava['svet'].",".$ava['link'].",";
		$avis.='('.$ava['id'];
//pga- номер страницы
		//$avis.=($ban5)?($n-1):($koy).",$pga";
		$avis.=");".'"> '.$role.' </a>';
			}// аватары
		echo $avis.'</div>'; 	
}


	echo "<script>";//
	echo "wanted.innerHTML=".$g.";";
	echo "hoy.value=$g;";		
	echo "</script>";	
//----------------------------------
	mysqli_close($cu); 
	

}// группы
?>

