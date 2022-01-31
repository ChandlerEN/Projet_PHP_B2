<?php

function upload($pdo)
{
    if (isset($_FILES["file-input"]["name"]))
    {
        $target_dir = "./assets/IMG/user/";
        $target_file = $target_dir . basename($_FILES["file-input"]["name"]);
        echo $target_file;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        $check = getimagesize($_FILES["file-input"]["tmp_name"]);
        if (file_exists($target_file))
        {
            $uploadOk = 0;
            
            $PPstatement = $pdo->prepare("UPDATE inscrit SET photo_i = :photo_i WHERE id_i = :id_i");
            $PPstatement->bindValue(':photo_i', $target_dir);
            $PPstatement->bindValue(':id_i', $_COOKIE['id']);
            $PPstatement->execute();
        }
        
        if ($uploadOk == 0) 
        {
            header("Refresh:0");
        }
        else
        {
            if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target_file))
            {
                echo "The file ". htmlspecialchars( basename( $_FILES["file-input"]["name"])). " has been uploaded.";
                
                $PPstatement = $pdo->prepare("UPDATE inscrit SET photo_i = :photo_i WHERE id_i = :id_i");
                $PPstatement->bindValue(':photo_i', $target_dir);
                $PPstatement->bindValue(':id_i', $_COOKIE['id']);
                $PPstatement->execute();
                header("Refresh:0");
            }
            else 
            {
                header("Refresh:0");
            }
            
        }
        
    }

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