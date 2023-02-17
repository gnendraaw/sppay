<?php

class Admin_siswa extends Controller {
    public function index()
    {
        $siswa = $this->model('siswa_model')->getAllSiswa();

        $data = [
            'title' => 'Manajemen Siswa',
            'heading' => 'manajemen siswa',
            'options' => 'daftar siswa',
            'siswa' => $siswa,
        ];

        $this->view('templates/header', $data);
        $this->view('admin/siswa/index', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $kelas = $this->model('kelas_model')->getAllKelas();
        $spp = $this->model('spp_model')->getAllSpp();

        $data = [
            'title' => 'Manajemen Siswa',
            'heading' => 'manajemen siswa',
            'options' => 'daftar siswa',
            'kelas' => $kelas,
            'spp' => $spp,
        ];

        $this->view('templates/header', $data);
        $this->view('admin/siswa/create', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        $data = [
            'nisn' => $_POST['nisn'],
            'nis' => $_POST['nis'],
            'nama' => $_POST['nama'],
            'password' => md5($_POST['password']),
            'telp' => $_POST['telp'],
            'alamat' => $_POST['alamat'],
            'id_kelas' => $_POST['kelas'],
            'id_spp' => $_POST['spp'],
        ];

        if ($this->model('siswa_model')->addSiswa($data) > 0)
        {
            Flasher::setFlash('Data siswa berhasil ditambahkan!', 'success');
            Direct::directTo('/admin-siswa');
        }
        Flasher::setFlash('Gagal menambahkan data siswa', 'danger');
        Direct::directTo('/admin-siswa');
    }
}