<?php 
if($_SESSION['data'] == NULL){
    header('Location: ' . BASEURL . 'auth/login');
}
if(isset($_SESSION['data']['level'])){
  header('Location: ' . BASEURL . 'admin');
}
if(!isset($data['judul'])){
  $data['judul'] = 'Pengaduan Masyarakat';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul'] ?></title>
    <link rel="stylesheet" href="<?= BASEURL ?>bootstrap/css/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= BASEURL ?>">Pengaduan Masyarakat</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link <?= $_GET['url'] == 'user' ? 'active' : '' ?>" href="<?= BASEURL ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $_GET['url'] == 'user/buat' ? 'active' : '' ?>" href="<?= BASEURL ?>user/buat">Buat Pengaduan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $_GET['url'] == 'user/history' ? 'active' : '' ?>" href="<?= BASEURL ?>user/history">Daftar Pengaduan</a>
      </li>
      <?php if(!empty($_SESSION['data']['level'])) : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= BASEURL ?>admin">ADMIN</a>
      </li>
      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= BASEURL ?>auth/logout">Logout</a>
      </li>
    </ul>
    <span class="navbar-text">
      Halo <?= $_SESSION['data']["username"]?>
    </span>
  </div>
</nav>
    