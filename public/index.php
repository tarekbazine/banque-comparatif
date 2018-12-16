<?php

define('URL_SUB_FOLDER', str_replace('public', '', dirname($_SERVER['SCRIPT_NAME'])));

define('URL', '//' . $_SERVER['HTTP_HOST'] . URL_SUB_FOLDER);

define('APP', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);

// load application class
require APP . 'core/application.php';

// start the application
$app = new Application();
