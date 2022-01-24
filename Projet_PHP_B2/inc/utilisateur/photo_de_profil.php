<?php

function select_id_p ($pdo, string $id): string
{
    $UserStatement = $pdo->prepare("SELECT id_pdp_i FROM inscrit WHERE id_i = :id_i");
    $UserStatement->bindValue(':id_i', $id);
    $UserStatement->execute();
    $id_pdp_i = $UserStatement->fetch();
    
    return $id_pdp_i[0];
}

function chargement_pp ($pdo, string $id): string
{
    $UserStatement = $pdo->prepare("SELECT photo_i FROM inscrit WHERE id_i = :id_i");
    $UserStatement->bindValue(':id_i', $id);
    $UserStatement->execute();
    $photo_i = $UserStatement->fetch();

    return $photo_i[0];
}

?>