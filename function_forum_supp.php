<?php

$pdo = new PDO($dsn, $user, $password);

if (isset($_POST['supp'])) {

	$supp = $_POST['supp'];
	

	$pdoSuppr = $pdo->prepare('DELETE FROM forum WHERE id_f = :id_f');

	$pdoSuppr->bindValue(':id_f', $supp);

	$executeIsOk = $pdoSuppr->execute();

	if ($executeIsOk) {
		echo "hop supprimer";
	}
	else{
		echo "NON";
	}
}
