<div class="container-fluid">
    <?php Flasher::flash(); ?>

    <div class="card shadow border-0 mb-4">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary m-0">Daftar Petugas</h6>
            <a class="btn btn-primary my-2" href="<?=BASE_URL?>/admin-petugas/create">Tambah Data Petugas</a>
        </div>
        <div class="card-body py-3">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Nama Petugas</th>
                        <th>Nama Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['petugas'] as $petugas):?>
                        <tr class="siswa-row" data-idsiswa="<?=$petugas['id_petugas']?>">
                            <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Aksi:</div>
                                            <a href="<?=BASE_URL?>/admin-petugas/detail/<?=$petugas['id_petugas']?>" class="dropdown-item" id="adminDetailPetugasBtn">Detail</a>
                                            <button class="dropdown-item text-danger" data-toggle="modal" data-target="#adminDeletePetugasBtn" id="adminDeletePetugasBtn">Hapus</button>
                                        </div>
                                    </div>
                            </td>
                            <td><?=$petugas['username']?></td>
                            <td><?=$petugas['nama_petugas']?></td>
                            <td><?=$petugas['keterangan']?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>