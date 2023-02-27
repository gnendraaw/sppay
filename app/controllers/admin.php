<?php

class Admin extends Controller {
    public function index()
    {
        Middleware::onlyAdmin();
        $siswa = $this->model('siswa_model')->getAllSiswa();
        $petugas = $this->model('petugas_model')->getAllPetugas();

        $data = [
            'title' => 'Dashboard',
            'heading' => 'dashboard',
            'options' => 'dashboard',
            'siswa' => $siswa,
            'petugas' => $petugas,
        ];

        $this->view('templates/header', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footer');
    }
}