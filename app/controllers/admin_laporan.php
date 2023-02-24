<?php

class Admin_laporan extends Controller {
    public function index()
    {
        Middleware::onlyAdmin();

        $bulan = [
            'juli', 'agustus', 'september', 'oktober', 'november', 'desember', 'januari', 'februari', 'maret', 'april', 'mei', 'juni',
        ];
        $siswa = $this->model('siswa_model')->getAllSiswa();
        $pembayaran = [];
        foreach($siswa as $s)
        {
            $pembayaran[$s['id_siswa']] = [];
            $x = $this->model('pembayaran_model')->getPembayaranBySiswaId($s['id_siswa']);
            foreach($x as $i) {
                array_push($pembayaran[$s['id_siswa']], $i['bulan_bayar']);
            }
        }

        $data = [
            'title' => 'Laporan Pembayaran',
            'heading' => 'transaksi',
            'options' => 'laporan pembayaran',
            'bulan' => $bulan,
            'siswa' => $siswa,
            'pembayaran' => $pembayaran,
        ];

        $this->view('templates/header', $data);
        $this->view('admin/laporan/index', $data);
        $this->view('templates/footer');
    }

    public function cetak()
    {
        Middleware::onlyAdmin();

        $bulan = [
            'juli', 'agustus', 'september', 'oktober', 'november', 'desember', 'januari', 'februari', 'maret', 'april', 'mei', 'juni',
        ];
        $siswa = $this->model('siswa_model')->getAllSiswa();
        $pembayaran = [];
        foreach($siswa as $s)
        {
            $pembayaran[$s['id_siswa']] = [];
            $x = $this->model('pembayaran_model')->getPembayaranBySiswaId($s['id_siswa']);
            foreach($x as $i) {
                array_push($pembayaran[$s['id_siswa']], $i['bulan_bayar']);
            }
        }

        $data = [
            'title' => 'Laporan Pembayaran',
            'heading' => 'transaksi',
            'options' => 'laporan pembayaran',
            'bulan' => $bulan,
            'siswa' => $siswa,
            'pembayaran' => $pembayaran,
        ];

        $this->view('admin/laporan/cetak', $data);
    }
}