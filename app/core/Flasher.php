<?php

class Flasher {
    public static function setFlash($msg, $type)
    {
        $_SESSION['flash'] = [
            'msg' => $msg,
            'type' => $type,
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash']))
        {
            echo'
                <div class="card o-hidden border-0 bg-'.$_SESSION['flash']['type'].' my-3">
                    <div class="card-body p-3">
                        <h6 class="text-white">'.$_SESSION['flash']['msg'].'</h6>
                    </div>
                </div>
            ';
            unset($_SESSION['flash']);
        }
    }
}