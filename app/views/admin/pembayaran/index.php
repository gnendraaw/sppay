<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-body py-3">
            <form action="<?=BASE_URL?>/admin-pembayaran/store" method="post">
            <div class="form-row">
                <div class="form-group col-lg-10 m-0">
                    <input type="text" name="query" id="adminQueryInput" placeholder="cari siswa dengan NIS di sini . . ." class="form-control" required>
                </div>
                <div class="form-group col-lg-2 m-0">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-4">
            <div class="card  mb-4">
                <div class="card-body py-3">
                    <div class="col-sm-8">
                        <img class="rounded-circle" src="img/undraw_profile_1.svg"                        alt="...">
                    </div>
                    <div class="col mb-3">
                        <h6 class="text-muted mb-1">NISN</h6>
                        <h6 class="font-weight-bold text-grey-800 m-0">1241241414</h6>
                    </div>
                    <div class="col mb-3">
                        <h6 class="text-muted mb-1">NIS</h6>
                        <h6 class="font-weight-bold text-grey-800 m-0">11211</h6>
                    </div>
                    <div class="col mb-3">
                        <h6 class="text-muted mb-1">Nama Lengkap</h6>
                        <h6 class="font-weight-bold text-grey-800 m-0">Nama Lengkap Siswa</h6>
                    </div>
                    <div class="col mb-3">
                        <h6 class="text-muted mb-1">Kelas</h6>
                        <h6 class="font-weight-bold text-grey-800 m-0">XII RPL 2</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card-body py-3">
                    <div class="row">
                        <?php for($i = 0; $i < 12; $i++): ?>
                        <div class="col-sm-12 col-md-6 col-xl-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    Januari
                                    <h4 class="text-grey-800 font-weight-bold">Rp 200.000</h4>
                                </div>
                            </div>
                        </div>
                        <?php endfor ?>
                    </div>
                </div>
            </div>
            <button class="btn btn-success btn-block">Bayar</button>
        </div>
    </div>
</div>