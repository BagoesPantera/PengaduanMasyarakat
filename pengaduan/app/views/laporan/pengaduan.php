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
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASEURL ?>bootstrap/css/bootstrap.css">
    <!-- DEFAULT STYLE FOR PRINT -->
    <style type="text/css" media="print">
    @page 
    {
        size:  auto;
        margin: 0mm; 
    }

    html
    {
        background-color: #FFFFFF; 
        margin: 0px;
    }
    </style>
</head>
<body>
<div class="text-center">
    <h1>PEMERINTAH KOTA MAYA</h1>
    <h3>DESA MAYA KECAMATAN MAYA</h3>
    <h5>Jalan Maya Desa Maya Kode Pos 666</h5>
</div>
<div class="shadow p-3 mb-5 bg-white rounded mt-5">
    <h3 class="text-center">Laporan Pengaduan</h3>
    <?php if(empty($data['history'])) : ?>
    <h5 class="text-center">Tidak ada laporan.</h5>
    <?php endif; ?>
    <?php if(!empty($data['history'])) : ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subjek</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal Pengaduan</th>
                </tr>
            </thead>
            <tbody>
            <?php $id=1; foreach ($data['history'] as $datas): ?>
                <tr>
                    <th scope="row"><?= $id ?></th>
                    <td><?= $datas['subject'] ?></td>
                    <td><?= $datas['status'] == '0' ? 'belum di proses' : $datas['status'] ?></td>
                    <td><?= $datas['tgl_pengaduan'] ?></td>
                </tr>
                <?php $id++; endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <div class="row">
    <div class="col">
      <p class="text-left"><?= $data['waktu'] ?></p>
    </div>
    <div class="col">
      <p class="text-right h5">Tes, <?= date("d M Y") ?></p>
    <p class="text-right h5">Petugas</p>
    <p class="text-right mt-3 h5"><?= $_SESSION['data']['nama_petugas'] ?></p>
    </div>
  </div>
    
</div>
    
<script src="<?= BASEURL ?>auth/jquery/jquery.min.js"></script>
<script src="<?= BASEURL; ?>bootstrap/js/bootstrap.js"></script>
<script>
$(document).ready(function () {
    window.print();
});

</script>
</body>
</html>
