javascript
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
                alert('Alumni berhasil ditambahkan!');
                location.reload(); // Reload halaman untuk menampilkan data terbaru
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
                    alert('Alumni berhasil dihapus!');
                    $("#alumni_" + id).remove(); // Hapus baris alumni dari tabel
                }
            });
        }
    });
});
