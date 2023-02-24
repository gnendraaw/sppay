<?php

class Admin_siswa extends Controller {
    public function index()
    {
        Middleware::onlyAdmin();

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
        Middleware::onlyAdmin();

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

    public function detail($id)
    {
        Middleware::onlyAdmin();

        $siswa = $this->model('siswa_model')->getSiswaById($id);

        $data = [
            'title' => 'Manajemen Siswa',
            'heading' => 'manajemen siswa',
            'options' => 'daftar siswa',
            'siswa' => $siswa,
        ];

        $this->view('templates/header', $data);
        $this->view('admin/siswa/detail', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        Middleware::onlyAdmin();

        $pengguna = $this->model('pengguna_model')->getLatestIdPengguna();

        $data = [
            'nisn' => $_POST['nisn'],
            'nis' => $_POST['nis'],
            'nama' => $_POST['nama'],
            'username' => $_POST['nis'],
            'password' => md5($_POST['password']),
            'telp' => $_POST['telp'],
            'alamat' => $_POST['alamat'],
            'id_kelas' => $_POST['kelas'],
            'id_spp' => $_POST['spp'],
            'id_level' => 3,
            'id_pengguna' => ++$pengguna['id_pengguna'],
        ];

        if (!$this->model('pengguna_model')->addPengguna($data))
        {
            Flasher::setFlash('Gagal menambahkan data pengguna', 'danger');
            Direct::directTo('/admin-siswa');
        }
        if (!$this->model('siswa_model')->addSiswa($data))
        {
            Flasher::setFlash('Gagal menambahkan data siswa', 'danger');
            Direct::directTo('/admin-siswa');
        }
        Flasher::setFlash('Data siswa berhasil ditambahkan', 'success');
        Direct::directTo('/admin-siswa');
    }

    public function update()
    {
        Middleware::onlyAdmin();

        $data = [
            'id' => $_POST['id'],
            'nisn' => $_POST['nisn'],
            'nis' => $_POST['nis'],
            'nama' => $_POST['nama'],
            'telp' => $_POST['telp'],
            'alamat' => $_POST['alamat'],
            'id_kelas' => $_POST['kelas'],
            'id_spp' => $_POST['spp'],
        ];

        if ($this->model('siswa_model')->updateSiswaById($data) > 0)
        {
            Flasher::setFlash('Data siswa berhasil dirubah!', 'success');
            Direct::directTo('/admin-siswa');
        }
        Flasher::setFlash('Gagal merubah data siswa!', 'danger');
        Direct::directTo('/admin-siswa');
    }

    public function delete()
    {
        Middleware::onlyAdmin();

        if ($this->model('siswa_model')->deleteSiswa($_POST['id']) > 0)
        {
            Flasher::setFlash('Data siswa berhasil dihapus!', 'success');
            Direct::directTo('/admin-siswa');
            exit;
        }
        Flasher::setFlash('Gagal menghapus data siswa!', 'dangesuccessr');
        Direct::directTo('/admin-siswa');
        exit;
    }
}