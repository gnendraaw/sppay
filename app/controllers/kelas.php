<?php

class Kelas extends Controller {
    public function index()
    {
        $kelas = $this->model('kelas_model')->getAllKelas();

        $data = [
            'title' => 'Manajemen Kelas',
            'heading' => 'manajemen kelas',
            'options' => 'daftar kelas',
            'kelas' => $kelas,
        ];

        $this->view('templates/header', $data);
        $this->view('admin/kelas/index', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        $data = [
            'nama' => $_POST['nama'],
            'komp' => $_POST['komp'],
        ];

        if ($this->model('kelas_model')->addKelas($data))
        {
            Flasher::setFlash('Data kelas berhasil ditambahkan!', 'success');
            Direct::directTo('/kelas');
        }
        Flasher::setFlash('Gagal menambahkan data kelas!', 'danger');
        Direct::directTo('/kelas');
    }
}