<?php

class Admin_pembayaran extends Controller {
    public function index()
    {
        $siswa = null;
        if (isset($_POST['query']))
        {
            $siswa = $this->model('siswa_model')->getSiswaByNIS($_POST['query']);
        }

        $data = [
            'title' => 'Transaksi',
            'heading' => 'transaksi',
            'options' => 'pembayaran spp',
            'siswa' => $siswa,
        ];

        $this->view('templates/header', $data);
        $this->view('admin/pembayaran/index', $data);
        $this->view('templates/footer');
    }
}