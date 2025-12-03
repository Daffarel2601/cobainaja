<?php
require 'config.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM PEMINJAMAN WHERE id_peminjaman=$id");
header("Location: index.php");
?>
