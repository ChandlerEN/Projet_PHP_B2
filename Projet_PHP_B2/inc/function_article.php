<?php

$bdd = new PDO($dsn, $user, $password);

$bddArt = $bdd->prepare('SELECT * FROM article');
$nameUser = $bdd->query('SELECT nom_i FROM article inner join inscrit on article.user_a = inscrit.id_i');

$execute = $bddArt->execute();
$articles = $bddArt->fetchAll();
$trueNameUser = $nameUser->fetchAll();