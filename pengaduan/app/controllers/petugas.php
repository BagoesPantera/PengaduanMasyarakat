<?php 

class Petugas extends Controller{
    public function index(){
        $data['data'] = $this->model('Petugas_model')->petugasAll();
        $this->view('template/adminheader');
        $this->view('petugas/index', $data);
        $this->view('template/adminfooter');
    }
    public function tambah(){
        $this->view('template/adminheader');
        $this->view('petugas/tambah');
        $this->view('template/adminfooter');
    }
    public function input(){
        if(empty($this->model('Auth_model')->cekregistermasnonik($_POST))){ //tb mas
            if(empty($this->model('Auth_model')->cekregisterpet($_POST))){ //tb pet
                if($this->model('Petugas_model')->input($_POST) > 0){
                    $_SESSION['insuc'] = true;
                    header('Location: ' . BASEURL . 'petugas');
                    exit;
                }else{
                    header('Location: ' . BASEURL . 'petugas');
                    exit;
                }
                exit;
            }else{
                $_SESSION['failinput'] = true;
                header('Location:' . BASEURL . 'petugas');
                exit;
            }
        }else{
            $_SESSION['failinput'] = true;
            header('Location:' . BASEURL . 'petugas');
            exit;
        }
    }
    public function detail($id){
        $data['data'] = $this->model('Petugas_model')->petugas($id);
        $this->view('template/adminheader');
        $this->view('petugas/detail', $data);
        $this->view('template/adminfooter');
    }
    public function update(){
        $data['olddata'] = $this->model('Petugas_model')->petugas($_POST['ids']);
        if(!($data['olddata']['username'] == $_POST['usernames'])){
            if(empty($this->model('Auth_model')->cekregistermasnonik($_POST))){
                if(empty($this->model('Auth_model')->cekregisterpet($_POST))){
                    if($this->model('Petugas_model')->update($_POST) > 0){
                        $_SESSION['upsuc'] = true;
                        header('Location: ' . BASEURL . 'petugas');
                        exit;
                    }else{
                        $_SESSION['upfail'] = true;
                        header('Location: ' . BASEURL . 'petugas');
                        exit;
                    }
                }else{ //cekregispet
                    $_SESSION['upfailexist'] = true;
                    header('Location: ' . BASEURL . 'petugas');
                    exit;
                } 
            }else{ //cekregisnonik
                $_SESSION['upfailexist'] = true;
                header('Location: ' . BASEURL . 'petugas');
                exit;
            }
        }else{ //cek username
            if($this->model('Petugas_model')->update($_POST) > 0){
                $_SESSION['upsuc'] = true;
                header('Location: ' . BASEURL . 'petugas');
                exit;
            }else{
                $_SESSION['upfail'] = true;
                header('Location: ' . BASEURL . 'petugas');
                exit;
            }
        }
    }
}