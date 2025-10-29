<?php
require 'connection.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit;
}

$stmt = $mysqli->prepare("SELECT * FROM film WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$film = $result->fetch_assoc();
$stmt->close();

if (!$film) {
    echo "<script>alert('Data tidak ditemukan'); window.location='index.php';</script>";
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Edit Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success-subtle">
    <nav class="navbar navbar-expand-lg bg-success navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Manajemen Film</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" aria-controls="navbarNav" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Edit Film</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5" style="width: 60vw;">
        <div class="card p-4 shadow">
            <h3 class="mb-3">Edit Data Film</h3>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($film['id']) ?>">

                <div class="mb-3">
                    <label class="form-label">Judul Film</label>
                    <input type="text" name="judul" class="form-control" 
                           value="<?= htmlspecialchars($film['judul']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Genre</label>
                    <select name="genre" class="form-select" required>
                        <option value="">Pilih Genre</option>
                        <option value="Romance" <?= $film['genre'] === 'Romance' ? 'selected' : '' ?>>Romance</option>
                        <option value="Action" <?= $film['genre'] === 'Action' ? 'selected' : '' ?>>Action</option>
                        <option value="Horror" <?= $film['genre'] === 'Horror' ? 'selected' : '' ?>>Horror</option>
                        <option value="Comedy" <?= $film['genre'] === 'Comedy' ? 'selected' : '' ?>>Comedy</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Sutradara</label>
                    <input type="text" name="sutradara" class="form-control" 
                           value="<?= htmlspecialchars($film['sutradara']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tahun Rilis</label>
                    <input type="number" name="tahun" class="form-control"
                           min="1888" max="2025" 
                           value="<?= htmlspecialchars($film['tahun']) ?>" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
