<?php

class Petugas_model {
    private $table = 'petugas';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPetugasByUsernameAndPassword($data)
    {
        $query = "SELECT p.*, l.keterangan FROM {$this->table} AS p LEFT JOIN level AS l ON p.id_level=l.id_level WHERE p.username=:username AND p.password=:password";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);

        return $this->db->single();
    }

    public function getAllPetugas()
    {
        $query = "SELECT * FROM selectPetugas";
        $this->db->query($query);

        return $this->db->resultSet();
    }

    public function addPetugas($data)
    {
        $query = "CALL addPetugas(:username, :nama, :id_pengguna)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('id_pengguna', $data['id_pengguna']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getPetugasById($id)
    {
        $query = "SELECT * FROM selectPetugas WHERE id_petugas=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function getPetugasIdByPenggunaId($id)
    {
        $query = "SELECT id_petugas FROM {$this->table} WHERE id_pengguna=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function getPetugasByPenggunaId($id)
    {
        $query = "SELECT * FROM selectPetugas WHERE id_pengguna=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function updatePetugas($data)
    {
        $query = "CALL updatePetugas(:username, :nama, :id_petugas)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('id_petugas', $data['id_petugas']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletePetugas($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id_petugas=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}