<?php

class Login extends Controller {
    public function index()
    {
        Middleware::onlyNotLogedIn();

        $this->view('templates/auth/header');
        $this->view('login/index');
        $this->view('templates/auth/footer');
    }

    public function sign()
    {
        Middleware::onlyNotLogedIn();

        $data = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
        ];

        $pengguna = $this->model('pengguna_model')->getPenggunaByUsernameAndPassword($data);

        // when no data found, direct user back to login page
        if (!$pengguna)
        {
            Flasher::setFlash('username atau password salah!', 'danger');

            Direct::directTo('/login');
        }

        $_SESSION['user'] = [
            'id_user' => $pengguna['id_pengguna'],
            'username' => $pengguna['username'],
            'level' => $pengguna['keterangan'],
        ];
        Direct::directTo();
    }
}