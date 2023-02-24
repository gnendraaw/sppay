<?php

class Admin extends Controller {
    public function index()
    {
        Middleware::onlyAdmin();

        $data = [
            'title' => 'Dashboard',
            'heading' => 'dashboard',
            'options' => 'dashboard',
        ];

        $this->view('templates/header', $data);
        $this->view('admin/index');
        $this->view('templates/footer');
    }
}