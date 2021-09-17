<?php 

class Admin_model{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function masyarakat(){
        $this->db->query("CALL `masyarakatAll`()");
        return $this->db->resultSet();
    }
   
}