<div class="container-fluid">
    <?php Flasher::flash() ?>

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header bg-primary">
                    <h6 class="m-0 text-white text-uppercase font-weight-bold">
                        PROFIILE SISWA
                    </h6>
                </div>
                <div class="card-body py-3">
                    <div class="d-flex justify-content-center">
                        <img src="<?=BASE_URL?>/img/undraw_profile_1.svg" class="col-8 mb-3">
                    </div>

                    <div class="col mb-2">
                        <p class="m-0 text-primary font-weight-bold">
                            Nama Siswa
                        </p>
                        <p class="m-0 text-gray-800"><?=$data['siswa']['nama_siswa']?></p>
                    </div>
                    <div class="col mb-2">
                        <p class="m-0 text-primary font-weight-bold">
                            NIS
                        </p>
                        <p class="m-0 text-gray-800"><?=$data['siswa']['nis']?></p>
                    </div>
                    <div class="col mb-2">
                        <p class="m-0 text-primary font-weight-bold">
                            NISN
                        </p>
                        <p class="m-0 text-gray-800"><?=$data['siswa']['nisn']?></p>
                    </div>
                    <div class="col mb-2">
                        <p class="m-0 text-primary font-weight-bold">
                            Kelas
                        </p>
                        <p class="m-0 text-gray-800"><?=$data['siswa']['nama_kelas']?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 text-primary text-uppercase font-weight-bold">
                        Pembayaran
                    </h6>
                </div>
                <div class="card-body py-3">
                    <form action="<?=BASE_URL?>/admin-transaksi/store" method="post" id="adminTransaksiForm">
                    <input type="hidden" name="id_spp" value="<?=$data['siswa']['id_spp']?>">
                    <input type="hidden" name="id_siswa" value="<?=$data['siswa']['id_siswa']?>">
                    <input type="hidden" name="nominal" value="<?=$data['siswa']['nominal']?>">
                    <?php foreach($data['bulan'] as $key => $bulan): ?>
                        <h6 class="m-0 text-gray-800 text-uppercase font-weight-bold">Semester <?=++$key?></h6>
                        <hr>
                        <div class="row">
                            <?php foreach($bulan as $key => $value): ?>
                                <div class="col-sm-12 col-md-6 col-xl-4 mb-4">
                                <input type="hidden" name="bulan[<?=$value?>]" value="0">
                                    <?php if(in_array($value, $data['bulanTerbayar'])): ?>
                                        <div class="card bg-success text-white">
                                            <div class="card-body py-3">
                                                <small class="text-uppercase"><?=$value?></small>
                                                <h4 class="text-white font-weight-bold">Rp <?=$data['siswa']['nominal']?></h4>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="card transaksi-card-btn" type="button">
                                            <div class="card-body py-3">
                                                <small class="text-uppercase"><?=$value?></small>
                                                <h4 class="font-weight-bold">Rp <?=$data['siswa']['nominal']?></h4>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                    <?php endforeach ?>
                </form>

                    <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#adminTransaksiModal" id="adminTransaksiBayarBtn">Bayar</button>
                </div>
            </div>
        </div>
    </div>
</div>