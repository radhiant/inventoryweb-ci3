$(document).ready(function() {
    ambilData();
});

function ambilData() {
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
            $("#namaL").text(hasil[0].nama);
            $("#email").text(hasil[0].email);
            $("#notelp").text(hasil[0].notelp);
            $("#status").text(hasil[0].status);
            $("#level").text(hasil[0].level);
            document.getElementById('outputImg').src = link_gambar + hasil[0].foto;
        }
    });
}


function pesan(judul, deskripsi, status) {
    swal.fire({
        title: judul,
        text: deskripsi,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}