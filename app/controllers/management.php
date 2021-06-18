<?php

class Management extends Controller {
    public function index()
        {
            $data['darah'] = $this->model('darah_model')->getAllDarah();
            $data['jadwal'] = $this->model('jadwal_model')->getAllJadwal();
            $data['pendonor'] = $this->model('pendonor_model')->getAllPendonor();
            $this->view('templates/header');
            $this->view('templates/navbar');
            $this->view('management/index',$data);
            $this->view('templates/footer');
        }

    public function hapusPendonor($id)
        {
            if($this->model('pendonor_model')->hapusDataPendonor($id)>0){
                header('Location: ' . BASEURL . '/management');
                exit;
            }
        }

    public function hapusJadwal($id)
        {
            if($this->model('jadwal_model')->hapusDataJadwal($id)>0){
                header('Location: ' . BASEURL . '/management');
                exit;
            }
        }

    public function getdatagol(){
        echo json_encode ($this->model('darah_model')->getDatabyGoldar($_POST['goldar']));
    }

    public function getdatajadwal(){
        echo json_encode ($this->model('jadwal_model')->getDatabyJadwal($_POST['id']));
    }
    public function getdatadonor(){
        echo json_encode ($this->model('pendonor_model')->getDatabyDonor($_POST['id']));
    }

    public function tambahjadwal()
    {
        if($this->model('jadwal_model')->tambahDataJadwal($_POST)>0){
            header('Location: ' . BASEURL . '/management');
            exit;
        }
    }
    public function tambahpendonor()
    {
        if($this->model('pendonor_model')->tambahDataDonor($_POST)>0){
            header('Location: ' . BASEURL . '/management');
            exit;
        }
    }
    public function ubahstok()
    {
        if($this->model('darah_model')->ubahDataStok($_POST)>0){
            header('Location: ' . BASEURL . '/management');
            exit;
        }
    }
    public function ubahjadwal()
    {
        if($this->model('jadwal_model')->ubahDataJadwal($_POST)>0){
            header('Location: ' . BASEURL . '/management');
            exit;
        }
    }
    public function ubahpendonor()
    {
        if($this->model('pendonor_model')->ubahDataDonor($_POST)>0){
            header('Location: ' . BASEURL . '/management');
            exit;
        }
    }


}
