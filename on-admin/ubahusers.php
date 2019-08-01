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

//ambil data \
$s=mysqli_query($kon, "select * from users where id_user='".$_GET['id']."'");
$d=mysqli_fetch_assoc($s);


?>
<div class="box-header">
    <h3 class="box-title">Ubah USer</h3>
</div>

<div class="box-body pad">
 <form action="" method="POST">
 <table class="table table-bordered">
 
 
 <input type="hidden" name="id_user" class="form-control" value="<?php echo $d['id_user']; ?>" readonly>
	<tr>
		<td width="175px">Username</td>
		<td>
 <input type="text" name="username" class="form-control"  placeholder="username" value="<?php echo $d['username']; ?>"></td>
	</tr>
	
	<tr>
		<td>Password Lama</td>
		<td>
 <input type="password" name="passwordlama" class="form-control" placeholder="passwordlama" value=""></td>
	</tr>
	
	<tr>
		<td>Password Baru</td>
		<td>
 <input type="password" name="passwordbaru" class="form-control" placeholder="passwordbaru" value=""></td>
	</tr>
	
	<tr>
		<td>Level</td>
		<td>
			<select class="form-control" name="level_user">
 <option value="admin" <?php if($d['level_user']=="admin"){echo"selected";}else{echo" ";}?>>Admin</option>
  <option value="member" <?php if($d['level_user']=="member"){echo"selected";}else{echo" ";}?>>Member</option>
  <option value="guru" <?php if($d['level_user']=="guru"){echo"selected";}else{echo" ";}?>>Guru</option>
  <option value="kepala" <?php if($d['level_user']=="kepala"){echo"selected";}else{echo" ";}?>>Kepala</option>
 </select>
		</td>
	</tr>
 </table>
 
 <br />
 <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
 <br />
 </form>
</div>
<?php

if(isset($_POST['ubah'])){
 
	$id= $_POST['id_user'];
	$name= $_POST['username'];
	$lama = md5($_POST['passwordlama']);
	$baru= md5($_POST['passwordbaru']);
	$level =$_POST['level_user'];
	
	$cek = "select * from users where id_user=$id";
	$result=mysqli_query($kon, $cek);
	
	//print_r(mysqli_fetch_array($result));
	
	while($row=mysqli_fetch_array($result))
	{
		if($lama==$row['password']){
			//echo'data sama';
			
			$update = "update users set username='$name', password='$baru', level_user='$level' where id_user='$id'";
			
			$s=mysqli_query($kon,$update);
	
			if($s){
				echo "<script>alert('Diubah'); window.open('kelola.php','_self');</script>";
			}else{
				echo mysqli_error($kon);
			}
			
		}else{
			echo'kata sandi lama salah';
		}
	}
	
	
	
}
?>