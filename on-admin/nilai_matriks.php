<?php
include ("koneksi.php");
$s=mysqli_query($kon, "select * from kriteria");
$h=mysqli_num_rows($s);


?>

<div class="box-header">
    <h3 class="box-title " >Nilai Matriks</h3>
</div>
<div class="table table-bordered table-responsive">
<table class="table table-bordered table-responsive">
<thead>
<tr>
<th rowspan="2">No</th>
<th rowspan="2">Nama</th>
<th colspan="<?php echo $h; ?>">Kriteria</th>
</tr>
<tr>
<?php
for($n=1;$n<=$h;$n++){
	echo"<th>C{$n}</th>";
}
?>
</tr>
</thead>
<tbody>
<?php
$i=0;
$a=mysqli_query($kon, "select * from guru");



while($da=mysqli_fetch_assoc($a)){
	echo "<tr>
		<td>".(++$i)."</td>
		<td>$da[nama_guru]</td>";
		$idalt=$da['id_guru'];
		//ambil nilai
		$sqlmatrik = "select * from nilai_matrik where id_guru='$idalt' ";
			$r=mysqli_query($kon, $sqlmatrik);
			
		
			
		while($dn=mysqli_fetch_assoc($r)){
		
			echo "<td align='center'>$dn[nilai]</td>";
		}
		echo "</tr>\n";

}

?>

</tbody>
</table>
</div>