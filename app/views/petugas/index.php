<?php 
if($_SESSION['data']['level'] != 'admin'){
    header('Location: ' . BASEURL . 'user');
}
?>
<div class="container">
    <h4>Daftar Petugas</h4>
    <a href="<?= BASEURL ?>petugas/tambah" class="badge badge-primary">Tambah</a>
<table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Username</th>
        <th scope="col">Telp</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $id=1; foreach ($data['data'] as $datas): ?>
        <tr>
        <th scope="row"><?= $id ?></th>
        <td><?= $datas['nama_petugas'] ?></td>
        <td><?= $datas['username'] ?></td>
        <td><?= $datas['telp'] ?></td>
        <td><a href="<?= BASEURL ?>petugas/detail/<?=$datas['id_petugas']?>" class="badge badge-primary">Detail</a></td>
        </tr>
        <?php $id++; endforeach; ?>
    </tbody>
    </table>
</div>
<script>
<?php 
//Update
if(isset($_SESSION['upsuc'])){
    echo "alert('Update berhasil.')";
    unset($_SESSION['upsuc']);
}
if(isset($_SESSION['upfail'])){
    echo "alert('Update gagal.')";
    unset($_SESSION['upfail']);
}
if(isset($_SESSION['upfailexist'])){
    echo "alert('Username sudah terdaftar.')";
    unset($_SESSION['upfailexist']);
}

// INPUT
if(isset($_SESSION['insuc'])){
    echo "alert('Input berhasil.')";
    unset($_SESSION['insuc']);
}
if(isset($_SESSION['failinput'])){
    echo "alert('Input gagal.')";
    unset($_SESSION['failinput']);
}
?>
</script>