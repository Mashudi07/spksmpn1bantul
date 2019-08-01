<div class="box-header">
    <h3 class="box-title">Data Guru</h3>
</div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Id Guru</th>
<th>Nama Guru</th>
<th>Jenis Kelamin</th>
<th>Mengajar</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
include ("koneksi.php");

$s=mysqli_query($kon, "select * from guru order by id_guru ASC");
while($d=mysqli_fetch_assoc($s)){
?>
<tr>
<td><?php echo $d['id_guru']; ?></td>
<td><?php echo $d['nama_guru']; ?></td>
<td><?php echo $d['jenis_kelamin']; ?></td>
<td><?php echo $d['mengajar']; ?></td>
<td>
<a href="?a=guru&k=ubahk&id=<?php echo $d['id_guru']; ?>" class="btn btn-warning">Ubah</a>
<a onclick="return confirm('Apakah anda yakin?')" href="hapusguru.php?id=<?php echo $d['id_guru']; ?>" class="btn btn-danger">Hapus</a>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>