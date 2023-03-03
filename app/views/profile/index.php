<div class="container-fluid">
    <?php Flasher::flash() ?>

    <div class="card shadow border-0 mb-4">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary m-0">Profile</h6>
        </div>
        <div class="card-body py-3">
            <form action="<?=BASE_URL?>/profile/update" method="post">
            <div class="form-row">
                <div class="col-md-5 d-flex justify-content-center align-items-center">
                    <div class="col-8">
                        <img class="img-profile rounded-circle"
                            src="<?=BASE_URL?>/img/undraw_profile.svg">
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form-row">
                        <input type="hidden" name="id_pengguna" value="<?=$data['siswa']['id_pengguna']?>">
                        <div class="form-group col-md-6">
                            <input type="hidden" name="id" value="<?=$data['siswa']['id_siswa']?>">
                            <label for="adminNisInput">NIS</label>
                            <input type="text" class="form-control" name="nis" id="adminNisInput" required maxlength="5" value="<?=$data['siswa']['nis']?>" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="adminNisnInput">NISN</label>
                            <input type="text" class="form-control" name="nisn" id="adminNisnInput" value="<?=$data['siswa']['nisn']?>" required maxlength="15" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="adminNamaPetugasInput">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama" id="adminNamaPetugasInput" required maxlength="32" value="<?=$data['siswa']['nama_siswa']?>" disabled>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="adminKelasInput">Kelas</label>
                            <input type="text" name="kelas" id="adminKelasInput" class="form-control" required maxlength="32" value="<?=$data['siswa']['nama_kelas']?>" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="adminKompInput">Kompetensi Keahlian</label>
                            <input type="text" name="kelas" id="adminKompInput" class="form-control" required maxlength="32" value="<?=$data['siswa']['kompetensi_keahlian']?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="adminTelpInput">Telp</label>
                        <input type="text" class="form-control" name="nama" id="adminTelpInput" required maxlength="32" value="<?=$data['siswa']['no_telp']?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="adminAlamatInput">Alamat</label>
                        <textarea name="alamat" id="adminAlamatInput" cols="30" rows="5" class="form-control" disabled><?=$data['siswa']['alamat']?></textarea>
                    </div>
                    </form>

                    <hr>

                    <h6 class="text-warning font-weight-bold">Reset Password</h6>
                    <form action="<?=BASE_URL?>/profile/reset" method="post" id="adminResetPasswordForm">
                    <input type="hidden" name="id_pengguna" value="<?=$data['siswa']['id_pengguna']?>">
                        <div class="form-group">
                            <label for="adminOldPasswordInput">Password Lama</label>
                            <input type="password" name="oldPassword" id="adminOldPasswordInput" class="form-control" required maxlength="32">
                        </div>
                        <div class="form-group">
                            <label for="adminNewPasswordInput">Password Baru</label>
                            <input type="password" name="newPassword" id="adminNewPasswordInput" class="form-control" required maxlength="32">
                        </div>
                        <div class="form-group">
                            <label for="adminConfirmPasswordInput">Konfirmasi Password</label>
                            <input type="password" name="cNewPassword" id="adminConfirmPasswordInput" class="form-control" required maxlength="32">
                        </div>
                        <button type="button" class="btn btn-block btn-warning" data-toggle="modal" data-target="#adminResetPasswordModal">Reset Password</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

    <!-- Admin Reset Password Modal -->
    <div class="modal fade" id="adminResetPasswordModal" tabindex="-1" aria-labelledby="adminResetPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="adminResetPasswordModalLabel">Yakin untuk reset password?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Aksi anda tak akan dapat dikembalikan!
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-warning">Reset</button>
        </div>
        </div>
    </div>
    </div>