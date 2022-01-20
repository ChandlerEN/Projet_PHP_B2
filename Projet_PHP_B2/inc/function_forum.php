<?php

$bdd = new PDO($dsn, $user, $password);

$bddFor = $bdd->prepare('SELECT * FROM forum');

$exe = $bddFor->execute();

$forum = $bddFor->fetchAll();