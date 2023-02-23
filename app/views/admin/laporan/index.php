<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="text-primary font-weight-bold m-0">Laporan Pembayaran SPP Siswa</h6>
        </div>
        <div class="card-body py-3">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <th>#</th>
                    <?php foreach($data['bulan'] as $bulan): ?>
                        <th><?=$bulan?></th>
                    <?php endforeach ?>
                </thead>
                <tbody>
                    <?php foreach($data['siswa'] as $siswa): ?>
                        <tr>
                            <td><?=$siswa['nama_siswa']?></td>
                            <?php foreach($data['bulan'] as $bulan): ?>
                                <td>
                                    <?=in_array($bulan, $data['pembayaran'][$siswa['id_siswa']]) ? 'v' : 'x' ?>
                                </td>
                            <?php endforeach ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>