<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'db_film';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_errno) {
    error_log("Koneksi DB gagal: " . $mysqli->connect_error);
    exit("Gagal terkoneksi ke database. Silakan cek konfigurasi.");
}

if (!$mysqli->set_charset("utf8mb4")) {
    error_log("Error loading character set utf8mb4: " . $mysqli->error);
}
?>
