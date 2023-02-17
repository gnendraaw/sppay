<div class="container-fluid">
    <?php Flasher::flash(); ?>

    <div class="card shadow border-0 mb-4">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary m-0">Daftar Siswa</h6>
            <button class="btn btn-primary my-2" data-toggle="modal" data-target="#adminSiswaModal" id="adminTambahSiswaBtn">Tambah Data Siswa</button>
        </div>
        <div class="card-body py-3">
            <table class="table table-bordered" id="dataTable">
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
                        <tr class="siswa-row" data-idsiswa="<?=$siswa['id_siswa']?>">
                            <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Aksi:</div>
                                            <button class="dropdown-item" id="adminEditSiswaBtn" data-toggle="modal" data-target="#adminSiswaModal">Edit</button>
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

    <!-- Admin Siswa Modal-->
    <div class="modal fade" id="adminSiswaModal" tabindex="-1" role="dialog" aria-labelledby="adminKelasModal"
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
                    <form action="<?=BASE_URL?>/admin-siswa/store" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" val="">
                            <label for="adminNisnInput">NISN</label>
                            <input type="text" name="nisn" id="adminNisnInput" class="form-control" required maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="adminNisInput">NIS</label>
                            <input type="text" name="nis" id="adminNisInput" class="form-control" required maxlength="5">
                        </div>
                        <div class="form-group">
                            <label for="adminNamaInput">Nama Siswa</label>
                            <input type="text" name="nama" id="adminNamaInput" class="form-control" required maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="adminPasswordInput">Password</label>
                            <input type="password" name="password" id="adminPasswordInput" class="form-control" required maxlength="16">
                        </div>
                        <div class="form-group">
                            <label for="adminTelpInput">Telp</label>
                            <input type="text" name="telp" id="adminTelpInput" class="form-control" required maxlength="13">
                        </div>
                        <div class="form-group">
                            <label for="adminAlamatInput">Alamat</label>
                            <textarea name="alamat" class="form-control" id="adminAlamatInput" cols="30" rows="5" required></textarea>
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

    <!-- Admin Delete Siswa Modal-->
    <div class="modal fade" id="adminDeleteSiswaModal" tabindex="-1" role="dialog" aria-labelledby="adminDeleteKelasModal"
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