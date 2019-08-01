<div class="box-header">
    <h3 class="box-title">Data Kriteria</h3>
</div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Id Kriteria</th>
<th>Nama Kriteria</th>
<th>Bobot</th>
</tr>
</thead>
<tbody>
<?php
include ("koneksi.php");

$s=mysqli_query($kon, "select * from kriteria order by id_kriteria ASC");
while($d=mysqli_fetch_assoc($s)){
?>
<tr>
<td><?php echo $d['id_kriteria']; ?></td>
<td><?php echo $d['nama_kriteria']; ?></td>
<td><?php echo $d['bobot']; ?></td>

</tr>
<?php
}
?>
</tbody>
</table>
</div>