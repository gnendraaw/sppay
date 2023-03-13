<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 text-primary text-uppercase font-weight-bold">
                daftar siswa
            </h6>
        </div>
        <div class="card-body py-3">
            <table class="table table-striped" id="dataTable">
                <thead>
                    <th>#</th>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php foreach($data['siswa'] as $key => $siswa): ?>
                        <tr>
                            <td><?=++$key?></td>
                            <td><?=$siswa['nisn']?></td>
                            <td><?=$siswa['nis']?></td>
                            <td><?=$siswa['nama_siswa']?></td>
                            <td>
                                <a href="<?=BASE_URL?>/admin-transaksi/detail/<?=$siswa['id_siswa']?>" class="btn btn-primary">Bayar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>