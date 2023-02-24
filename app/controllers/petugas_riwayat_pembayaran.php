<?php

class Petugas_riwayat_pembayaran extends Controller {
    public function index()
    {
        Middleware::onlyPetugas();

        $pembayaran = $this->model('pembayaran_model')->getAllPembayaran('DESC');
        $data = [
            'title' => 'Riwayat Pembayaran',
            'heading' => 'transaksi',
            'options' => 'riwayat pembayaran',
            'pembayaran' => $pembayaran,
        ];

        $this->view('templates/header', $data);
        $this->view('petugas/riwayat_pembayaran/index', $data);
        $this->view('templates/footer');
    }
}