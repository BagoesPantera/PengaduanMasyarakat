<?php 

class Auth_model{
    private $table = 'masyarakat';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function login($data){
        $pass = md5($data['passwords']);

        $query = "CALL `login`(:username,:password)";

        $this->db->query($query);
        
        $this->db->bind('username', $data['usernames']);
        $this->db->bind('password', $pass);

        return $this->db->single();
    }
    public function loginadmin($data){
        $pass = md5($data['passwords']);

        $query = "CALL `loginadmin`(:username,:password)";

        $this->db->query($query);
        
        $this->db->bind('username', $data['usernames']);
        $this->db->bind('password', $pass);

        return $this->db->single();
    }

    public function cekregistermas($data){
        $query = "CALL `cekregistermas`(:nik,:username)";

        $this->db->query($query);

        $this->db->bind('nik', $data['niks']);
        $this->db->bind('username', $data['usernames']);

        return $this->db->single();
    }
    public function cekregistermasnonik($data){
        $query = "CALL `cekregistermasnonik`(:username)";

        $this->db->query($query);

        $this->db->bind('username', $data['usernames']);

        return $this->db->single();
    }
    public function cekregisterpet($data){
        $query = "CALL `cekregisterpet`(:username)";

        $this->db->query($query);

        $this->db->bind('username', $data['usernames']);

        return $this->db->single();
    }
    public function register($data){
        $query = "CALL `register`(:nik,:nama,:username,:password,:telp)";

        $encryptedPass = md5($data['passwords']);

        $this->db->query($query);

        $this->db->bind('nik', $data['niks']);
        $this->db->bind('nama', $data['namas']);
        $this->db->bind('username', $data['usernames']);
        $this->db->bind('password', $encryptedPass);
        $this->db->bind('telp', $data['telps']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}