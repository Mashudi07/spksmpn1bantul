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
      <li><a href="./../logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
    </ul>
  </div>
</nav>
<?php
session_start();
include ("koneksi.php");
include ("function1.php");
error_reporting(0);
?>

<div class="box-header">
    <h3 class="box-title " >Ranking Seleksi Guru SMPN 1 BANTUL</h3>
</div>

<table class="table table-bordered table-responsive">
<thead>
<tr>
<th >Ranking</th>
<th >Nama</th>
<th >Jenis Kelamin</th>
<th >Mengajar</th>
<th >Nilai</th>
<th >Keterangan</th>
</tr>

</thead>
<tbody>
<?php
$i=1;
$a=mysqli_query($kon, "select * from guru");
echo "<tr>";
$sortir=array();
while($da=mysqli_fetch_assoc($a)){

	
		
		$idalt=$da['id_guru'];
	
		//ambil nilai
			
			$n=mysqli_query($kon, "select * from nilai_matrik where id_guru='$idalt'");
		
		$c=0;
		$ymax=array();
		while($dn=mysqli_fetch_assoc($n)){
			$idk=$dn['id_kriteria'];
			
			
			//nilai kuadrat
			
			$nilai_kuadrat=0;
			$k=mysqli_query($kon, "select * from nilai_matrik where id_kriteria='$idk' ");
			while($dkuadrat=mysqli_fetch_assoc($k)){
				$nilai_kuadrat=$nilai_kuadrat+($dkuadrat['nilai']*$dkuadrat['nilai']);
			}

			//hitung jml alternatif
			$jml_alternatif=mysqli_query($kon, "select * from guru");
			$jml_a=mysqli_num_rows($jml_alternatif);	
			//nilai bobot kriteria (rata")
			$bobot=0;
			$tnilai=0;
			
			$k2=mysqli_query($kon, "select * from nilai_matrik where id_kriteria='$idk' ");
			while($dbobot=mysqli_fetch_assoc($k2)){
				$tnilai=$tnilai+$dbobot['nilai'];
			}	
			 $bobot=$tnilai/$jml_a;
			
			//nilai bobot input
			$b2=mysqli_query($kon, "select * from kriteria where id_kriteria='$idk'");
			$nbot=mysqli_fetch_assoc($b2);
			$bot=$nbot['bobot'];
			
			
			$v=round(($dn['nilai']/sqrt($nilai_kuadrat))*$bot,3);

				$ymax[$c]=$v;
				$c++;
				$mak=max($ymax);
				$min=min($ymax);	
			
		}

		$i++;

}


foreach($_SESSION['dplus'] as $key=>$dxmin){
	$jarakm=$_SESSION['dmin'][$key];
	$id_alt=$_SESSION['id_alt'][$key];
	
	//nama alternatif
	$nama=mysqli_query($kon, "select * from guru where id_guru='$id_alt'");
	$nm=mysqli_fetch_assoc($nama);
	
	$nilaid=$jarakm/($jarakm+$dxmin) * 100;
	
		$nilai=round($nilaid,0);
	
		
	
	//simpan ke tabel nilai preferensi
	$nm=$nm['nama_guru'];
	$sqlnw  = "insert into nilai_preferensi (id_guru,nilai) values('$id_alt','$nilai')";
	$sql2=mysqli_query($kon, $sqlnw);
	
}
 
 //ambil data sesuai dengan nilai tertinggi
 $i=1;
	
	$joinL = "select count(*) as totalLaki from nilai_preferensi JOIN guru ON guru.id_guru = nilai_preferensi.id_guru where guru.jenis_kelamin='L'";
	$joinP = "select count(*) as totalPerem from nilai_preferensi JOIN guru ON guru.id_guru = nilai_preferensi.id_guru where guru.jenis_kelamin='P'";
	
	$alt_L=mysqli_query($kon, $joinL);
	$alt_P=mysqli_query($kon, $joinP);
	
	$L=mysqli_fetch_assoc($alt_L);
	$P=mysqli_fetch_assoc($alt_P);
	//print_r($L);
	//echo $L['totalLaki'];
 
	$sql3=mysqli_query($kon, "select * from nilai_preferensi order by nilai Desc");
	while($data3=mysqli_fetch_assoc($sql3)){
		
		$sqlguru = mysqli_query($kon, "select * from guru where id_guru='$data3[id_guru]'");
		
		$guru=mysqli_fetch_assoc($sqlguru);
		
		if($data3[nilai]>='47'){
			$k='LULUS';
		}else if ($data3[nilai]>='80') {
			$k='LULUS MEMUASKAN';
		}else {
			$k='TIDAK LULUS';
		}
	
		echo "<tr>
		<td>".$i."</td>
		<td>$guru[nama_guru]</td>
		<td>$guru[jenis_kelamin]</td>
		<td>$guru[mengajar]</td>
		<td>$data3[nilai]</td>
		<td>$k</td>
		
		
		</tr>";
		
		$i++;
	}
 
 

echo "</tr>";

 //kosongkan tabel nilai preferensi
 $del=mysqli_query($kon,"delete from nilai_preferensi");
?>

</tbody>
</table>
<?php
	$total = $L['totalLaki'] + $P['totalPerem'];

	echo'Total Laki='.$L['totalLaki'];
	echo'<br>';
	echo'Total Perempuan='.$P['totalPerem'];
	echo'<br>';
	echo'Total Keseluruhan='. $total;
?>