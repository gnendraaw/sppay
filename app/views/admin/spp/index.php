<div class="container-fluid">
    <?php Flasher::flash(); ?>

    <div class="card shadow o-hidden border-0 mb-4">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary m-0">Daftar SPP</h6>
            <button class="btn btn-primary my-2" data-toggle="modal" data-target="#adminSppModal">Tambah Data SPP</button>
        </div>
        <div class="card-body py-3">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tahun</th>
                        <th>Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; ?>
                    <?php foreach($data['spp'] as $spp):?>
                        <?php $i++ ?>
                        <tr>
                            <td><?=$i?></td>
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
                    <form action="<?=BASE_URL?>/spp/store" method="post">
                        <div class="form-group">
                            <label for="adminSppTahunInput">Tahun</label>
                            <input type="text" class="form-control" name="tahun" id="adminSppTahunInput" maxlength="4" required>
                        </div>
                        <div class="form-group">
                            <label for="adminSppNominalInput">Nominal</label>
                            <input type="number" class="form-control" name="nominal" id="adminSppNominalInput" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>