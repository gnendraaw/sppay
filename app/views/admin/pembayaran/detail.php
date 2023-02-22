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
                    <form action="<?=BASE_URL?>/admin-pembayaran/store" method="post">
                    <div class="row">
                        <?php foreach($data['bulan'] as $bulan): ?>
                            <input type="hidden" name="nominal" value="<?=$data['siswa']['nominal']?>">
                            <input type="hidden" name="id_spp" value="<?=$data['siswa']['id_spp']?>">
                            <input type="hidden" name="id_siswa" value="<?=$data['siswa']['id_siswa']?>">

                            <div class="col-sm-12 col-md-6 col-xl-4 mb-3 spp-card">
                                <input type="hidden" name="bulan[<?=$bulan?>]" value="false" data-bulan="<?=$bulan?>">

                                <?php if(in_array($bulan, $data['bulan_terbayar'])): ?>
                                    <card class="card p-3 bg-success text-white">
                                        <h6 class="text-uppercase"><?=$bulan?></h6>
                                        <h4 class="text-grey-800 font-weight-bold">Rp <?=$data['siswa']['nominal']?></h4>
                                    </card>

                                <?php else: ?>
                                    <button type="button" class="card p-3 btn-block">
                                        <h6 class="text-uppercase"><?=$bulan?></h6>
                                        <h4 class="text-grey-800 font-weight-bold">Rp <?=$data['siswa']['nominal']?></h4>
                                    </button>

                                <?php endif ?>

                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-block">Bayar</button>
            </form>
        </div>
    </div>
</div>