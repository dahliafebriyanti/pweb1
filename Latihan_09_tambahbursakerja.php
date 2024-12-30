<?php
include 'Latihan_09_config.php'; // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul_pekerjaan = $_POST['judul_pekerjaan'];
    $perusahaan = $_POST['perusahaan'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];

    // Menyimpan data lowongan kerja ke database
    $sql = "INSERT INTO bursa_kerja (judul_pekerjaan, perusahaan, lokasi, deskripsi) 
            VALUES ('$judul_pekerjaan', '$perusahaan', '$lokasi', '$deskripsi')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Lowongan kerja berhasil ditambahkan!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

$conn->close();
?>

<div class="container mt-5">
    <h2>Tambah Lowongan Kerja</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="judul_pekerjaan" class="form-label">Judul Pekerjaan</label>
            <input type="text" class="form-control" id="judul_pekerjaan" name="judul_pekerjaan" required>
        </div>
        <div class="mb-3">
            <label for="perusahaan" class="form-label">Perusahaan</label>
            <input type="text" class="form-control" id="perusahaan" name="perusahaan" required>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Lowongan</button>
    </form>
</div>
