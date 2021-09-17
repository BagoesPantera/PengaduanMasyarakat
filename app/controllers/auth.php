<?php 

class Auth extends Controller{
    public function login(){
        $data["judul"] = 'Masuk';
        $this->view('auth/login', $data);
    }
    public function loginprocess(){
        if($this->model('Auth_model')->login($_POST) != NULL){
            $data = $this->model('Auth_model')->login($_POST);
            $_SESSION['data'] = $data;
            header('Location: ' . BASEURL . 'user');
            exit;
        }else{
            if($this->model('Auth_model')->loginadmin($_POST) != NULL){
                $data = $this->model('Auth_model')->loginadmin($_POST);
                var_dump($data['level']);
                if($data['level'] == 'admin' ){
                    $_SESSION['data'] = $data;
                    header('Location: ' . BASEURL . 'admin');
                    exit;
                }elseif ($data['level'] == 'petugas') {
                    $_SESSION['data'] = $data;
                    header('Location: ' . BASEURL . 'admin');
                    exit;
                }
            }else{
                $_SESSION['faillogin'] = true;
                header('Location: ' . BASEURL . 'auth/login');
                exit;
            }
        }
        
    }
    public function register(){
        $data["judul"] = 'Buat Akun';
        $this->view('auth/register', $data);
    }
    public function cekregister(){
        if(empty($this->model('Auth_model')->cekregistermas($_POST))){ //tb mas
            if(empty($this->model('Auth_model')->cekregisterpet($_POST))){ //tb pet
                if($this->model('Auth_model')->register($_POST) > 0){ //masukin
                    $data = $this->model('Auth_model')->login($_POST);
                    $_SESSION['data'] = $data;
                    header('Location:' . BASEURL . 'user');
                    exit;
                }else{
                    $_SESSION['failregis'] = true;
                    header('Location:' . BASEURL . 'auth/register');
                    exit;
                }
                exit;
            }else{
                $_SESSION['failregisexist'] = true;
                header('Location:' . BASEURL . 'auth/register');
                exit;
            }
        }else{
            $_SESSION['failregisexist'] = true;
            header('Location:' . BASEURL . 'auth/register');
            exit;
        }
    }

    public function logout(){
        unset($_SESSION['data']);
        session_destroy();
        header('Location:' . BASEURL . 'auth/login');
    }
}