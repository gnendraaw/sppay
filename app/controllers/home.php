<?php

class Home extends Controller {
    public function index()
    {
        Middleware::onlySiswa();

        $data = [
            'title' => 'Dashboard Siswa',
            'heading' => 'dashboard',
            'options' => 'dashboard',
        ];

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}