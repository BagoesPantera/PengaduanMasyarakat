<?php 

class Petugas_model{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function petugasAll(){
        $query = "CALL `petugasAll`(:level)";

        $this->db->query($query);

        $this->db->bind('level', 'petugas');

        return $this->db->resultSet();
    }
    public function input($data){
        $pass = md5($data['passwords']);
        $query = "CALL `inputpetugas`(:nama_petugas, :username, :password, :telp, :level)";
        
        $this->db->query($query);

        $this->db->bind('nama_petugas', $data['namas']);
        $this->db->bind('username', $data['usernames']);
        $this->db->bind('password', $pass);
        $this->db->bind('telp', $data['telps']);
        $this->db->bind('level', 'petugas');

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function petugas($id){
        $query = "CALL `petugasdetail`(:id)";

        $this->db->query($query);

        $this->db->bind('id', $id);

        return $this->db->single();
    }
    public function update($data){
        $oldpass = $this->petugas($data['ids']);

        $pass = $data['passwords'];

        if(!($oldpass['password'] == $pass)){
            $pass = md5($data['passwords']);
        }
        $query = "CALL `updatepetugas`(:nama_petugas,:username,:password,:telp,:id)";

        $this->db->query($query);

        $this->db->bind('nama_petugas', $data['namas']);
        $this->db->bind('username', $data['usernames']);
        $this->db->bind('password', $pass);
        $this->db->bind('telp', $data['telps']);
        $this->db->bind('id', $data['ids']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}