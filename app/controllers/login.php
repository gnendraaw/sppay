<?php

class Login extends Controller {
    public function index()
    {
        $this->view('templates/auth/header');
        $this->view('login/index');
        $this->view('templates/auth/footer');
    }

    public function sign()
    {
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

            header('location: ' . BASE_URL . '/login');
            exit;
        }
        if ($siswa)
        {
            $_SESSION['user'] = [
                'id_user' => $siswa['id_siswa'],
                'username' => $siswa['nis'],
                'nama' => $siswa['nama_siswa'],
                'level' => 3,
            ];

            header('location: ' . BASE_URL);
            exit;
        }
        if ($petugas)
        {
            $_SESSION['user'] = [
                'id_user' => $petugas['id_petugas'],
                'username' => $petugas['username'],
                'nama' => $petugas['nama_petugas'],
                'level' => $petugas['id_level'],
            ];

            header('location: ' . BASE_URL);
            exit;
        }
    }
}