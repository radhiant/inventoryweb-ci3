const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: false,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

function sweetMixins(pesan, status) {

    Toast.fire({
        icon: status,
        title: pesan
    })

}

function sweetBiasa(pesan, status) {

    Swal.fire({
        icon: status,
        title: pesan,
        confirmButtonColor: '#4e73df',
    })

}