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

        $user = $this->model('siswa_model')->getSiswaByUsernameAndPassword($data);

        if ($user)
        {
            $_SESSION['user'] = [
                'id_user' => $user['id_siswa'],
                'username' => $user['nis'],
                'nama' => $user['nama_siswa'],
            ];

            header('location: ' . BASE_URL);
            exit;
        }
        header('location: ' . BASE_URL . '/login');
        exit;
    }
}