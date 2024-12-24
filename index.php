<?php
// Membaca data alumni dari file JSON
$dataAlumni = json_decode(file_get_contents('data_alumni.json'), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Alumni</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Tracer Alumni</h1>

    <!-- Form untuk menambah alumni -->
    <h3>Tambah Alumni</h3>
    <form id="formAlumni">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" required><br><br>
        <label for="tahun_kelulusan">Tahun Kelulusan:</label><br>
        <input type="text" id="tahun_kelulusan" required><br><br>
        <label for="jurusan">Jurusan:</label><br>
        <input type="text" id="jurusan" required><br><br>
        <label for="status">Status:</label><br>
        <select id="status">
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
        </select><br><br>
        <button type="submit">Tambah Alumni</button>
    </form>

    <!-- Tabel untuk menampilkan data alumni -->
    <h3>Daftar Alumni</h3>
    <table id="tabelAlumni">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tahun Kelulusan</th>
                <th>Jurusan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Membaca data alumni dari file JSON
                $dataAlumni = json_decode(file_get_contents('data_alumni.json'), true);

                // Menampilkan data alumni dalam tabel
                foreach($dataAlumni as $alumni): ?>
                    <tr id="alumni_<?php echo $alumni['id']; ?>">
                        <td><?php echo $alumni['id']; ?></td>
                        <td><?php echo $alumni['nama']; ?></td>
                        <td><?php echo $alumni['tahun_kelulusan']; ?></td>
                        <td><?php echo $alumni['jurusan']; ?></td>
                        <td><?php echo $alumni['status']; ?></td>
                        <td><button class="delete-btn" data-id="<?php echo $alumni['id']; ?>">Hapus</button></td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            // Menambahkan alumni
            $("#formAlumni").submit(function(e) {
                e.preventDefault();

                var nama = $("#nama").val();
                var tahun_kelulusan = $("#tahun_kelulusan").val();
                var jurusan = $("#jurusan").val();
                var status = $("#status").val();

                // Kirim data ke server menggunakan AJAX
                $.ajax({
                    url: 'add_alumni.php',
                    type: 'POST',
                    data: {
                        nama: nama,
                        tahun_kelulusan: tahun_kelulusan,
                        jurusan: jurusan,
                        status: status
                    },
                    success: function(response) {
                        alert(response); // Menampilkan respons dari server
                        location.reload(); // Reload halaman untuk menampilkan data terbaru
                    },
                    error: function(xhr, status, error) {
                        alert("Terjadi kesalahan: " + xhr.responseText);
                    }
                });
            });

            // Menghapus alumni
            $(".delete-btn").click(function() {
                var id = $(this).data("id");

                if (confirm("Apakah Anda yakin ingin menghapus alumni ini?")) {
                    $.ajax({
                        url: 'delete_alumni.php',
                        type: 'POST',
                        data: { id: id },
                        success: function(response) {
                            alert(response); // Menampilkan respons dari server
                            $("#alumni_" + id).remove(); // Hapus baris alumni dari tabel
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>

