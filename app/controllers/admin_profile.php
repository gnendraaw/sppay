<?php

class Admin_profile extends Controller {
    public function index()
    {
        $petugas = $this->model('petugas_model')->getPetugasByPenggunaId($_SESSION['user']['id_user']);
        $level = $this->model('level_model')->getAllLevel();
        $data = [
            'title' => 'Profile',
            'heading' => 'profile',
            'options' => 'profile',
            'petugas' => $petugas,
            'level' => $level,
        ];

        $this->view('templates/header', $data);
        $this->view('admin/profile/index', $data);
        $this->view('templates/footer');
    }

    public function reset()
    {
        $data = [
            'id_pengguna' => $_POST['id_pengguna'],
            'oldPassword' => $_POST['oldPassword'],
            'newPassword' => $_POST['newPassword'],
            'cNewPassword' => $_POST['cNewPassword'],
        ];

        // validate empty data
        foreach($data as $d) {
            if (empty($d)) {
                Flasher::setFlash('Data tidak boleh kosong!', 'danger');
                Direct::directTo('/admin-profile');
            }
        }

        // when password and confirm password not match, direct user back to profile page
        if ($data['newPassword'] != $data['cNewPassword']) {
            Flasher::setFlash('Password baru tidak sesuai!', 'danger');
            Direct::directTo('/admin-profile');
        }

        // encrypt password
        $data['oldPassword'] = md5($data['oldPassword']);
        $data['newPassword'] = md5($data['newPassword']);

        $verified = $this->model('pengguna_model')->checkIfPasswordMatch($data);
        if (!$verified) {
            Flasher::setFlash('Kata sandi salah!', 'danger');
            Direct::directTo('/admin-profile');
        }

        if (!$this->model('pengguna_model')->updatePenggunaPassword($data)) {
            Flasher::setFlash('Gagal merubah data password!', 'danger');
            Direct::directTo('/admin-profile');
        }

        Flasher::setFlash('Data password sukses dirubah!', 'success');
        Direct::directTo('/admin-profile');
    }
}