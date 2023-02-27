<div class="container-fluid">
    <?php Flasher::flash(); ?>

    <div class="row mb-4">
        <div class="col-lg-4">
            <div class="card  mb-4">
                <div class="card-body py-3">
                    <div class="col-12 mb-4">
                        <img class="rounded-circle" src="<?=BASE_URL?>/img/undraw_profile.svg" alt="...">
                    </div>
                    <div class="col mb-3">
                        <h6 class="text-muted mb-1">NISN</h6>
                        <h6 class="font-weight-bold text-grey-800 m-0"><?=$data['siswa']['nisn']?></h6>
                    </div>
                    <div class="col mb-3">
                        <h6 class="text-muted mb-1">NIS</h6>
                        <h6 class="font-weight-bold text-grey-800 m-0"><?=$data['siswa']['nis']?></h6>
                    </div>
                    <div class="col mb-3">
                        <h6 class="text-muted mb-1">Nama Lengkap</h6>
                        <h6 class="font-weight-bold text-grey-800 m-0"><?=$data['siswa']['nama_siswa']?></h6>
                    </div>
                    <div class="col mb-3">
                        <h6 class="text-muted mb-1">Kelas</h6>
                        <h6 class="font-weight-bold text-grey-800 m-0"><?=$data['siswa']['nama_kelas']?> (<?=$data['siswa']['kompetensi_keahlian']?>)</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card-body py-3">
                    <form action="<?=BASE_URL?>/petugas-pembayaran/store" method="post" id="adminBayarSppForm">
                        <input type="hidden" name="nominal" value="<?=$data['siswa']['nominal']?>">
                        <input type="hidden" name="id_spp" value="<?=$data['siswa']['id_spp']?>">
                        <input type="hidden" name="id_siswa" value="<?=$data['siswa']['id_siswa']?>">

                        <?php foreach($data['bulan'] as $key => $bulan): ?>
                            <h6 class="text-grey-800 font-weight-bold">Semester <?=++$key?></h6>

                            <hr>

                            <div class="row">
                                <?php foreach($bulan as $bln): ?>
                                        <div class="col-sm-12 col-md-6 col-xl-4 mb-3 spp-card">
                                            <input type="hidden" name="bulan[<?=$bln?>]" value="false" data-bulan="<?=$bln?>" id="inputBulan">

                                            <?php if(in_array($bln, $data['bulan_terbayar'])): ?>
                                                <card class="card p-3 bg-success text-white">
                                                    <h6 class="text-uppercase"><?=$bln?></h6>
                                                    <h4 class="text-grey-800 font-weight-bold">Rp <?=$data['siswa']['nominal']?></h4>
                                                </card>

                                            <?php else: ?>
                                                <button type="button" class="card p-3 btn-block">
                                                    <h6 class="text-uppercase"><?=$bln?></h6>
                                                    <h4 class="text-grey-800 font-weight-bold">Rp <?=$data['siswa']['nominal']?></h4>
                                                </button>

                                            <?php endif ?>
                                        </div>
                                <?php endforeach ?>
                            </div>
                        <?php endforeach ?>
                </div>
            </div>
            <button type="button" class="btn btn-success btn-block" id="adminBayarSppBtn" data-toggle="modal" data-target="#adminBayarSppModal">Bayar</button>
            </form>
        </div>
    </div>
</div>

    <!-- Admin Total Harga SPP Modal-->
    <div class="modal fade" id="adminBayarSppModal" tabindex="-1" role="dialog" aria-labelledby="adminBayarSppModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body m-0 py-3">
                    <div class="col">
                        <p class="m-0">Total Harga</p>
                        <h4 class="font-weight-bold" id="adminBayarSppModalTotalHarga">Rp 0</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-block">Bayar</button>
                    <button class="btn btn-outline-secondary btn-block" type="button" data-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>