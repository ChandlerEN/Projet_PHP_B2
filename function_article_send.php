<?php

$pdo = new PDO($dsn, $user, $password);


if (isset($_POST['send'])) {

$destination = "./assets/IMG/article/";
$titre = $_POST['title'];
$contenu = $_POST['message'];
$image = $_POST['file'];

	$pdoStat = $pdo->prepare('INSERT INTO `article` (`id_a`, `titre_a`, `contenu_a`, `image_a`) VALUES (NULL, :titre_a, :contenu_a, :image_a)');

	$pdoStat->bindValue(':titre_a', $titre, PDO::PARAM_STR);
	$pdoStat->bindValue(':contenu_a', $contenu, PDO::PARAM_STR);
	$pdoStat->bindValue(':image_a', $destination . $image, PDO::PARAM_STR);

	$exe = $pdoStat->execute();

	if ($exe) {
		echo "article ajouté";
	}
	else{
		echo "NON";
	}
}

