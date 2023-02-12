<?php

class Spp_model {
    private $table = 'spp';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSpp()
    {
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);

        return $this->db->resultSet();
    }

    public function addSpp($data)
    {
        $query = "INSERT INTO {$this->table} VALUES(NULL, :tahun, :nominal)";
        $this->db->query($query);
        $this->db->bind('tahun', $data['tahun']);
        $this->db->bind('nominal', $data['nominal']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function removeSpp($data)
    {
        $query = "DELETE FROM {$this->table} WHERE id_spp=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id_spp']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}