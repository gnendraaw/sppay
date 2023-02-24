<?php

class Petugas extends Controller {
    public function index()
    {
        Middleware::onlyPetugas();

        $data = [
            'title' => 'Petugas',
            'heading' => 'dashboard',
            'options' => 'dashboard',
        ];

        $this->view('templates/header', $data);
        $this->view('petugas/index', $data);
        $this->view('templates/footer');
    }
}