<!DOCTYPE html>
<html lang="en">
<head>
  <title>PENILAIAN DAN SELEKSI GURU TERBAIK SMPN 1 BANTUL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body> 
<nav class="navbar navbar-default">
  <div class="container-fluid" >
    <div class="navbar-header">
      <a class="navbar-brand" href="#">SISTEM PENDUKUNG KEPUTUSAN SELEKSI GURU TERBAIK SMPN 1 BANTUL</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="./index.php"><span class="glyphicon glyphicon-log-out"></span> Menu Utama</a></li>
    </ul>
  </div>
</nav>
<?php

include ("koneksi.php");



?>
<div class="box-header">
    <h3 class="box-title">Tambah User</h3>
</div>

<div class="box-body pad">
 <form action="" method="POST">
 <table class="table table-bordered">
 
	<tr>
		<td width="175px">Username</td>
		<td>
 <input type="text" name="username" class="form-control"  placeholder="username" value=""></td>
	</tr>
		
	<tr>
		<td>Password</td>
		<td>
 <input type="password" name="passwordbaru" class="form-control" placeholder="passwordbaru" value=""></td>
	</tr>
	
	<tr>
		<td>Level</td>
		<td>
			<select class="form-control" name="level_user">
 <option value="admin">Admin</option>
  <option value="member">Member</option>
  <option value="guru">Guru</option>
  <option value="kepala">Kepala</option>
 </select>
		</td>
	</tr>
 </table>
 
 <br />
 <input type="submit" name="tambah" value="tambah" class="btn btn-primary">
 <br />
 </form>
</div>
<?php

if(isset($_POST['tambah'])){
 	$name= $_POST['username'];
	$baru= md5($_POST['passwordbaru']);
	$level =$_POST['level_user'];
	
	//print_r(mysqli_fetch_array($result));
	
	
			
			$insert = "insert into users (id_user,username,password,level_user) values('','$name','$baru','$level')";
			
			$s=mysqli_query($kon,$insert);
	
			if($s){
				echo "<script>alert('Ditambah'); window.open('kelola.php','_self');</script>";
			}else{
				echo mysqli_error($kon);
			}
			
	
}
?>