<?php

class Admin_petugas extends Controller {
    public function index()
    {
        Middleware::onlyAdmin();

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
        Middleware::onlyAdmin();

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
        Middleware::onlyAdmin();

        $pengguna = $this->model('pengguna_model')->getLatestIdPengguna();

        $data = [
            'username' => $_POST['username'],
            'nama' => $_POST['nama'],
            'id_level' => $_POST['level'],
            'password' => md5($_POST['password']),
            'id_pengguna' => ++$pengguna['id_pengguna'],
        ];

        if (!$this->model('pengguna_model')->addPengguna($data) > 0)
        {
            Flasher::setFlash('Gagal menambahkan data pengguna', 'danger');
            Direct::directTo('/admin-petugas');
        }
        if (!$this->model('petugas_model')->addPetugas($data) > 0)
        {
            Flasher::setFlash('Gagal menambahkan data petugas', 'danger');
            Direct::directTo('/admin-petugas');
        }
        Flasher::setFlash('Data petugas berhasil ditambahkan!', 'success');
        Direct::directTo('/admin-petugas');
    }

    public function detail($id)
    {
        Middleware::onlyAdmin();

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
        Middleware::onlyAdmin();

        $data = [
            'username' => $_POST['username'],
            'nama' => $_POST['nama'],
            'password' => md5($_POST['password']),
            'id_petugas' => $_POST['id'],
            'id_level' => $_POST['level'],
            'id_pengguna' => $_POST['id_pengguna'],
        ];

        if (!$this->model('pengguna_model')->updatePengguna($data) > 0)
        {
            Flasher::setFlash('Gagal merubah data pengguna', 'danger');
            exit;
        }
        if (!$this->model('petugas_model')->updatePetugas($data) > 0)
        {
            Flasher::setFlash('Gagal merubah data petugas', 'danger');
            Direct::directTo('/admin-petugas');
        }
        Flasher::setFlash('Data petugas berhasil dirubah!', 'success');
        Direct::directTo('/admin-petugas');
    }

    public function delete()
    {
        Middleware::onlyAdmin();

        if ($this->model('pengguna_model')->deletePengguna($_POST['id']) > 0)
        {
            Flasher::setFlash('Data petugas berhasil dihapus!', 'success');
            Direct::directTo('/admin-petugas');
        }
        Flasher::setFlash('Gagal menghapus data petugas', 'danger');
        Direct::directTo('/admin-petugas');
    }
}