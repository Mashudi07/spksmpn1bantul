
<?php
error_reporting(0);
include ("koneksi.php");


$query = "SELECT max(id_guru) as idMaks FROM guru";
$hasil = mysqli_query($kon, $query);
$data  = mysqli_fetch_array($hasil);
$nim = $data['idMaks'];

//mengatur 6 karakter sebagai jumalh karakter yang tetap
//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
$noUrut = (int) substr($nim, 2, 3);
$noUrut++;

//menjadikan 201353 sebagai 6 karakter yang tetap
$char = "kr";
//%03s untuk mengatur 3 karakter di belakang 201353
$IDbaru = $char . sprintf("%03s", $noUrut);

?>
<div class="box-header">
    <h3 class="box-title">Tambah guru</h3>
</div>


 <form action="" method="POST">
 
 <input type="text" name="id_guru" class="form-control" value="<?php echo $IDbaru; ?>" readonly>
 <br />
 <input type="text" name="nama_guru" class="form-control"  placeholder="Nama guru" >
 <br />
 <input type="text" name="mengajar" class="form-control" placeholder="mengajar">
 <br />
 <!--input type="submit" name="simpan" value="Simpan" class="btn btn-primary"-->
 <br />


<?php
/*if(isset($_POST['simpan'])){
	$s=mysqli_query($kon, "insert into guru (id_guru,nama_guru,mengajar) values ('$_POST[id_guru]','$_POST[nama_guru]','$_POST[mengajar]')");
	
	if($s){
		echo "<script>alert('Disimpan'); window.open('index.php?a=guru&k=guru','_self');</script>";
	}
}*/

?>

<h1> Masukkan Nilai </h1>

<hr />

<div class="form-group">
								<?php
								$i=1;
								$alt=mysqli_query($kon, "select * from kriteria");
						//hitung jml kriteria		
						$jml_krit=mysqli_num_rows($alt);		
								
								while($dalt=mysqli_fetch_assoc($alt)){
								?>
						
	<table>
		<tr>
		<td width="200">
							<label ><?php echo $dalt['nama_kriteria']; ?></label>
							<input type="hidden" name="id_krite<?php echo $i; ?>" value="<?php echo $dalt['id_kriteria']; ?>" />
		</td>					
							<div>
		<td>				
							<input  type="number" name="nilai<?php echo $i; ?>" class="form-control"  >
							
		</td>
		</tr>	
								
								<?php
								$i++;
								}
								?>
		<tr>
		<td colspan="2" align="center">
		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
		</td>
		</tr>
</table>		

							</div>
							
						</div>
						
						
</form>						
<?php
$b=mysqli_query($kon, "select * from kriteria");
$c=mysqli_fetch_assoc($b);



if(isset($_POST['simpan'])){
 
$o=1;

//cek id alternatif
$id_alt=$_POST['id_alt'];
$cek=mysqli_query($kon, "select * from guru where id_guru='$id_alt'");
$cek_l=mysqli_num_rows($cek);
if($cek_l>0){
	$del=mysqli_query($kon, "delete from nilai_matrik where id_guru='$id_alt'");
}

for($n=1;$n<=$jml_krit;$n++){
	$id_k=$_POST['id_krite'.$o];
	 $nilai_k=$_POST['nilai'.$o];
	
	$sql="insert into nilai_matrik (id_guru,id_kriteria,nilai) values('$_POST[id_guru]','$id_k','$nilai_k')";
	// echo $sql;
	$m=mysqli_query($kon, $sql);
	
	$o++;
}


	$s=mysqli_query($kon, "insert into guru (id_guru,nama_guru,mengajar) values ('$_POST[id_guru]','$_POST[nama_guru]','$_POST[mengajar]')");
	
	if($s){
		echo "<script>alert('Disimpan'); window.open('index.php?a=guru&k=guru','_self');</script>";
	}



}
?>			

			