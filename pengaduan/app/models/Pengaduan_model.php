<?php 

class Pengaduan_model{
    protected $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function pengaduanAll(){
        $query = "CALL `getPengaduan`();";

        $this->db->query($query);

        return $this->db->resultSet();
    }
    public function pengaduanSearch($keyword){
        $this->db->query("CALL `pengaduanSearch`(:keyword)");

        $this->db->bind('keyword', '%' . $keyword . '%');
        return $this->db->resultSet();
    }
    public function pengaduanDate($waktu){
        if($waktu == '1 Bulan Terakhir'){
            $query = "CALL `pengaduanMonthpet`()";
        }elseif ($waktu == 'Hari Ini') {
            $query = "CALL `pengaduanDaypet`()";
        }elseif ($waktu == '1 Tahun Terakhir') {
            $query = "CALL `pengaduanYearpet`()";
        }
        $this->db->query($query);

        return $this->db->resultSet();
    }
    public function detail($id){
        $query = "CALL `detailpengaduan`(:id)";
        $this->db->query($query);

        $this->db->bind('id', $id);

        return $this->db->single();
    }
    public function userData($nik){
        $query = "CALL `userData`(:nik)";
        $this->db->query($query);

        $this->db->bind('nik', $nik);

        return $this->db->single();
    }
    public function tanggapan($id){
        $query = "CALL `tanggapanData`(:id)";
        $this->db->query($query);

        $this->db->bind('id', $id);

        return $this->db->resultSet();
    }
    public function submitTanggapan($data){
        $date = date("Y/m/d");
        $query = "CALL `submitTanggapan`(:id_pengaduan, :tgl_tanggapan, :tanggapan, :id_petugas, :nama)";
        $this->db->query($query);

        $this->db->bind('id_pengaduan', $data['id_pengaduans']);
        $this->db->bind('tgl_tanggapan', $date);
        $this->db->bind('tanggapan', $data['isi']);
        $this->db->bind('id_petugas', $_SESSION['data']['id_petugas']);
        $this->db->bind('nama', $_SESSION['data']['nama_petugas']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function tandaiSelesai($id){
        $query = "UPDATE pengaduan SET status = 'selesai' WHERE id_pengaduan = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}