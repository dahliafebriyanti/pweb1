<?php
include 'Latihan_09_config.php'; // Koneksi ke database

// Menampilkan daftar lowongan kerja
$sql = "SELECT * FROM bursa_kerja ORDER BY tanggal_post DESC";
$result = "INSERT INTO bursa_kerja (id, judul_pekerjaan, perusahaan, lokasi, deskripsi, tanggal_post) VALUES ('$id', '$judul_pekerjaan', '$perusahaan', '$lokasi', '$deskripsi' NOW())";
?>

<div class="container mt-5">
    <h2>Bursa Kerja</h2>
    <a href="?menu=tambahbursakerja" class="btn btn-primary mb-3">Tambah Lowongan</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul Pekerjaan</th>
                <th>Perusahaan</th>
                <th>Lokasi</th>
                <th>Deskripsi</th>
                <th>Tanggal Post</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['judul_pekerjaan']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['perusahaan']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['lokasi']) . "</td>";
                    echo "<td>" . nl2br(htmlspecialchars($row['deskripsi'])) . "</td>";
                    echo "<td>" . $row['tanggal_post'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Belum ada lowongan kerja.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
$conn->close();
?>
