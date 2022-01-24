<?php

$bdd = new PDO($dsn, $user, $password);

$bddArt = $bdd->prepare('SELECT * FROM article');

$execute = $bddArt->execute();

$articles = $bddArt->fetchAll();