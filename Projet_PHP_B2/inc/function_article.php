<?php

$bdd = new PDO($dsn, $user, $password);

$bddArt = $bdd->prepare('SELECT * FROM article');
$nameUser = $bdd->query('SELECT nom_i FROM inscrit order by id_i');

$execute = $bddArt->execute();
$articles = $bddArt->fetchAll();
$trueNameUser = $nameUser->fetchAll();