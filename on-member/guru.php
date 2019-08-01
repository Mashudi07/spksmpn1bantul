
<h1>Guru</h1>
<ul class="nav nav-tabs">
  <?php
  if($_GET['k']=='guru'){
	$act1='class="active"';
	$act2='';
  }else if($_GET['k']=='tambah'){
	$act1='';
	$act2='class="active"';
  }else{
	$act1='';
	$act2='';
  }
  ?>
  <li <?php echo $act1; ?> ><a href="index.php?a=guru&k=guru">Data Guru</a></li>
  <li <?php //echo $act2; ?>><a href="index.php?a=guru&k=tambah">Tambah Guru</a>
  
  
</ul>

<?php

if(@$_GET['a']=='guru' and @$_GET['k']=='guru'){
	include ("dataguru.php");
 }else if(@$_GET['k']=='tambah'){
	include ("tambahguru.php");
 }else if(@$_GET['k']=='ubahk'){
	include ("ubahguru.php");
 }

 ?>
