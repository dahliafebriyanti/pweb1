<?php
// Membaca data alumni dari file JSON
$dataAlumni = json_decode(file_get_contents('data_alumni.json'), true);
$id = $_POST['id'];

// Menemukan dan menghapus data berdasarkan ID
$dataAlumni = array_filter($dataAlumni, function($alumni) use ($id) {
    return $alumni['id'] != $id;
});

// Menyusun ulang array dan menyimpan kembali ke file JSON
file_put_contents('data_alumni.json', json_encode(array_values($dataAlumni)));

echo "Data alumni berhasil dihapus!";
?>
