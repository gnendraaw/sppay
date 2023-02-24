<?php

class Admin_riwayat_pembayaran extends Controller {
    public function index()
    {
        Middleware::onlyAdmin();

        $pembayaran = $this->model('pembayaran_model')->getAllPembayaran('DESC');
        $data = [
            'title' => 'Riwayat Pembayaran',
            'heading' => 'transaksi',
            'options' => 'riwayat pembayaran',
            'pembayaran' => $pembayaran,
        ];

        $this->view('templates/header', $data);
        $this->view('admin/riwayat_pembayaran/index', $data);
        $this->view('templates/footer');
    }
}