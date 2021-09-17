<div class="container">
<h4>Data Masyarakat</h4>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Nama Pengguna</th>
                <th scope="col">Nomor Telpon</th>
            </tr>
        </thead>
        <tbody>
            <?php $id=1; foreach($data['masyarakat'] as $datas) : ?>
                <tr>
                    <th scope="row"><?= $id ?></th>
                    <td><?= $datas['nama'] ?></td>
                    <td><?= $datas['username'] ?></td>
                    <td><?= $datas['telp'] ?></td>
                </tr>
            <?php $id++; endforeach; ?>
        </tbody>
    </table>
</div>