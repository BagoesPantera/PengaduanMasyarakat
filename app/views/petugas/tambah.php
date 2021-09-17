<?php 
if($_SESSION['data']['level'] != 'admin'){
    header('Location: ' . BASEURL . 'user');
}
?>
<div class="container">
<form action="<?= BASEURL ?>petugas/input" method="post" autocomplete="off">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Petugas</label>
    <input type="text" class="form-control" name="namas" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Pengguna</label>
    <input type="text" class="form-control" name="usernames" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="passwords" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nomor Telpon</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="telps" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>