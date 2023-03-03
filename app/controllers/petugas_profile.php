<?php

class Petugas_profile extends Controller {
    public function index()
    {
        Middleware::onlyPetugas();

        $petugas = $this->model('petugas_model')->getPetugasByPenggunaId($_SESSION['user']['id_user']);
        $data = [
            'title' => 'Profile',
            'heading' => 'profile',
            'options' => 'profile',
            'petugas' => $petugas,
        ];

        $this->view('templates/header', $data);
        $this->view('petugas/profile/index', $data);
        $this->view('templates/footer');
    }

    public function reset()
    {
        Middleware::onlyPetugas();

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
                Direct::directTo('/petugas-profile');
            }
        }

        // when password and confirm password not match, direct user back to profile page
        if ($data['newPassword'] != $data['cNewPassword']) {
            Flasher::setFlash('Password baru tidak sesuai!', 'danger');
            Direct::directTo('/petugas-profile');
        }

        // encrypt password
        $data['oldPassword'] = md5($data['oldPassword']);
        $data['newPassword'] = md5($data['newPassword']);

        $verified = $this->model('pengguna_model')->checkIfPasswordMatch($data);
        if (!$verified) {
            Flasher::setFlash('Kata sandi salah!', 'danger');
            Direct::directTo('/petugas-profile');
        }

        if (!$this->model('pengguna_model')->updatePenggunaPassword($data)) {
            Flasher::setFlash('Gagal merubah data password!', 'danger');
            Direct::directTo('/petugas-profile');
        }

        Flasher::setFlash('Data password sukses dirubah!', 'success');
        Direct::directTo('/petugas-profile');
    }
}