<div class="container-fluid">
    <?php Flasher::flash(); ?>

    <div class="card shadow border-0 mb-4">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary m-0">Daftar Siswa</h6>
        </div>
        <div class="card-body py-3">
            <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['siswa'] as $key => $siswa): ?>
                        <tr>
                            <td class="text-right"><?=++$key?></td>
                            <td><?=$siswa['nisn']?></td>
                            <td><?=$siswa['nis']?></td>
                            <td><?=$siswa['nama_siswa']?></td>
                            <td><?=$siswa['nama_kelas']?></td>
                            <td><a href="<?=BASE_URL?>/petugas-pembayaran/detail/<?=$siswa['id_siswa']?>" class="btn btn-primary">Bayar</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>