// script.js

$(document).ready(function() {
    // Efek fade-in untuk semua gambar setelah halaman dimuat
    $('.gallery-item').each(function(index) {
        $(this).delay(index * 200).fadeIn(1000); // Menambahkan delay agar gambar muncul satu per satu
    });

    // Menampilkan modal ketika gambar diklik
    $('.gallery-item').click(function() {
        var imgSrc = $(this).attr('src'); // Ambil sumber gambar yang diklik
        $('#modal-img').attr('src', imgSrc); // Set gambar modal dengan gambar yang diklik
        $('#modal').fadeIn(); // Tampilkan modal
    });

    // Menutup modal ketika tombol close diklik
    $('.close').click(function() {
        $('#modal').fadeOut(); // Sembunyikan modal
    });

    // Menutup modal jika pengguna mengklik di luar gambar modal
    $(window).click(function(event) {
        if ($(event.target).is('#modal')) {
            $('#modal').fadeOut(); // Sembunyikan modal jika klik di luar gambar
        }
    });
});
