<?php 

class User_model{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function buatproses($data){
        $date = date("Y/m/d");
        
        $fotos = $this->upload();
        
        if(!$fotos){
            return 'fail';
        }
        
        $query = "CALL `buatproses`(:tgl_pengaduan,:nik,:subject,:isi_laporan,:foto,:status)";
        
        $this->db->query($query);

        $this->db->bind('tgl_pengaduan', $date);
        $this->db->bind('nik', $_SESSION['data']['nik']);
        $this->db->bind('subject', $data['subjects']);
        $this->db->bind('isi_laporan', $data['isis']);
        $this->db->bind('foto', $fotos);
        $this->db->bind('status', '0');


        $this->db->execute();

        return $this->db->rowCount();
    }
    public function upload(){
        $namaFile = $_FILES["fotos"]["name"];
        $sizeFile = $_FILES["fotos"]["size"];
        $error = $_FILES["fotos"]["error"];
        $tmpname = $_FILES["fotos"]["tmp_name"];

        //cek error
        if ($error === 4) {
            echo"
            <script>
                    alert('Pilih Gambar !');
                </script>";
                return 0;
        }

        //cek gambar atau ga
        $valid = ["jpg", "jpeg","png"];
        $eks = explode('.', $namaFile);
        $eks = strtolower(end($eks));

        if (!in_array($eks, $valid)) {
            echo "<script>
                    alert('Upload Gambar!');
                </script>";
                return 0;	
        }

        //cek ukuran file
        if ($sizeFile > 1000000000) {
            echo "<script>
                    alert('Gambar kamu lebih dari 1gb!');
                </script>";
                return 0;
        }

        //new img name
        $newFileName = uniqid();
        $newFileName .= '.';
        $newFileName .= $eks;

        //lolos
        move_uploaded_file($tmpname, '../public/img/masyarakat/keluhan/' . $newFileName);

        return $newFileName;
    }
    public function historyUser(){
        $query = "CALL `historyuser`(:nik)";

        $this->db->query($query);

        $this->db->bind('nik', $_SESSION['data']['nik']);

        return $this->db->resultSet();
    }
    public function historySearch($keyword){
        $this->db->query("CALL `historySearch`(:nik,:keyword)");

        $this->db->bind('nik', $_SESSION['data']['nik']);
        $this->db->bind('keyword', '%' . $keyword . '%');
        return $this->db->resultSet();
    }
    public function historyDate($waktu){
        if($waktu == '1 Bulan Terakhir'){
            $query = "CALL `pengaduanMonth`(:nik)";
        }elseif ($waktu == 'Hari Ini') {
            $query = "CALL `pengaduanDay`(:nik)";
        }elseif ($waktu == '1 Tahun Terakhir') {
            $query = "CALL `pengaduanYear`(:nik)";
        }
        $this->db->query($query);

        $this->db->bind('nik', $_SESSION['data']['nik']);

        return $this->db->resultSet();
        
        
    }
}
