<?php

class Admin_pembayaran extends Controller {
    public function index()
    {
        $siswa = $this->model('siswa_model')->getSiswaById('4');
        $pembayaran = $this->model('pembayaran_model')->getPembayaranBySiswaId($siswa['id_siswa']);
        $bulan = [
            'juli', 'agustus', 'september', 'oktober', 'november', 'desember', 'januari', 'februari', 'maret', 'april', 'mei', 'juni',
        ];
        $bulan_terbayar = [];
        foreach($pembayaran as $p) {
            array_push($bulan_terbayar, $p['bulan_bayar']);
        }

        $data = [
            'title' => 'Transaksi',
            'heading' => 'transaksi',
            'options' => 'pembayaran spp',
            'siswa' => $siswa,
            'bulan' => $bulan,
            'bulan_terbayar' => $bulan_terbayar,
        ];

        $this->view('templates/header', $data);
        $this->view('admin/pembayaran/index', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        foreach($_POST['bulan'] as $key => $val)
        {
            if ($val == 'true')
            {
                $data = [
                    'id_spp' => $_POST['id_spp'],
                    'id_siswa' => $_POST['id_siswa'],
                    'id_petugas' => $_SESSION['user']['id_user'],
                    'tgl' => date('Y-m-d'),
                    'bulan' => $key,
                    'tahun' => date('Y'),
                    'jumlah' => $_POST['nominal'],
                ];

                if ($this->model('pembayaran_model')->addPembayaran($data) > 0)
                {
                    Flasher::setFlash('Data pembayaran berhasil ditambahkan!', 'success');
                }
                else
                {
                    Flasher::setFlash('Gagal menyimpan data pembayaran!', 'danger');
                    Direct::directTo('/admin-pembayaran');
                }
            }
        }

        Direct::directTo('/admin-pembayaran');
    }
}