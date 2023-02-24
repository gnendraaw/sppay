<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary m-0">Riwayat Pembayaran</h6>
        </div>
        <div class="card-body py-3">
            <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Tahun Ajaran</th>
                    <th>Nominal</th>
                </thead>
                <tbody>
                    <?php foreach($data['pembayaran'] as $key => $pembayaran): ?>
                        <tr>
                            <td><?=++$key?></td>
                            <td><?=$pembayaran['tgl_bayar']?></td>
                            <td><?=$pembayaran['nisn']?></td>
                            <td><?=$pembayaran['nis']?></td>
                            <td><?=$pembayaran['nama_siswa']?></td>
                            <td><?=$pembayaran['nama_kelas']?></td>
                            <td><?=$pembayaran['tahun']?></td>
                            <td><?=$pembayaran['nominal']?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>