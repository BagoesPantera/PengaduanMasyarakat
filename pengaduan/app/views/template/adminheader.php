<?php 
if($_SESSION['data'] == NULL){
    header('Location: ' . BASEURL . 'auth/login');
}elseif($_SESSION['data']['level'] == NULL){
    header('Location: ' . BASEURL . 'user');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Masyarakat - ADMIN</title>
    <link rel="stylesheet" href="<?= BASEURL ?>bootstrap/css/bootstrap.css">
    <script src="<?= BASEURL ?>auth/jquery/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= BASEURL ?>admin">Pengaduan Masyarakat</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link <?= $_GET['url'] == 'admin' ? 'active' : '' ?>" href="<?= BASEURL ?>admin">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $_GET['url'] == 'pengaduan' ? 'active' : '' ?>" href="<?= BASEURL ?>pengaduan">Daftar Pengaduan</a>
      </li>
      <?php if($_SESSION['data']['level'] == 'admin') :?>
      <li class="nav-item">
        <a class="nav-link <?= $_GET['url'] == 'petugas' ? 'active' : '' ?>" href="<?= BASEURL ?>petugas">CRUD Petugas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $_GET['url'] == 'admin/masyarakat' ? 'active' : '' ?>" href="<?= BASEURL ?>admin/masyarakat">Daftar Masyarakat</a>
      </li>
      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= BASEURL ?>auth/logout">Logout</a>
      </li>
    </ul>
    <span class="navbar-text">
      Halo <?= $_SESSION['data']["nama_petugas"]?>
    </span>
  </div>
</nav>