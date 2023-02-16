<?php

class SPP extends Controller {
    public function index()
    {
        $spp = $this->model('spp_model')->getAllSpp();

        $data = [
            'title' => 'SPP',
            'spp' => $spp,
            'heading' => 'manajemen spp',
            'options' => 'daftar spp',
        ];

        $this->view('templates/header', $data);
        $this->view('admin/spp/index', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        $data = [
            'tahun' => $_POST['tahun'],
            'nominal' => $_POST['nominal'],
        ];

        if ($this->model('spp_model')->addSpp($data) > 0)
        {
            Flasher::setFlash('Data SPP berhasil ditambahkan!', 'success');
            Direct::directTo('/spp');
        }
        Flasher::setFlash('Gagal menambahkan data!', 'danger');
        Direct::directTo('/spp');
    }

    public function delete()
    {
        $data = [
            'id_spp' => $_POST['id'],
        ];

        if ($this->model('spp_model')->removeSpp($data) > 0)
        {
            Flasher::setFlash('Data SPP berhasil dihapus!', 'success');
            Direct::directTo('/spp');
        }
        Flasher::setFlash('Gagal menghapus data!', 'danger');
        Direct::directTo('/spp');
    }

    public function update()
    {
        $data = [
            'id' => $_POST['id'],
            'tahun' => $_POST['tahun'],
            'nominal' => $_POST['nominal'],
        ];

        if ($this->model('spp_model')->updateSppById($data) > 0)
        {
            Flasher::setFlash('Data SPP berhasil dirubah!', 'success');
            Direct::directTo('/spp');
        }
        Flasher::setFlash('Gagal merubah data SPP', 'danger');
        Direct::directTo('/spp');
    }

    public function getSppData()
    {
        echo json_encode($this->model('spp_model')->getSppById($_POST['id']));
    }
}