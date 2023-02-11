<?php

class Logout extends Controller {
    public function index()
    {
        if (isset($_SESSION['user']))
        {
            unset($_SESSION['user']);
            header('location: ' . BASE_URL . '/login');
            exit;
        }
        header('location: ' . BASE_URL);
        exit;
    }
}