<?php

class SPP extends Controller {
    public function index()
    {
        $spp = $this->model('spp_model')->getAllSpp();

        $data = [
            'title' => 'SPP',
            'spp' => $spp,
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
}