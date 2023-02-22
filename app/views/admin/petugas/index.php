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
                        <tr class="petugas-row" data-idpetugas="<?=$petugas['id_petugas']?>">
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
                                            <button class="dropdown-item text-danger" data-toggle="modal" data-target="#adminDeletePetugasModal" id="adminDeletePetugasBtn">Hapus</button>
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

    <!-- Admin Delete Petugas Modal-->
    <div class="modal fade" id="adminDeletePetugasModal" tabindex="-1" role="dialog" aria-labelledby="adminDeletePetugasModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminDeleteSppModalLabel">Hapus Data Petugas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin untuk hapus data Petugas?
                    <form action="<?=BASE_URL?>/admin-petugas/delete" method="post">
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