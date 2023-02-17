<div class="container-fluid">
    <?php Flasher::flash(); ?>

    <div class="card shadow border-0 mb-4">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary m-0">Daftar Siswa</h6>
            <a class="btn btn-primary my-2" href="<?=BASE_URL?>/admin-siswa/create">Tambah Data Siswa</a>
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