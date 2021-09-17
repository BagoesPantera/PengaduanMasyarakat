<script src="<?= BASEURL ?>auth/jquery/jquery.min.js"></script>
<script src="<?= BASEURL; ?>bootstrap/js/bootstrap.js"></script>
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
if($_SESSION['failbuat'] == true){
    echo "alert('gagal buat. coba lagi')";
    unset($_SESSION['failbuat']);
}
?>
</script>

</body>

</html>