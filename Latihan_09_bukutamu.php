<?php
include 'Latihan_09_config.php'; // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    // Menyimpan data ke database dengan tanggal
    $sql = "INSERT INTO buku_tamu (nama, email, pesan, tanggal) VALUES ('$nama', '$email', '$pesan', NOW())";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Pesan berhasil dikirim!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// Menampilkan daftar pesan
$sql = "SELECT * FROM buku_tamu ORDER BY tanggal DESC";
$sql = "INSERT INTO buku_tamu (nama, email, pesan, tanggal) VALUES ('$nama', '$email', '$pesan', NOW())";

?>

<div class="container mt-5">
    <h2>Buku Tamu</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
    </form>

    <h3 class="mt-5">Pesan yang Diterima</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . nl2br(htmlspecialchars($row['pesan'])) . "</td>";
                    echo "<td>" . $row['tanggal'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Belum ada pesan.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
$conn->close();
?>
