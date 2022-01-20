<?php

$bdd = new PDO($dsn, $user, $password);
$bddStat = $bdd->prepare('SELECT * FROM inscrit');

$execute = $bddStat->execute();


$contacts = $bddStat->fetchAll();
$role = ['B1', 'B2', 'B3', 'M1', 'M2'];
$active = 'class="btn active" ';
$inactive = 'class="btn inactive" ';
