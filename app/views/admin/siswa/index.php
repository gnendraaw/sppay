<div class="container-fluid">
    <?php Flasher::flash(); ?>

    <div class="card shadow border-0 mb-4">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary m-0">Daftar Siswa</h6>
            <a class="btn btn-primary my-2" href="<?=BASE_URL?>/admin-siswa/create">Tambah Data Siswa</a>
        </div>
        <div class="card-body py-3">
            <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Telp</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['siswa'] as $siswa):?>
                        <tr class="siswa-row" data-idsiswa="<?=$siswa['id_pengguna']?>">
                            <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Aksi:</div>
                                            <a href="<?=BASE_URL?>/admin-siswa/detail/<?=$siswa['id_siswa']?>" class="dropdown-item" id="adminDetailSiswaBtn">Detail</a>
                                            <button class="dropdown-item text-danger" data-toggle="modal" data-target="#adminDeleteSiswaModal" id="adminDeleteSiswaBtn">Hapus</button>
                                        </div>
                                    </div>
                            </td>
                            <td><?=$siswa['nisn']?></td>
                            <td><?=$siswa['nis']?></td>
                            <td><?=$siswa['nama_siswa']?></td>
                            <td><?=$siswa['no_telp']?></td>
                            <td><?=$siswa['alamat']?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- Admin Delete Siswa Modal-->
    <div class="modal fade" id="adminDeleteSiswaModal" tabindex="-1" role="dialog" aria-labelledby="adminDeleteSiswaModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminDeleteSiswaModal">Hapus Data Siswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin untuk hapus data Siswa?
                    <br>
                    Dengan menghapus data siswa, riwayat pembayaran SPP siswa juga akan terhapus!
                    <form action="<?=BASE_URL?>/admin-siswa/delete" method="post">
                        <input type="hidden" name="id" value="">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>