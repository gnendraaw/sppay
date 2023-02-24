<div class="container-fluid">
    <div class="card shadow border-0 mb-4">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary m-0">Detail Petugas</h6>
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
                            <input type="text" class="form-control" name="username" id="adminUsernamePetugasInput" required maxlength="32" value="<?=$data['petugas']['username']?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="adminNamaPetugasInput">Nama Petugas</label>
                            <input type="text" class="form-control" name="nama" id="adminNamaPetugasInput" required maxlength="32" value="<?=$data['petugas']['nama_petugas']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="adminLevelInput">Level</label>
                        <select name="level" id="adminLevelInput" class="form-control">
                            <option value="<?=$data['petugas']['id_level']?>" selected><?=$data['petugas']['keterangan']?></option>
                            <?php foreach($data['level'] as $level): ?>
                                <option value="<?=$level['id_level']?>"><?=$level['keterangan']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="adminPasswordInput">Password</label>
                        <input type="text" name="password" id="adminPasswordInput" class="form-control" value="Petugas123">
                        <small class="form-text text-danger">Password ini merupakan nilai bawaan dari sistem. Pastikan petugas mengganti password setelah akun berhasil dibuat, ya!</small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>