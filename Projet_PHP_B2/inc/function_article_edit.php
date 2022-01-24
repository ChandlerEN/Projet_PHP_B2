<?php

$pdo = new PDO($dsn, $user, $password);

if (isset($_POST['edit'])) {

    $destination = "./assets/IMG/article/";
    $titre = $_POST['title'];
    $contenu = $_POST['message'];
    $image = $_POST['file'];
        $pdoStat = $pdo->prepare('UPDATE `article` (`id_a`, `titre_a`, `contenu_a`, `image_a`, `date_a`, `user_a`) SET (NULL, :titre_a, :contenu_a, :image_a, CURRENT_DATE, 2)');
    
        $pdoStat->bindValue(':titre_a', $titre, PDO::PARAM_STR);
        $pdoStat->bindValue(':contenu_a', $contenu, PDO::PARAM_STR);
        $pdoStat->bindValue(':image_a', $destination . $image, PDO::PARAM_STR);
    
        $exe = $pdoStat->execute();
    
        if ($exe) {
            echo "article modifié";
        }
        else{
            echo "NON";
        }
    }
    
    