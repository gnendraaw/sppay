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

    public function create()
    {
        $level = $this->model('level_model')->getAllLevel();
        $data = [
            'title' => 'Manajemen Petugas',
            'heading' => 'manajemen petugas',
            'options' => 'daftar petugas',
            'level' => $level,
        ];

        $this->view('templates/header', $data);
        $this->view('admin/petugas/create', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        $data = [
            'username' => $_POST['username'],
            'nama' => $_POST['nama'],
            'level' => $_POST['level'],
            'password' => md5($_POST['password']),
        ];

        if ($this->model('petugas_model')->addPetugas($data) > 0)
        {
            Flasher::setFlash('Data petugas berhasil ditambahkan!', 'success');
            Direct::directTo('/admin-petugas');
        }
        Flasher::setFlash('Gagal menambahkan data petugas', 'danger');
        Direct::directTo('/admin-petugas');
    }

    public function detail($id)
    {
        $petugas = $this->model('petugas_model')->getPetugasById($id);
        $level = $this->model('level_model')->getAllLevel();
        $data = [
            'title' => 'Manajemen Petugas',
            'heading' => 'manajemen petugas',
            'options' => 'daftar petugas',
            'level' => $level,
            'petugas' => $petugas,
        ];

        $this->view('templates/header', $data);
        $this->view('admin/petugas/detail', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        $data = [
            'username' => $_POST['username'],
            'nama' => $_POST['nama'],
            'id_petugas' => $_POST['id'],
            'id_level' => $_POST['level'],
        ];

        if ($this->model('petugas_model')->updatePetugas($data) > 0)
        {
            Flasher::setFlash('Data petugas berhasil dirubah!', 'success');
            Direct::directTo('/admin-petugas');
        }
        Flasher::setFlash('Gagal merubah data petugas', 'danger');
        Direct::directTo('/admin-petugas');
    }

    public function delete()
    {
        if ($this->model('petugas_model')->deletePetugas($_POST['id']) > 0)
        {
            Flasher::setFlash('Data petugas berhasil dihapus!', 'success');
            Direct::directTo('/admin-petugas');
        }
        Flasher::setFlash('Gagal menghapus data petugas', 'danger');
        Direct::directTo('/admin-petugas');
    }
}