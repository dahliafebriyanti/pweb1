<?php
// Membaca data alumni dari file JSON
$dataAlumni = json_decode(file_get_contents('data_alumni.json'), true);

// Mendapatkan data dari form POST
$nama = $_POST['nama'];
$tahun_kelulusan = $_POST['tahun_kelulusan'];
$jurusan = $_POST['jurusan'];
$status = $_POST['status'];

// Menambahkan ID baru
$id = count($dataAlumni) + 1;
$dataAlumni[] = ["id" => $id, "nama" => $nama, "tahun_kelulusan" => $tahun_kelulusan, "jurusan" => $jurusan, "status" => $status];

// Menulis kembali data ke file JSON
file_put_contents('data_alumni.json', json_encode($dataAlumni));

echo "Data alumni berhasil ditambahkan!";
?>
