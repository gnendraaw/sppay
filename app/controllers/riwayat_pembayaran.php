<?php

class Riwayat_pembayaran extends Controller {
    public function index()
    {
        $siswa = $this->model('siswa_model')->getSiswaByPenggunaId($_SESSION['user']['id_user']);
        $pembayaran = $this->model('pembayaran_model')->getPembayaranBySiswaId($siswa['id_siswa']);

        $data = [
            'title' => 'Riwayat Pembayaran',
            'heading' => 'transaksi',
            'options' => 'riwayat pembayaran',
            'pembayaran' => $pembayaran,
        ];

        $this->view('templates/header', $data);
        $this->view('riwayat_pembayaran/index', $data);
        $this->view('templates/footer');
    }
}