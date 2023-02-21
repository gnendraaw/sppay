<?php

class Level_model {
    private $db;
    private $table = 'level';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllLevel()
    {
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);

        return $this->db->resultSet();
    }
}