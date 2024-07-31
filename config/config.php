<?php
// config.php

define('URL_PREFIX', '/prj01/Proyecto/');
define('URL_BASE_PATH', 'http://' . $_SERVER['HTTP_HOST'] . URL_PREFIX);
define('URL_BASE', URL_BASE_PATH . 'index.php?r=');
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');  // Puerto estándar de MySQL, cambia según necesidades
define('DB_NAME', 'automotora');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_CHARSET', 'utf8mb4');
