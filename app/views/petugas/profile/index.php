<div class="container-fluid">
    <?php Flasher::flash() ?>

    <div class="card shadow border-0 mb-4">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary m-0">Profile</h6>
        </div>
        <div class="card-body py-3">
            <form action="<?=BASE_URL?>/admin-petugas/update" method="post">
            <div class="form-row">
                <div class="col-md-5 d-flex justify-content-center align-items-center">
                    <div class="col-8">
                        <img class="img-profile rounded-circle"
                            src="<?=BASE_URL?>/img/undraw_profile.svg">
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form-row">
                        <input type="hidden" name="id_pengguna" value="<?=$data['petugas']['id_pengguna']?>">
                        <div class="form-group col-md-6">
                            <input type="hidden" name="id" value="<?=$data['petugas']['id_petugas']?>">
                            <label for="adminUsernamePetugasInput">Username</label>
                            <input type="text" class="form-control" name="username" id="adminUsernamePetugasInput" required maxlength="32" value="<?=$data['petugas']['username']?>" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="adminNamaPetugasInput">Nama Petugas</label>
                            <input type="text" class="form-control" name="nama" id="adminNamaPetugasInput" required maxlength="32" value="<?=$data['petugas']['nama_petugas']?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="adminLevelInput">Level</label>
                        <select name="level" id="adminLevelInput" class="form-control" disabled>
                            <option value="<?=$data['petugas']['id_level']?>" selected><?=$data['petugas']['keterangan']?></option>
                        </select>
                    </div>
                    </form>

                    <hr>

                    <h6 class="text-warning font-weight-bold">Reset Password</h6>
                    <form action="<?=BASE_URL?>/petugas-profile/reset" method="post" id="adminResetPasswordForm">
                    <input type="hidden" name="id_pengguna" value="<?=$data['petugas']['id_pengguna']?>">
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