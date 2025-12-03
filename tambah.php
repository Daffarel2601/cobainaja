<?php
require 'config.php';

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $ruang = $_POST['ruang'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $ket = $_POST['keterangan'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "uploads/".$foto);

    mysqli_query($conn, "INSERT INTO PEMINJAMAN VALUES(
        '', '$nama', '$kelas', '$ruang', '$tgl_pinjam', '$tgl_kembali', '$ket', '$foto', NOW()
    )");

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Data</title></head>
<body>
<h2>Tambah Data</h2>
<form method="post" enctype="multipart/form-data">
Nama: <input type="text" name="nama" required><br><br>
Kelas: <input type="text" name="kelas"><br><br>
Ruangan: <input type="text" name="ruang" required><br><br>
Tanggal Pinjam: <input type="date" name="tgl_pinjam" required><br><br>
Tanggal Kembali: <input type="date" name="tgl_kembali"><br><br>
Keterangan:<br>
<textarea name="keterangan"></textarea><br><br>
Foto: <input type="file" name="foto"><br><br>
<button type="submit" name="submit">Simpan</button>
</form>
</body>
</html>
