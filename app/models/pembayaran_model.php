<?php

class Pembayaran_model {
    private $db;
    private $table = 'pembayaran';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPembayaranBySiswaId($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id_siswa=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->resultSet();
    }

    public function getBulanBayarBySiswaId($id)
    {
        $query = "SELECT bulan_bayar FROM {$this->table} WHERE id_siswa=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->resultSet();
    }

    public function addPembayaran($data)
    {
        $query = "INSERT INTO {$this->table} VALUES(NULL, :id_spp, :id_siswa, :id_petugas, :tgl, :bulan, :tahun, :jumlah)";
        $this->db->query($query);
        $this->db->bind('id_spp', $data['id_spp']);
        $this->db->bind('id_siswa', $data['id_siswa']);
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('tgl', date('Y-m-d'));
        $this->db->bind('bulan', $data['bulan']);
        $this->db->bind('tahun', $data['tahun']);
        $this->db->bind('jumlah', $data['jumlah']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}