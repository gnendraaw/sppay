<?php

class siswa_model {
    private $table = 'siswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSiswaByUsernameAndPassword($data)
    {
        $query = "SELECT * FROM {$this->table} WHERE nis=:nis AND password=:password";
        $this->db->query($query);
        $this->db->bind('nis', $data['username']);
        $this->db->bind('password', $data['password']);

        return $this->db->single();
    }  
}