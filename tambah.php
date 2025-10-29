<?php
require 'connection.php';
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Tambah Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success-subtle">
    <nav class="navbar navbar-expand-lg bg-success navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Manajemen Film</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Tambah Film</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5" style="width: 60vw;">
        <div class="card p-4 shadow">
            <h3 class="mb-3">Tambah Data Film</h3>
            <form action="create.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Judul Film</label>
                    <input type="text" name="judul" class="form-control" placeholder="Judul Film" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Genre</label>
                    <select name="genre" class="form-select" required>
                        <option value="" selected disabled>Pilih Genre</option>
                        <option value="Romance">Romance</option>
                        <option value="Action">Action</option>
                        <option value="Horror">Horror</option>
                        <option value="Comedy">Comedy</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Sutradara</label>
                    <input type="text" name="sutradara" class="form-control" placeholder="Nama Sutradara" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tahun Rilis</label>
                    <input type="number" name="tahun" class="form-control" placeholder="Tahun" min="1888" max="2025" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
