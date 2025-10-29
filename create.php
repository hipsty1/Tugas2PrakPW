<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = trim($_POST['judul']);
    $genre = trim($_POST['genre']);
    $sutradara = trim($_POST['sutradara']);
    $tahun = (int)$_POST['tahun'];

    if (!empty($judul) && !empty($genre) && !empty($sutradara) && $tahun >= 1888 && $tahun <= 2025) {
        $stmt = $mysqli->prepare("INSERT INTO film (judul, genre, sutradara, tahun) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $judul, $genre, $sutradara, $tahun);
        $stmt->execute();
        $stmt->close();
    }
    
    header("Location: index.php");
    exit;
}
?>
