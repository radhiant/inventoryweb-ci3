<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image">
                            <div class="p-5">
                            <br>
                            <div class="judul">
                                <center>
                                    <img width="150px" src="<?= base_url() ?>assets/icon/box.png" alt="">
                                </center>
                            </div>
                                <br>
                                <div class="spinner">
                                    <div class="double-bounce1"></div>
                                    <div class="double-bounce2"></div>
                                </div>
                                <div class="judul">
                                    <hr class="bg-white">
                                    <br>
                                    <div class="text-center">
                                        <h1 class="h2 text-white mb-4"><b>APLIKASI</b></h1>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h3 text-white mb-4">INVENTORY BARANG</h1>
                                    </div>
                                    <hr class="bg-white">
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <br>
                                <br>
                                <br>
                                <br>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="user" name="user" aria-describedby="usernameHelp"
                                            placeholder="Username" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="pwd" name="pwd" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <br>
                                        <hr>
                                    </div>
                                    <a href="#" onclick="proses_login()" id="login"
                                        class="btn btn-primary btn-user btn-block shadow">
                                        Login
                                    </a>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/login.js"></script>
<?php if($this->session->flashdata('Pesan')): ?>
<?= $this->session->flashdata('Pesan'); ?>
<?php else: ?>
<script>
$(document).ready(function() {

    let timerInterval
    Swal.fire({
        title: 'Memuat...',
        timer: 1000,
        onBeforeOpen: () => {
            Swal.showLoading()
        },
        onClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {
        
    })
});
</script>
<?php endif; ?>