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
<div class="box-header">
    <h3 class="box-title">Data User</h3> <a><a href="tambahusers.php">Tambah User</a>
	
</div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th width="15px">No</th>
<th>Nama User</th>
<th>Level user</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
include ("koneksi.php");
$no=1;
$s=mysqli_query($kon, "select * from users order by id_user ASC");
while($d=mysqli_fetch_assoc($s)){
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $d['username']; ?></td>
<td><?php echo $d['level_user']; ?></td>
<td>
<a href="ubahusers.php?id=<?php echo $d['id_user']; ?>" class="btn btn-warning">Ubah</a>
<a onclick="return confirm('Apakah anda yakin?')" href="hapususers.php?id=<?php echo $d['id_user']; ?>" class="btn btn-danger">Hapus</a>
</td>
</tr>
<?php
$no++;}
?>
</tbody>
</table>
</div>