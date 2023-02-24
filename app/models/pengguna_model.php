<?php

class Pengguna_model {
    private $db;
    private $table = 'pengguna';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPenggunaByUsernameAndPassword($data)
    {
        $query = "SELECT p.*, l.* FROM {$this->table} AS p LEFT JOIN level AS l ON p.level=l.id_level WHERE p.username=:username AND p.password=:password";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);

        return $this->db->single();
    }

    public function addPengguna($data)
    {
        $query = "CALL addPengguna(:username, :password, :level)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('level', $data['level']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getLatestIdPengguna()
    {
        $query = "SELECT id_pengguna FROM {$this->table} ORDER BY id_pengguna DESC LIMIT 1";
        $this->db->query($query);

        return $this->db->single();
    }

    public function deletePengguna($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id_pengguna=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updatePengguna($data)
    {
        $query = "CALL updatePengguna(:username, :password, :id_level, :id_pengguna)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('id_level', $data['id_level']);
        $this->db->bind('id_pengguna', $data['id_pengguna']);

        $this->db->execute();
        
        return $this->db->rowCount();
    }
}