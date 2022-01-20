<?php

$pdo = new PDO($dsn, $user, $password);

if (isset($_POST['delete'])) {

	$delete = $_POST['delete'];
	

	$pdoSupp = $pdo->prepare('DELETE FROM article WHERE id_a = :id_a');

	$pdoSupp->bindValue(':id_a', $delete);

	$executeIsOk = $pdoSupp->execute();

	if ($executeIsOk) {
		echo "hop supprimer";
	}
	else{
		echo "NON";
	}
}
