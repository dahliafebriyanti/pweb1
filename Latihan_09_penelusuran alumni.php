<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "database_anda"; // Ganti dengan nama database yang sesuai

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Membuat tabel alumni
$sql_create_table = "CREATE TABLE IF NOT EXISTS alumni (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    tahun_lulus YEAR NOT NULL,
    jurusan VARCHAR(100) NOT NULL,
    foto VARCHAR(255) NOT NULL
)";

// Mengeksekusi query untuk membuat tabel
if ($conn->query($sql_create_table) === TRUE) {
    echo "Tabel alumni berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error: " . $sql_create_table . "<br>" . $conn->error;
}

// Menyisipkan data alumni
$sql_insert_data = "INSERT INTO alumni (nama, tahun_lulus, jurusan, foto) 
                    VALUES ('John Doe', 2020, 'Teknik Informatika', 'path/to/photo.jpg')";

// Mengeksekusi query untuk memasukkan data
if ($conn->query($sql_insert_data) === TRUE) {
    echo "Data alumni berhasil dimasukkan.<br>";
} else {
    echo "Error: " . $sql_insert_data . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
