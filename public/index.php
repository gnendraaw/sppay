<?php

require_once '../app/init.php';

if (!session_id()) session_start();

date_default_timezone_set('Asia/Ujung_Pandang');

$app = new App;