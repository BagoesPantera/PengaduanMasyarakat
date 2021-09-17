<?php 

class Laporan extends Controller{
    public function pengaduan(){
        if (isset($_GET['waktu'])) {
            $data['history'] = $this->model('Pengaduan_model')->pengaduanDate($_GET['waktu']);
        }
        else{
            $data['history'] = $this->model('Pengaduan_model')->pengaduanAll();
        }
        $data['waktu'] = '';
        if(isset($_GET['waktu'])){
            if($_GET['waktu'] == '1 Bulan Terakhir'){
                $data['waktu'] = '1 Bulan Terakhir';
            }elseif ($_GET['waktu'] == 'Hari Ini') {
                $data['waktu'] = 'Hari Ini';
            }else{
                $data['waktu'] = '1 Tahun Terakhir';
            }
        }
        
        $this->view('laporan/pengaduan', $data);
    }
}