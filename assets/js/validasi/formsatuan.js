function validateForm() {
    var satuan = document.forms["myForm"]["satuan"].value;

    if (satuan == "") {
        validasi('Nama Satuan wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var satuan = document.forms["myFormUpdate"]["satuan"].value;

    if (satuan == "") {
        validasi('Nama Satuan tidak boleh kosong!', 'warning');
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