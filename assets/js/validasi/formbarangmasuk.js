function validateForm() {
    var tgl = document.forms["myForm"]["tgl"].value;
    var barang = document.forms["myForm"]["barang"].value;
    var supplier = document.forms["myForm"]["supplier"].value;
    var jmlbarang = document.forms["myForm"]["jmlbarang"].value;
    if (tgl == '') {
        validasi('Tanggal Masuk wajib di isi!', 'warning');
        return false;
    } else if (barang == '') {
        validasi('Barang wajib di isi!', 'warning');
        return false;
    } else if (supplier == '') {
        validasi('Supplier wajib di isi!', 'warning');
        return false;
    } else if (jmlbarang == '') {
        validasi('Jumlah Masuk wajib di isi!', 'warning');
        return false;
    }

}

function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}