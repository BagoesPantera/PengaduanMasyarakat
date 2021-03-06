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
</body>
</html>