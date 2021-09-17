<div class="container">
    <!-- KELUHAN -->
    <div class="card mb-3">
        <img src="<?= BASEURL ?>img/masyarakat/keluhan/<?= $data['pengaduan']['foto'] ?>" class="card-img-top" alt="..." height="300" style=" object-fit: cover;">
        <div class="card-body">
        <button type="button" class="close" data-toggle="modal" data-target="#exampleModalCenter" style="font-size:14px;" >Pratinjau Gambar</button>
            <h5 class="card-title"><?= $data['user']['username'] ?></h5>
            <p class="card-text"><?= $data['pengaduan']['subject'] ?></p>
            <p class="card-text"> <?= $data['pengaduan']['isi_laporan'] ?></p>
            <p class="card-text"><small class="text-muted"><?= $data['pengaduan'] ["tgl_pengaduan"]?></small></p>
        </div>
    </div>

    <!-- TANGGAPAN -->
    <?php if(!empty($data['tanggapan'])): ?>
        <?php foreach($data['tanggapan'] as $tanggapan) : ?>
            <div class="alert alert-secondary ml-5" role="alert">
                <h5 class="alert-heading">Tanggapan <?= $tanggapan['nama_petugas'] ?></h5>
                <p><?= $tanggapan['tanggapan'] ?></p>
                <p class="card-text"><small class="text-muted"><?= $tanggapan['tgl_tanggapan']?></small></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- ALERT TANGGAPAN SELESAI -->
    <?php if($data['pengaduan']['status'] == 'selesai') : ?>
        <div class="alert alert-success" role="alert">
            Aduan ini sudah selesai.
        </div>
    <?php endif; ?>

    <!-- FORM TAMBAH TANGGAPAN -->
    <?php 
    $pengaduan = $data['pengaduan']['status'] != 'selesai';
    if(isset($_SESSION['data']['level'])){
        $level = $_SESSION['data']['level'] == 'petugas';
    }else{
        $level = false;
    }
    ?>
    <?php  if($level && $pengaduan): ?>
        <div class="card">
            <h5 class="card-header">Tanggapan</h5>
            <div class="card-body">
                <h5 class="card-title"><?= $_SESSION['data']['username'] ?></h5>
                <form class="needs-validation" novalidate action="<?= BASEURL ?>/pengaduan/submitTanggapan" method="POST">
                <input type="hidden" name="id_pengaduans" value="<?= $data['pengaduan']['id_pengaduan'] ?>">
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi" required></textarea>
                        <div class="invalid-feedback">
                            Tanggapan Kosong
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <p class="card-text"><small class="text-muted">Jika anda menanggapi aduan ini, status akan otomatis berubah menjadi proses.</small></p>
            </div>
        </div>
    <?php endif; ?>

    <!-- MARK AS DONE -->
    <?php if(!isset($_SESSION['data']['level']) && $pengaduan): ?>
        <form action="<?= BASEURL ?>/pengaduan/tandaiSelesai" method="post">
            <input type="hidden" name="id" value="<?= $data['pengaduan']['id_pengaduan'] ?>">
            <button type="submit" class="btn btn-success">Tandai aduan ini selesai</button>
        </form>
    <?php endif; ?>

    <!-- PREVIEW -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Pratinjau Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="<?= BASEURL ?>img/masyarakat/keluhan/<?= $data['pengaduan']['foto'] ?>" class="card-img-top" alt="...">
                </div>
            </div>
        </div>
    </div>

</div>
<script>
<?php 
//tanggapan
if(isset($_SESSION['succestanggapan'])){
    echo "alert('Tanggapan Berhasil ditambahkan')";
    unset($_SESSION['succestanggapan']);
}
if(isset($_SESSION['gagaltanggapan'])){
    echo "alert('Tanggapan Gagal ditambahkan, coba lagi!')";
    unset($_SESSION['gagaltanggapan']);
}

//selesai MARK AS DONE
if(isset($_SESSION['successselesai'])){
    echo "alert('Aduan sudah ditandai sebagai selesai !')";
    unset($_SESSION['successselesai']);
}

if(isset($_SESSION['gagalselesai'])){
    echo "alert('Gagal ! Coba lagi !')";
    unset($_SESSION['gagalselesai']);
}
?>
</script>