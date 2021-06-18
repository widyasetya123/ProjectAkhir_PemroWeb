<?php

class Login extends Controller {
    public function index()
    {
        $data['admin'] = $this->model('login_model')->getadmin();
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('login/index',$data);
        $this->view('templates/footer');
    }

}