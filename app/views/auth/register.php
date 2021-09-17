<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pengaduan Masyarakat - Daftar</title>

    <!-- Custom fonts for this template-->

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="<?= BASEURL ?>auth/cssadmin/sb-admin-2.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>bootstrap/css/bootstrap.css">
    
</head>

<body class="bg-gradient-primary">

    <div class="container" style="width:700px;">

        <div class="card o-hidden border-0 shadow-lg my-5" >
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Daftar Akun!</h1>
                    </div>
                    <form class="user needs-validation" novalidate method="POST" action="<?= BASEURL ?>auth/cekregister" autocomplete="off">
                        <div class="form-group">
                            <input type="text" name="niks" id="name" placeholder="NIK" class="form-control form-control-user" required/>
                            <div class="invalid-feedback">
                                NIK Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="namas" id="email" placeholder="Nama" class="form-control form-control-user" required/>
                            <div class="invalid-feedback">
                                Nama Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="usernames" id="pass" placeholder="Nama Pengguna" class="form-control form-control-user" required/>
                            <div class="invalid-feedback">
                                Nama Pengguna Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="passwords" id="re_pass" placeholder="Kata Sandi" class="form-control form-control-user" required/>
                            <div class="invalid-feedback">
                                Kata Sandi Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="telps" id="re_pass" placeholder="Nomor Telpon" class="form-control form-control-user" required/>
                            <div class="invalid-feedback">
                                Nomor Telpon Kosong
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
                    </form>
                    <hr> 
                    <div class="text-center">
                        <a class="small" href="<?= BASEURL ?>auth/login">Sudah Punya Akun ? Masuk</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= BASEURL ?>auth/jquery/jquery.min.js"></script>
    <script src="<?= BASEURL ?>bootstrap/js/boostrap.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= BASEURL ?>auth/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= BASEURL ?>auth/js/sb-admin-2.min.js"></script>
    <!-- bootstrap validate default -->
    <script>
    (function () {
        'use strict'

        window.addEventListener('load', function () {

            var forms = document.getElementsByClassName('needs-validation')

            Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        }, false)
        })()
    </script>
    <script>
        <?php
        if(isset($_SESSION['failregisexist'])){
            echo "alert('Username atau NIK sudah terdaftar.')";
            unset($_SESSION['failregisexist']);
        }

        if(isset($_SESSION['failregis'])){
            echo "alert('Registrasi gagal, coba lagi !')";
            unset($_SESSION['failregis']);
        }
        ?>
    </script>
</body>

</html>