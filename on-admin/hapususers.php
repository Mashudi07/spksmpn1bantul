<?php
include ("koneksi.php");
$s=mysqli_query($kon, "delete from users where id_user='$_GET[id]'");

if($s){
	echo "<script>window.open('kelola.php','_self');</script>";
}else{
 echo $a="delete from users where id_user='$_GET[id]'";
}

?>