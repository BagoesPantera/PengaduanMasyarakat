<div class="container">
    <?php if(!empty($data['history'])): ?>
    <h2>Daftar Pengaduan</h2>
    <button onclick="print()" class="btn btn-primary mt-3">Buat Laporan</button>
    <form action="<?= BASEURL ?>pengaduan" class="form-inline" method="get">
        <div class="form-group">
        <?php isset($_GET['waktu']) ? $waktu = $_GET['waktu'] : $waktu = 'default' ?>
            <label for="exampleFormControlSelect1">Pilih tampil berdasarkan : </label>
            <select class="form-control" id="exampleFormControlSelect1" name="waktu" onchange="this.form.submit()">
                <option <?= $waktu == 'Hari Ini' ? 'selected="selected"' : '' ?>>Hari Ini</option>
                <option <?= $waktu == '1 Bulan Terakhir' ? 'selected="selected"' : '' ?>>1 Bulan Terakhir</option>
                <option <?= $waktu == '1 Tahun Terakhir' ? 'selected="selected"' : '' ?>>1 Tahun Terakhir</option>
                <option <?= $waktu == 'default' ? 'selected="selected"' : '' ?> disabled>Pilih</option>
            </select>
        </div>
    </form>

    <form class="form-inline mt-2" action="<?= BASEURL ?>pengaduan" method="get" autocomplete="off">
        <input class="form-control mr-sm-2" type="search" <?= isset($_GET['search']) ? 'value="'. $_GET['search'] . '"' : '' ?> placeholder="Search" name="search" aria-label="Search" id="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <table class="table mt-2">
    <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Subjek</th>
        <th scope="col">Status</th>
        <th scope="col">Tanggal Pengaduan</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php if(!isset($data['kosong'])) : ?>
        <?php $id=1; foreach ($data['history'] as $datas): ?>
        <tr>
            <th scope="row"><?= $id ?></th>
            <td><?= $datas['subject'] ?></td>
            <td><?= $datas['status'] == '0' ? 'belum di proses' : $datas['status'] ?></td>
            <td><?= $datas['tgl_pengaduan'] ?></td>
            <td><a href="<?= BASEURL ?>pengaduan/detail/<?= $datas['id_pengaduan'] ?>" class="badge badge-primary">Detail</a></td>
        </tr>
        <?php $id++; endforeach; ?>
        <?php endif; ?>
    </tbody>
    </table>
        <?php endif; ?>      
        <?php if(empty($data['history'])): ?>
    <img src="<?= BASEURL ?>/img/ui/sad.png" class="rounded mx-auto d-block mt-3" alt="Muat kembali untuk menampilkan gambar !">
    <div class="text" style="text-align:center;">
        <h3><strong>Anda belum memiliki pengaduan</strong></h3>
        <p>Punya keluhan ? <a href="<?= BASEURL ?>user/buat" >Buat Pengaduan</a></p>
        
    </div>
        <?php endif; ?>
</div>

<script>
function print() {

$("<iframe>")
    .hide()
    .attr("src", "<?= BASEURL ?>laporan/pengaduan<?= $waktu == 'Hari Ini' ? '?waktu=Hari+Ini' : '' ?><?= $waktu == '1 Bulan Terakhir' ? '?waktu=1+Bulan+Terakhir' : '' ?><?= $waktu == '1 Tahun Terakhir' ? '?waktu=1+Tahun+Terakhir' : '' ?>")
    .appendTo("body");

}
</script>