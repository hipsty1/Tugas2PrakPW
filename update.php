<?php
include 'connection.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$genre = $_POST['genre'];
$sutradara = $_POST['sutradara'];
$tahun = $_POST['tahun'];

$stmt = $conn->prepare("UPDATE film SET judul=?, genre=?, sutradara=?, tahun=? WHERE id=?");
$stmt->bind_param("sssii", $judul, $genre, $sutradara, $tahun, $id);
$stmt->execute();

header("Location: index.php");
exit;
?>
