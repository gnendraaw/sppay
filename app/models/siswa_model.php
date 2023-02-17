<?php

class siswa_model {
    private $table = 'siswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSiswa()
    {
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);

        return $this->db->resultSet();
    }

    public function getSiswaByUsernameAndPassword($data)
    {
        $query = "SELECT * FROM {$this->table} WHERE nis=:nis AND password=:password";
        $this->db->query($query);
        $this->db->bind('nis', $data['username']);
        $this->db->bind('password', $data['password']);

        return $this->db->single();
    }  

    public function addSiswa($data)
    {
        $query = "INSERT INTO {$this->table} VALUES(NULL, :nisn, :nis, :nama, :password, :telp, :alamat, :id_kelas, :id_spp)";
        $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('telp', $data['telp']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('id_kelas', $data['id_kelas']);
        $this->db->bind('id_spp', $data['id_spp']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}