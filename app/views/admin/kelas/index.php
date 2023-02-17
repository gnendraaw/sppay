<div class="container-fluid">
    <?php Flasher::flash(); ?>

    <div class="card shadow border-0 mb-4">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary m-0">Daftar Kelas</h6>
            <button class="btn btn-primary my-2" data-toggle="modal" data-target="#adminKelasModal" id="adminTambahKelasBtn">Tambah Data Kelas</button>
        </div>
        <div class="card-body py-3">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kelas</th>
                        <th>Kompetensi Keahlian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['kelas'] as $kelas):?>
                        <tr class="kelas-row" data-idkelas="<?=$kelas['id_kelas']?>">
                            <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Aksi:</div>
                                            <button class="dropdown-item" id="adminEditKelasBtn" data-toggle="modal" data-target="#adminKelasModal">Edit</button>
                                            <button class="dropdown-item text-danger" data-toggle="modal" data-target="#adminDeleteKelasModal" id="adminHapusKelasBtn">Hapus</button>
                                        </div>
                                    </div>
                            </td>
                            <td><?=$kelas['nama_kelas']?></td>
                            <td><?=$kelas['kompetensi_keahlian']?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- Admin SPP Modal-->
    <div class="modal fade" id="adminKelasModal" tabindex="-1" role="dialog" aria-labelledby="adminKelasModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminKelasModalLabel">Tambah Data Kelas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?=BASE_URL?>/admin-kelas/store" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" val="">
                            <label for="adminKelasNamaInput">Nama Kelas</label>
                            <input type="text" class="form-control" name="nama" id="adminKelasNamaInput" maxlength="32" required>
                        </div>
                        <div class="form-group">
                            <label for="adminKelasKompInput">Kompetensi Keahlian</label>
                            <input type="text" name="komp" id="adminKelasKompInput" class="form-control" required maxlength="64">
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Delete SPP Modal-->
    <div class="modal fade" id="adminDeleteKelasModal" tabindex="-1" role="dialog" aria-labelledby="adminDeleteKelasModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminDeleteKelasModalLabel">Hapus Data Kelas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin untuk hapus data kelas?
                    <form action="<?=BASE_URL?>/admin-kelas/delete" method="post">
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