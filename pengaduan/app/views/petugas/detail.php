<?php 
if($_SESSION['data']['level'] != 'admin'){
    header('Location: ' . BASEURL . 'user');
}
?>
<div class="container">
<form class=" needs-validation" novalidate action="<?= BASEURL ?>petugas/update" method="post" autocomplete="off">
  <input type="hidden" name="ids" value="<?= $data['data']['id_petugas'] ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Petugas</label>
    <input type="text" class="form-control" name="namas" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$data['data']['nama_petugas'] ?>" required>
    <div class="invalid-feedback">
        Nama Petugas Kosong
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Pengguna</label>
    <input type="text" class="form-control" name="usernames" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$data['data']['username'] ?>" required>
    <div class="invalid-feedback">
        nama Pengguna Kosong
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Kata Sandi</label>
    <input type="password" class="form-control" name="passwords" id="exampleInputPassword1" value="<?=$data['data']['password'] ?>" required>
    <div class="invalid-feedback">
        Kata Sandi Kosong
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nomor Telpon</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="telps" aria-describedby="emailHelp" value="<?=$data['data']['telp'] ?>" required>
    <div class="invalid-feedback">
        Nomor Telpon Kosong
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>