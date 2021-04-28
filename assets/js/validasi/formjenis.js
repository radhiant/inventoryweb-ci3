function validateForm() {
    var jenis = document.forms["myForm"]["jenis"].value;

    if (jenis == "") {
        validasi('Nama Jenis wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var jenis = document.forms["myFormUpdate"]["jenis"].value;

    if (jenis == "") {
        validasi('Nama Jenis tidak boleh kosong!', 'warning');
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