<?php

class Home extends Controller {
    public function index()
    {
        $data['darah'] = $this->model('darah_model')->getAllDarah();
        $data['jadwal'] = $this->model('jadwal_model')->getAllJadwal();
        $this->view('templates/header');
        $this->view('templates/navbar_home');
        $this->view('home/index',$data);
        $this->view('templates/footer');
    }

}