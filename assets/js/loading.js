function loading() {
    Swal.fire({
        title: "Memuat...",
        onBeforeOpen: () => {
            Swal.showLoading()
        },
        showConfirmButton: false,
    })

}