<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/../inc/connexion.php');
require($_SERVER['DOCUMENT_ROOT'] . '/../inc/templates/header.php');

$route = $_SERVER['REQUEST_URI'];

$filename = explode('/', $route)[1];

if($filename === '') {
    $filename = 'admin_bde';
}

$path = $_SERVER['DOCUMENT_ROOT'] . '/../routes/' . $filename . '.php';

if (is_file($path)) {
    require($path);
} else {
    header("HTTP/1.1 404 Not Found");
    require($_SERVER['DOCUMENT_ROOT'] . '/../inc/templates/erreur404.php');
}

require($_SERVER['DOCUMENT_ROOT'] . '/../inc/templates/footer.php');