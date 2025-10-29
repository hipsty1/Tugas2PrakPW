<?php
require 'connection.php';

$result = $mysqli->query("SELECT * FROM film ORDER BY id DESC");
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Manajemen Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-success navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Manajemen Film</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah.php">Tambah Film</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-8">
                <h2>Selamat Datang di Manajemen Film</h2>
                <h5>Ini adalah daftar film Anda</h5>

                <table class="table table-bordered align-middle mt-4">
                    <thead class="table-success text-center">
                        <tr>
                            <th>No</th>
                            <th>Judul Film</th>
                            <th>Genre</th>
                            <th>Tahun Rilis</th>
                            <th>Sutradara</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if ($result && $result->num_rows > 0) {
                            while ($film = $result->fetch_assoc()) {
                                echo "
                                <tr>
                                    <td class='text-center'>{$no}</td>
                                    <td>{$film['judul']}</td>
                                    <td>{$film['genre']}</td>
                                    <td>{$film['tahun']}</td>
                                    <td>{$film['sutradara']}</td>
                                    <td class='text-center'>
                                        <a href='edit.php?id={$film['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                        <a href='delete.php?id={$film['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Apakah Anda yakin ingin menghapus film ini?')\">Delete</a>
                                    </td>
                                </tr>";
                                $no++;
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center text-muted'>Belum ada data film.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="col-4 text-center">
                <img src="img/image.png" alt="Gambar Film" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
