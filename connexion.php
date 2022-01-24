<?php

$dsn = file_get_contents('../config/dsn');
$credentials_handle = fopen('../config/credentials', 'r');
$credentials_array = [];


while ($line = fgets($credentials_handle)) {
    $credentials_array[] = trim($line);
}
[$user, $password] = $credentials_array;

$pdo = new PDO($dsn, $user, $password);