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

        $siswa = $this->model('siswa_model')->getSiswaByUsernameAndPassword($data);
        $petugas = $this->model('petugas_model')->getPetugasByUsernameAndPassword($data);

        // when no data found on siswa and petugas table, direct user back to login page
        if (!$siswa && !$petugas)
        {
            Flasher::setFlash('username atau password salah!', 'danger');

            Direct::directTo('/login');
        }
        if ($siswa)
        {
            $_SESSION['user'] = [
                'id_user' => $siswa['id_siswa'],
                'username' => $siswa['nis'],
                'nama' => $siswa['nama_siswa'],
                'level' => 3,
            ];

            Direct::directTo();
        }
        if ($petugas)
        {
            $_SESSION['user'] = [
                'id_user' => $petugas['id_petugas'],
                'username' => $petugas['username'],
                'nama' => $petugas['nama_petugas'],
                'level' => $petugas['id_level'],
            ];

            Middleware::directTo(1, '/admin');
            Middleware::directTo(2, '/petugas');
        }
    }
}