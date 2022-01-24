<?php

$pdo = new PDO($dsn, $user, $password);


if (isset($_POST['send'])) {

$destination = "./assets/IMG/article/";
$userId = $_COOKIE['id'];
$titre = htmlspecialchars ($_POST['title']);
$contenu = htmlspecialchars ($_POST['message']);
$image = htmlspecialchars ($_POST['file']);
	$pdoStat = $pdo->prepare('INSERT INTO `article` (`id_a`, `titre_a`, `contenu_a`, `image_a`, `date_a`, `user_a`) VALUES (NULL, :titre_a, :contenu_a, :image_a, CURRENT_DATE, :user_a)');

	$pdoStat->bindValue(':titre_a', $titre, PDO::PARAM_STR);
	$pdoStat->bindValue(':contenu_a', $contenu, PDO::PARAM_STR);
	$pdoStat->bindValue(':image_a', $destination . $image, PDO::PARAM_STR);
	$pdoStat->bindValue(':user_a', $userId, PDO::PARAM_STR);

	$exe = $pdoStat->execute();

	if ($exe) {
		echo "article ajouté";
	}
	else{
		echo "NON";
	}
}

