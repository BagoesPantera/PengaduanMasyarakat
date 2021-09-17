<?php 

class Home extends Controller {
    public function index(){
        if(isset($_SESSION['data']['level'])){
            header("Location: " . BASEURL . "admin");
        }else{
             header('Location:' . BASEURL . 'user');
        }
    }
}