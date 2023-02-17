<?php

class Kelas_model {
    private $db;
    private $table = 'kelas';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKelas()
    {
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);

        return $this->db->resultSet();
    }

    public function addKelas($data)
    {
        $query = "INSERT INTO {$this->table} VALUES(NULL, :nama, :komp)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('komp', $data['komp']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteKelas($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id_kelas=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}