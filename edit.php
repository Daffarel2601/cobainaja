<?php
require 'config.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM PEMINJAMAN WHERE id_peminjaman=$id"));

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $ruang = $_POST['ruang'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $ket = $_POST['keterangan'];

    if($_FILES['foto']['name'] != ""){
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmp, "uploads/".$foto);
    } else {
        $foto = $data['foto_peminjaman'];
    }

    mysqli_query($conn, "UPDATE PEMINJAMAN SET 
        nama_peminjam='$nama',
        kelas='$kelas',
        ruangan_dipinjam='$ruang',
        tanggal_pinjam='$tgl_pinjam',
        tanggal_kembali='$tgl_kembali',
        keterangan='$ket',
        foto_peminjaman='$foto'
        WHERE id_peminjaman=$id
    ");

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Data</title></head>
<body>
<h2>Edit Data</h2>
<form method="post" enctype="multipart/form-data">
Nama: <input type="text" name="nama" value="<?= $data['nama_peminjam'] ?>" required><br><br>
Kelas: <input type="text" name="kelas" value="<?= $data['kelas'] ?>"><br><br>
Ruangan: <input type="text" name="ruang" value="<?= $data['ruangan_dipinjam'] ?>" required><br><br>
Tanggal Pinjam: <input type="date" name="tgl_pinjam" value="<?= $data['tanggal_pinjam'] ?>" required><br><br>
Tanggal Kembali: <input type="date" name="tgl_kembali" value="<?= $data['tanggal_kembali'] ?>"><br><br>
Keterangan:<br>
<textarea name="keterangan"><?= $data['keterangan'] ?></textarea><br><br>
Foto Baru: <input type="file" name="foto"><br>
<img src="uploads/<?= $data['foto_peminjaman'] ?>" width="80"><br><br>
<button type="submit" name="submit">Update</button>
</form>
</body>
</html>
