<?php 

class User extends Controller {

    public function index(){
        $data["judul"] = 'Pengaduan Masyarakat';
        $this->view('template/userheader', $data);
        $this->view('user/index', $data);
        $this->view('template/userfooter', $data);
    }
    public function buat(){
        $data["judul"] = 'Pengaduan Masyarakat';
        $this->view('template/userheader', $data);
        $this->view('user/buat', $data);
        $this->view('template/userfooter', $data);
    }
    public function buatproses(){
        if($this->model('User_model')->buatproses($_POST) > 0){
            $_SESSION['successinput'] = true;
            header('location:' . BASEURL . 'user/history');
            exit;
        }else{
            $_SESSION['failbuat'] = true;
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        }
    }
    public function history(){
        $data["judul"] = 'Pengaduan Masyarakat';

        if(isset($_GET['search'])){
            $data['history'] = $this->model('User_model')->historySearch($_GET['search']);
            if(empty($data['history'])){
                $data['history'] = 'default';
                $data['kosong'] = 'kosong';
            }
        }elseif (isset($_GET['waktu'])) {
            $data['history'] = $this->model('User_model')->historyDate($_GET['waktu']);
            if(empty($data['history'])){
                $data['history'] = 'default';
                $data['kosong'] = 'kosong';
            }
        }
        else{
            $data['history'] = $this->model('User_model')->historyUser();
        }
        $this->view('template/userheader', $data);
        $this->view('user/history', $data);
        $this->view('template/userfooter', $data);
    }
    
}