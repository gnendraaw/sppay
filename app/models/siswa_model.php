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
        $query = "SELECT s.*, k.*, sp.* FROM {$this->table} AS s LEFT JOIN kelas AS k ON s.id_kelas=k.id_kelas LEFT JOIN spp AS sp ON s.id_spp=sp.id_spp";
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
        $query = "CALL addSiswa(:nisn, :nis, :nama, :telp, :alamat, :id_kelas, :id_spp, :id_pengguna)";
        $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('telp', $data['telp']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('id_kelas', $data['id_kelas']);
        $this->db->bind('id_spp', $data['id_spp']);
        $this->db->bind('id_pengguna', $data['id_pengguna']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getSiswaById($id)
    {
        $query = "SELECT s.*, k.*, sp.* FROM {$this->table} AS s LEFT JOIN kelas AS k ON s.id_kelas=k.id_kelas LEFT JOIN spp AS sp ON s.id_spp = sp.id_spp WHERE s.id_siswa=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function updateSiswaById($data)
    {
        $query = "UPDATE {$this->table} SET nisn=:nisn, nis=:nis, nama_siswa=:nama, no_telp=:telp, alamat=:alamat, id_spp=:id_spp, id_kelas=:id_kelas WHERE id_siswa=:id_siswa";
        $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('telp', $data['telp']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('id_spp', $data['spp']);
        $this->db->bind('id_kelas', $data['kelas']);
        $this->db->bind('id_siswa', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getSiswaByNIS($nis)
    {
        $query = "SELECT s.*, k.*, sp.* FROM {$this->table} AS s LEFT JOIN kelas AS k ON s.id_kelas=k.id_kelas LEFT JOIN spp AS sp ON s.id_spp=sp.id_spp WHERE s.nis=:nis";
        $this->db->query($query);
        $this->db->bind('nis', $nis);
        
        return $this->db->single();
    }

    public function deleteSiswa($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id_siswa=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}