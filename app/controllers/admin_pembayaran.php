<?php

class Admin_pembayaran extends Controller {
    public function index()
    {
        $data = [
            'title' => 'Transaksi',
            'heading' => 'transaksi',
            'options' => 'pembayaran spp',
        ];

        $this->view('templates/header', $data);
        $this->view('admin/pembayaran/index');
        $this->view('templates/footer');
    }
}