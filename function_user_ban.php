<?php

$pdo = new PDO($dsn, $user, $password);

if (isset($_POST['idInscrit'])) {

	$id_inscrit = $_POST['idInscrit'];
	

	$pdoBan = $pdo->prepare('UPDATE inscrit SET ban_i = 1 WHERE id_i = :id_i');

	$pdoBan->bindValue(':id_i', $id_inscrit, PDO::PARAM_INT);

	$executeIsOk = $pdoBan->execute();

	if ($executeIsOk) {
		echo "hop ban";
	}
	else{
		echo "NON";
	}
}
