<?php

$bdd = new PDO($dsn, $user, $password);
$bddStat = $bdd->prepare('SELECT * FROM inscrit');

$execute = $bddStat->execute();


$contacts = $bddStat->fetchAll();
$active = 'class="btn active" ';
$inactive = 'class="btn inactive" ';
