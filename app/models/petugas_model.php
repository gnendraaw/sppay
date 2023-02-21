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
        $query = "SELECT p.*, l.* FROM {$this->table} AS p LEFT JOIN level AS l ON p.id_level=l.id_level";
        $this->db->query($query);

        return $this->db->resultSet();
    }
}