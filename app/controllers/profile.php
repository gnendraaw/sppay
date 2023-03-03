<?php

class Profile extends Controller {
    public function index()
    {
        Middleware::onlySiswa();

        $siswa = $this->model('siswa_model')->getSiswaByPenggunaId($_SESSION['user']['id_user']);
        $data = [
            'title' => 'Profile',
            'heading' => 'profile',
            'options' => 'profile',
            'siswa' => $siswa,
        ];

        $this->view('templates/header', $data);
        $this->view('profile/index', $data);
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
                Direct::directTo('/profile');
            }
        }

        // check if new password match
        if ($data['newPassword'] != $data['cNewPassword']) {
            Flasher::setFlash('Password tidak sesuai!', 'danger');
            Direct::directTo('/profile');
        }

        $data['oldPassword'] = md5($data['oldPassword']);
        $data['newPassword'] = md5($data['newPassword']);
        $data['cNewPassword'] = md5($data['cNewPassword']);

        // when old password not match with data, direct user back to profile page
        $verified = $this->model('pengguna_model')->checkIfPasswordMatch($data);
        if (!$verified) {
            Flasher::setFlash('Password salah!', 'danger');
            Direct::directTo('/profile');
        }

        if (!$this->model('pengguna_model')->updatePenggunaPassword($data))
        {
            Flasher::setFlash('Gagal merubah data password!', 'danger');
            Direct::directTo('/profile');
        }

        Flasher::setFlash('Data password sukses dirubah', 'success');
        Direct::directTo('/profile');
    }
}