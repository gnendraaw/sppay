<?php

class Direct {
    public static function directTo($path = '')
    {
        header('location: ' . BASE_URL . $path);
        exit;
    }
}