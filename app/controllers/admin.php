<?php

class Admin extends Controller{
    public function index(){
        $this->view('template/adminheader');
        $this->view('admin/index');
        $this->view('template/adminfooter');
    }

    public function masyarakat(){
        $data['masyarakat'] = $this->model('Admin_model')->masyarakat();
        $this->view('template/adminheader');
        $this->view('admin/masyarakat', $data);
        $this->view('template/adminfooter');
    }
}
