<?php

include ("koneksi.php");


//ambil data \
$s=mysqli_query($kon, "select * from guru where id_guru='$_GET[id]'");
$d=mysqli_fetch_assoc($s);


?>
<div class="box-header">
    <h3 class="box-title">Ubah Guru</h3>
</div>

<div class="box-body pad">
 <form action="" method="POST">
 
 <input type="text" name="id_guru" class="form-control" value="<?php echo $d['id_guru']; ?>" readonly>
 <br />
 <input type="text" name="nama_guru" class="form-control"  placeholder="Nama guru" value="<?php echo $d['nama_guru']; ?>">
 <br />
 <select class="form-control" name="jenis_kelamin">
 <option value="L" selected="<?if($d['jenis_kelamin']=='L'){echo'selected';}else{echo''}?>">Laki - Laki</option>
  <option value="P" selected="<?if($d['jenis_kelamin']=='P'){echo'selected';}else{echo''}?>">Perempuan</option>
 </select>
 <br/>
 <input type="text" name="mengajar" class="form-control" placeholder="mengajar" value="<?php echo $d['mengajar']; ?>">
 <br />
 <br />


<h1> Masukkan Nilai </h1>

<hr />

<div class="form-group">
								<?php
								$i=1;
								$sqljoin = "select kriteria.nama_kriteria as namakriteria, kriteria.id_kriteria, nilai_matrik.nilai, nilai_matrik.id_matrik from nilai_matrik JOIN kriteria ON kriteria.id_kriteria = nilai_matrik.id_kriteria where id_guru='$_GET[id]'";
								
								$alt=mysqli_query($kon, $sqljoin);
						//hitung jml kriteria		
						$jml_krit=mysqli_num_rows($alt);		
								
								while($dalt=mysqli_fetch_assoc($alt)){
								?>
						
	<table>
		<tr>
		<td width="200">
							<label ><?php echo $dalt['namakriteria']; ?></label>
							<input type="hidden" name="id_krite<?php echo $i; ?>" value="<?php echo $dalt['id_kriteria']; ?>" />
		</td>					
							<div>
		<td>				
							<input  type="number" name="nilai<?php echo $i; ?>" class="form-control"  value="<?php echo $dalt['nilai']; ?>">
							
							<input  type="hidden" name="id_matrik<?php echo $i; ?>" class="form-control"  value="<?php echo $dalt['id_matrik']; ?>">
							
		</td>
		</tr>	
								
								<?php
								$i++;
								}
								?>
		<tr>
		<td colspan="2" align="center">
		<input type="submit" name="ubah" value="ubah" class="btn btn-primary">
		</td>
		</tr>
</table>		

							</div>
							
						</div>
						
						
</form>						
<?php
$b=mysqli_query($kon, "select * from kriteria");
$c=mysqli_fetch_assoc($b);



if(isset($_POST['ubah'])){
 
$o=1;


for($n=1;$n<=$jml_krit;$n++){
	$id_k=$_POST['id_krite'.$o];
	 $nilai_k=$_POST['nilai'.$o];
	 $idmtrk=$_POST['id_matrik'.$o];
	
	$sql= "update nilai_matrik set nilai='$nilai_k' where id_matrik='$idmtrk'";
	// echo $sql;
	$m=mysqli_query($kon, $sql);
	
	$o++;
}


	$s=mysqli_query($kon, "update guru set nama_guru='$_POST[nama_guru]', jenis_kelamin='$_POST[jenis_kelamin]',mengajar='$_POST[mengajar]' where id_guru='$_POST[id_guru]'");
	
	if($s){
		echo "<script>alert('Diubah'); window.open('index.php?a=guru&k=guru','_self');</script>";
	}



}
?>			
