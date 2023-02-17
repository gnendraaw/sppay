<div class="container-fluid">
    <div class="card shadow border-0 mb-4">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary m-0">Tambah Data Siswa</h6>
        </div>
        <div class="card-body py-3">
            <form action="<?=BASE_URL?>/admin-siswa/store" method="post">
            <div class="form-row">
                <div class="col-md-5">
                </div>

                <div class="col-md-7">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="adminNisnInput">NISN</label>
                            <input type="text" class="form-control" name="nisn" id="adminNisnInput" required maxlength="10">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="adminNisInput">NIS</label>
                            <input type="text" class="form-control" name="nis" id="adminNisInput" required maxlength="5">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="adminNamaInput">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama" id="adminNamaInput" required maxlength="50">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="adminTelpInput">Telp</label>
                            <input type="text" class="form-control" name="telp" id="adminTelpInput" required maxlength="13">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="adminAlamatInput">Alamat</label>
                        <textarea name="alamat" id="adminAlamatInput" class="form-control" cols="30" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="adminPasswordInput">Password</label>
                        <input type="text" name="password" id="adminPasswordInput" class="form-control" value="Siswa123">
                        <small class="form-text text-danger">Password ini merupakan nilai bawaan dari sistem. Pastikan siswa mengganti password setelah akun berhasil dibuat, ya!</small>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="adminKelasInput">Kelas</label>
                            <select name="kelas" id="adminKelasInput" class="form-control" required>
                                <?php foreach($data['kelas'] as $kelas): ?>
                                    <option value="<?=$kelas['id_kelas']?>"><?=$kelas['nama_kelas']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="adminSppInput">SPP</label>
                            <select name="spp" id="adminSppInput" class="form-control" required>
                                <?php foreach($data['spp'] as $spp): ?>
                                    <option value="<?=$spp['id_spp']?>"><?=$spp['tahun']?> (Rp<?=$spp['nominal']?>)</option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>