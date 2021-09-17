<div class="container">
    <h1>Form Pengaduan Masyarakat</h1>
    <form action="<?= BASEURL ?>user/buatproses" class="needs-validation" novalidate enctype="multipart/form-data" method="post" autocomplete="off">
    <div class="form-group">
        <label for="exampleInputEmail1">Subjek</label>
        <input type="text" name="subjects" class="form-control" id="exampleInputEmail1" required>
            <div class="invalid-feedback">
                Subjek Kosong
            </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Keluhan</label>
        <textarea class="form-control" name="isis" id="exampleFormControlTextarea1" rows="3" required></textarea>
            <div class="invalid-feedback">
                Keluhan Kosong
            </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Foto</label>
        <input type="file" name="fotos" class="form-control-file" id="exampleFormControlFile1" required>
            <div class="invalid-feedback">
                Foto Kosong
            </div>
  </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
<script>
<?php 
if(isset($_SESSION['failbuat'])){
    echo "alert('Aduan gagal ditambahkan!')";
    unset($_SESSION['failbuat']);
}
?>
</script>