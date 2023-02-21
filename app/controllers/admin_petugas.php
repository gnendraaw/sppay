<?php

class Admin_petugas extends Controller {
    public function index()
    {
        $petugas = $this->model('petugas_model')->getAllPetugas();

        $data = [
            'title' => 'Manajemen Petugas',
            'heading' => 'manajemen petugas',
            'options' => 'daftar petugas',
            'petugas' => $petugas,
        ];

        $this->view('templates/header', $data);
        $this->view('admin/petugas/index', $data);
        $this->view('templates/footer');
    }
}