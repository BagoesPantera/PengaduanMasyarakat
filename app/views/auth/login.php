<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pengaduan Masyarakat - Masuk</title>
    <link rel="stylesheet" href="<?= BASEURL ?>auth/cssadmin/sb-admin-2.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>bootstrap/css/bootstrap.css">

</head>

<body class="bg-gradient-primary">
    <div class="container" >
        <div class="row justify-content-center">
            <div class="card o-hidden border-0 shadow-lg my-5" style="width:500px;">
                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Selamat Datang kembali!</h1>
                        </div>
                        <form class="user needs-validation" novalidate action="<?= BASEURL ?>auth/loginprocess" method="POST" autocomplete="off">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                    placeholder="Nama Pengguna" name="usernames" required>
                                <div class="invalid-feedback">
                                    Nama Pengguna Kosong
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Kata Sandi" name="passwords" required>
                                <div class="invalid-feedback">
                                    Kata Sandi Kosong
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block"> Masuk </button>
                        </form>


                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= BASEURL ?>auth/register">Daftar Akun!</a>
                        </div>
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
    if(isset($_SESSION['faillogin'])){
        echo "alert('Nama Pengguna atau Kata Sandi salah');";
        unset($_SESSION['faillogin']);
    }
    
    ?>
    </script>
</body>

</html>