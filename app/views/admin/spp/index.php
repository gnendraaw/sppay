<div class="container-fluid">
    <?php Flasher::flash(); ?>

    <div class="card shadow border-0 mb-4">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary m-0">Daftar SPP</h6>
            <button class="btn btn-primary my-2" data-toggle="modal" data-target="#adminSppModal" id="adminTambahSppBtn">Tambah Data SPP</button>
        </div>
        <div class="card-body py-3">
            <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tahun</th>
                        <th>Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['spp'] as $spp):?>
                        <tr class="spp-row" data-idspp="<?=$spp['id_spp']?>">
                            <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Aksi:</div>
                                            <button class="dropdown-item" id="adminEditSppBtn" data-toggle="modal" data-target="#adminSppModal">Edit</button>
                                            <!-- <div class="dropdown-divider"></div> -->
                                            <button class="dropdown-item text-danger" data-toggle="modal" data-target="#adminDeleteSppModal" id="adminHapusSppBtn">Hapus</button>
                                        </div>
                                    </div>
                            </td>
                            <td><?=$spp['tahun']?></td>
                            <td>Rp <?=$spp['nominal']?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- Admin SPP Modal-->
    <div class="modal fade" id="adminSppModal" tabindex="-1" role="dialog" aria-labelledby="adminSppModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminSppModalLabel">Tambah Data SPP</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?=BASE_URL?>/admin-spp/store" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" val="">
                            <label for="adminSppTahunInput">Tahun</label>
                            <input type="text" class="form-control" name="tahun" id="adminSppTahunInput" maxlength="4" required>
                        </div>
                        <div class="form-group">
                            <label for="adminSppNominalInput">Nominal</label>
                            <input type="number" class="form-control" name="nominal" id="adminSppNominalInput" required>
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
    <div class="modal fade" id="adminDeleteSppModal" tabindex="-1" role="dialog" aria-labelledby="adminDeleteSppModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminDeleteSppModalLabel">Hapus Data SPP</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin untuk hapus data SPP?
                    <form action="<?=BASE_URL?>/admin-spp/delete" method="post">
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