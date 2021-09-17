<?php 

class Pengaduan extends Controller{
    public function index($default = 'tes'){
        if(isset($_GET['search'])){
            $data['history'] = $this->model('Pengaduan_model')->pengaduanSearch($_GET['search']);
            if(empty($data['history'])){
                $data['history'] = 'lol';
                $data['kosong'] = 'kosong';
            }
        }elseif (isset($_GET['waktu'])) {
            $data['history'] = $this->model('Pengaduan_model')->pengaduanDate($_GET['waktu']);
            if(empty($data['history'])){
                $data['history'] = 'lol';
                $data['kosong'] = 'kosong';
            }
        }
        else{
            $data['history'] = $this->model('Pengaduan_model')->pengaduanAll();
        }
        $this->view('template/adminheader');
        $this->view('pengaduan/index', $data);
        $this->view('template/adminfooter');
    }
    public function detail($id){
        $data['pengaduan'] = $this->model('Pengaduan_model')->detail($id);
        $data['user'] = $this->model('Pengaduan_model')->userData($data['pengaduan']['nik']);
        $data['tanggapan'] = $this->model('Pengaduan_model')->tanggapan($data['pengaduan']['id_pengaduan']);
        if(isset($_SESSION['data']['level'])){
            $this->view('template/adminheader');
            $this->view('pengaduan/detail', $data);
            $this->view('template/adminfooter');
        }else{
            $this->view('template/userheader');
            $this->view('pengaduan/detail', $data);
            $this->view('template/userfooter');
        }
        
    }
    public function submitTanggapan(){
        if($this->model('Pengaduan_model')->submitTanggapan($_POST) > 0){
            $_SESSION['succestanggapan'] = true;
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        }else{
            $_SESSION['gagaltanggapan'] = true;
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        }
    }
    public function tandaiSelesai(){
        if($this->model('Pengaduan_model')->tandaiSelesai($_POST['id']) > 0){
            $_SESSION['successselesai'] = true;
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        }else {
            $_SESSION['gagalselesai'] = true;
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        }
    }
}