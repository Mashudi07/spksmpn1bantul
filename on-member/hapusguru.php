<?php
include ("koneksi.php");
$s=mysqli_query($kon, "DELETE guru , nilai_matrik  FROM guru  INNER JOIN nilai_matrik  
WHERE guru.id_guru= nilai_matrik.id_guru and guru.id_guru = '$_GET[id]'");
if($s){
	echo "<script>window.open('index.php?a=guru&k=guru','_self');</script>";
}else{
 echo $a="delete from guru where id_guru='$_GET[id]'";
}

?>