<?php

class Home extends Controller {
    public function index()
    {
        Middleware::onlySiswa();

        $this->view('templates/header');
        $this->view('home/index');
        $this->view('templates/footer');
    }
}