<?php
header ("Content-Type: text/html; charset=utf-8");

// вход акт
// выход заполненная хтмл таблица акта
if (isset($_GET['act'])){$t = $_GET['act'];}


$cu=mysqli_connect("127.0.0.1","root","","pet3");
if (!$cu)
	{
		echo 'база ноу коннект';	
	}
else
	{
	//----------------------------------
	mysqli_query($cu,"SET NAMES utf8"); 
	//--------------------------------------------   

	$agu=array();//$agu=[];// вызов функции из клика
	$s_j="SELECT * FROM `ava` WHERE `link`=$t ORDER BY `svet`";
	$su_ava=mysqli_query($cu,$s_j);//
	while ($ava=mysqli_fetch_assoc($su_ava)){//// перебрать иных		
		// из пепса надо вытащит всего лишь айди группы. айди разложить на строку столбец
		//$s_r="SELECT * FROM `peps` WHERE g=".$ava['g'];
		$s_r="SELECT * FROM `koys` WHERE g=".$ava['g'];

		$su_peps=mysqli_query($cu,$s_r);// с пепса
		$peps=mysqli_fetch_assoc($su_peps);//
		$m=$peps['id']-1;

		$sz=5;
		
		$yy=($m-$m%$sz)/$sz;//столбец. учел что нумерация с единицы
		$xx=$m % $sz;// строка		
		$agu[]='<span onclick="'.'fj(\'jx'.$ava['id'].'\', '.$ava['svet'].','.$ava['link'].','.$xx.','.$yy.','.($m).');'.'">';
		}

	$su_kok=mysqli_query($cu,"SELECT * FROM `kok` WHERE `id`=$t"); //
	$kok=mysqli_fetch_assoc($su_kok);
	   

	$kok['txt']=str_replace("bgcolor=#ffbbff class=well", "bgcolor=#ff0000 class=well", $kok['txt']);
	$fu=preg_split("/<mark>|<\/mark>/", $kok['txt']);
	$num=round(count($fu)/2);
	//----------------------------------
	$su_numr=mysqli_query($cu,"SELECT * FROM `numr` WHERE `id`=$t");
	$numr=mysqli_fetch_assoc($su_numr);
	$su_head=mysqli_query($cu,"SELECT * FROM `head` WHERE `id`=".$numr['type']);
	$hat=mysqli_fetch_assoc($su_head); //шапка  
	//-----------------------------------
	mysqli_close($cu);   
	}
if (isset($_GET['i'])){$i = (int)$_GET['i'];}else{$i=0;}	
$i=($i+$num)%$num;//гарантируем что $i  меньше количества маркеров	
?>



<?php  // аяксо вывод
	echo "<table cellspacing=0>";	
	print_r($hat['hat']);	
	$kok['txt']=str_replace("sign00.jpg", $kok['fot'], $kok['txt']);
	$fu=preg_split("/<mark>|<\/mark>/", $kok['txt']);
	$fu[$i*2-1]="<mark>".$fu[$i*2-1]."</mark>";
		
	$ii=1;
	while ($ii<count($fu))
		{$fu[$ii]=$agu[(int)($ii/2)].'<span class="a">'.$fu[$ii].'</span></span>'; $ii=$ii+2;}
	echo join('',$fu);
	echo "</table>";
	echo "<script>";
	echo "ajo5.style.backgroundImage=\"url(".$kok['fot'].")\";";	
	echo "act.innerHTML=".$kok['id'].";";
	echo "rose.value=".$kok['id'].";";	
	echo "lot.value=".$kok['id'].";";	
	echo "tot.value=`".$kok['txt']."`;";	
	echo "</script>";	
?>
