<?php
require 'config.php';
$result = mysqli_query($conn, "SELECT * FROM PEMINJAMAN ORDER BY id_peminjaman DESC");
?>
<!DOCTYPE html>
<html>
<head><title>Data Peminjaman Ruang</title></head>
<body>
<h2>Data Peminjaman Ruang</h2>
<a href="tambah.php">Tambah Data</a><br><br>
<table border="1" cellpadding="8">
<tr>
<th>ID</th><th>Nama</th><th>Kelas</th><th>Ruangan</th>
<th>Tgl Pinjam</th><th>Tgl Kembali</th><th>Foto</th><th>Aksi</th>
</tr>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<tr>
<td><?= $row['id_peminjaman'] ?></td>
<td><?= $row['nama_peminjam'] ?></td>
<td><?= $row['kelas'] ?></td>
<td><?= $row['ruangan_dipinjam'] ?></td>
<td><?= $row['tanggal_pinjam'] ?></td>
<td><?= $row['tanggal_kembali'] ?></td>
<td><img src="uploads/<?= $row['foto_peminjaman'] ?>" width="80"></td>
<td>
<a href="edit.php?id=<?= $row['id_peminjaman'] ?>">Edit</a> |
<a href="hapus.php?id=<?= $row['id_peminjaman'] ?>">Hapus</a>
</td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>
