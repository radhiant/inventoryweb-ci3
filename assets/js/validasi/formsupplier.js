function validateForm() {
    var supplier = document.forms["myForm"]["supplier"].value;
    var notelp = document.forms["myForm"]["notelp"].value;
    var alamat = document.forms["myForm"]["alamat"].value;

    if (supplier == "") {
        validasi('Nama Supplier wajib di isi!', 'warning');
        return false;
    } else if (notelp == "") {
        validasi('Nomor Telepon wajib di isi!', 'warning');
        return false;
    } else if (alamat == "") {
        validasi('Alamat wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var supplier = document.forms["myFormUpdate"]["supplier"].value;
    var notelp = document.forms["myFormUpdate"]["notelp"].value;
    var alamat = document.forms["myFormUpdate"]["alamat"].value;

    if (supplier == "") {
        validasi('Nama Supplier wajib di isi!', 'warning');
        return false;
    } else if (notelp == "") {
        validasi('Nomor Telepon wajib di isi!', 'warning');
        return false;
    } else if (alamat == "") {
        validasi('Alamat wajib di isi!', 'warning');
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