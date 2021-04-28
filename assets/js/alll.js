$(document).ready(function() {
    ambilUser();
});

function ambilUser() {
    var id = $("[name='iduser']").val();
    var link = $('#baseurl').val();
    var base_url = link + 'profile/detail_data';
    var link_gambar = link + 'assets/upload/pengguna/';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function(hasil) {
            $("#namaP").text(hasil[0].nama_lengkap);
            document.getElementById('img').src = link_gambar + hasil[0].foto;
        }
    });
}

function pesanHeader(judul, deskripsi, status) {
    swal.fire({
        title: judul,
        text: deskripsi,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}