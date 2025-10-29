<?php
require 'connection.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $stmt = $mysqli->prepare("DELETE FROM film WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: index.php");
exit;
?>
