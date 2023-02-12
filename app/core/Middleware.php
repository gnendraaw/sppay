<?php

class Middleware {
    public static function directTo($level, $path)
    {
        if ($_SESSION['user']['level']==$level) Direct::directTo($path);
    }

    public static function onlyLogedIn()
    {
        if (empty($_SESSION['user'])) Direct::directTo('/login');
    }

    public static function onlyNotLogedIn()
    {
        if (isset($_SESSION['user']))
        {
            Middleware::directTo(1, '/admin');
            Middleware::directTo(2, '/petugas');
            Middleware::directTo(3, '/siswa');
        }
    }

    public static function onlyAdmin()
    {
        Middleware::onlyLogedIn();
        Middleware::directTo(2, '/petugas');
        Middleware::directTo(3, '/siswa');
    }

    public static function onlyPetugas()
    {
        Middleware::onlyLogedIn();
        Middleware::directTo(1, '/admin');
        Middleware::directTo(3, '/siswa');
    }

    public function onlySiswa()
    {
        Middleware::onlyLogedIn();
        Middleware::directTo(1, '/admin');
        Middleware::directTo(2, '/petugas');
    }
}