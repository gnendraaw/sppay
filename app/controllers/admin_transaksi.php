<?php

class Admin_transaksi extends Controller {
    public function index()
    {
        $siswa = $this->model('siswa_model')->getAllSiswa();
        $data = [
            'title' => 'Transaksi',
            'heading' => 'manajemen petugas',
            'options' => 'transaksi spp',
            'siswa' => $siswa,
        ];

        $this->view('templates/header', $data);
        $this->view('admin/transaksi/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $bulan = [
            [
                'juli', 'agustus', 'september', 'oktober', 'november', 'desember',
            ],
            [
                'januari', 'februari', 'maret', 'april', 'mei', 'juni',
            ]
        ];

        $pembayaran = $this->model('pembayaran_model')->getBulanBayarBySiswaId($id);
        $bulanTerbayar = [];
        foreach($pembayaran as $key => $value) {
            array_push($bulanTerbayar, $value['bulan_bayar']);
        }

        $siswa = $this->model('siswa_model')->getSiswaById($id);

        $data = [
            'title' => 'Transaksi',
            'heading' => 'manajemen petugas',
            'options' => 'transaksi spp',
            'bulanTerbayar' => $bulanTerbayar,
            'bulan' => $bulan,
            'siswa' => $siswa,
        ];

        $this->view('templates/header', $data);
        $this->view('admin/transaksi/detail', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        $petugas = $this->model('petugas_model')->getPetugasIdByPenggunaId($_SESSION['user']['id_user']);
        foreach($_POST['bulan'] as $key => $value)
        {
            if ($value == '1')
            {
                $data = [
                    'id_spp' => $_POST['id_spp'],
                    'id_siswa' => $_POST['id_siswa'],
                    'id_petugas' => $petugas['id_petugas'],
                    'tgl' => date('Y-m-d'),
                    'bulan' => $key,
                    'tahun' => date('Y'),
                    'jumlah' => $_POST['nominal'],
                ];

                if ($this->model('pembayaran_model')->addPembayaran($data) === false)
                {
                    Flasher::setFlash('Gagal menyimpan data pembayaran!', 'danger');
                    Direct::directTo('/admin-transaksi/detail/' . $data['id_siswa']);
                }
            }
        }
        Flasher::setFlash('Data pembayaran berhasil disimpan', 'success');
        Direct::directTo('/admin-transaksi/detail/' . $data['id_siswa']);
    }
}