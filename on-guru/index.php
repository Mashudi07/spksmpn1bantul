<!DOCTYPE html>
<html lang="en">
<head>
  <title>PENILAIAN DAN SELEKSI GURU SMPN 1 BANTUL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body> 
<nav class="navbar navbar-inverse">
  <div class="container-fluid"  style="background: #337ab7;">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color: white;">SISTEM PENDUKUNG KEPUTUSAN SELEKSI GURU TERBAIK SMPN 1 BANTUL </a>
	  
    </div>
	 
  </div>
</nav>
 <?php
if(@$_GET['a']=='hasiltopsis'){
	$active1='';
	$active2='';
	$active3='';
	$active4='class="active"';
}else{
	$active1='';
	$active2='';
	$active3='';
	$active4='';
}	

?> 
  
<!-- TAB KIRI -->
<div class="col-sm-2">
<ul class="nav nav-pills nav-stacked">
  <li <?php echo $active4 ?>><a href="?a=hasiltopsis&k=nilai_matriks">Hasil Topsis</a></li>
  
  <li ><a href="./../logout.php">Keluar</a></li>
</ul>  
</div>
<!-- /TAB KIRI -->  
  <img src="css/guru.jpg" height="140" width="1100" Position="center" />
  
  <div class="col-sm-10">
  
  
 <?php
 
if(@$_GET['a']=='hasiltopsis'){
	include ("hasiltopsis.php");
 }
 ?>
 
</div>
</body>
</html>
