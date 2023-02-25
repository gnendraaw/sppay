<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary m-0">Riwayat Pembayaran</h6>
        </div>
        <div class="card-body py-3">
            <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                    <th>#</th>
                    <th>Tanggal Bayar</th>
                    <th>Bulan Dibayar</th>
                    <th>Tahun Ajaran</th>
                    <th>Nominal</th>
                </thead>
                <tbody>
                    <?php foreach($data['pembayaran'] as $key => $pembayaran): ?>
                        <tr>
                            <td><?=++$key?></td>
                            <td><?=$pembayaran['tgl_bayar']?></td>
                            <td><?=$pembayaran['bulan_bayar']?></td>
                            <td><?=$pembayaran['tahun_bayar']?></td>
                            <td>Rp <?=$pembayaran['jumlah_bayar']?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>