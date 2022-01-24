<?php
    require_once('./../inc/utilisateur/photo_de_profil.php');

    if (isset($_FILES["file-input"]["name"]))
    {
        $target_dir = "./assets/IMG/user/";
        $target_file = $target_dir . basename($_FILES["file-input"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        $check = getimagesize($_FILES["file-input"]["tmp_name"]);
        if (file_exists($target_file))
        {
            $uploadOk = 0;
            
            $PPstatement = $pdo->prepare("UPDATE inscrit SET photo_i = :photo_i WHERE id_p = :id_p");
            $PPstatement->bindValue(':photo_i', $target_dir);
            $PPstatement->execute();
        }
        
        if ($uploadOk == 0) 
        {
            echo "non";
        }
        else
        {
            if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target_file))
            {
                echo "The file ". htmlspecialchars( basename( $_FILES["file-input"]["name"])). " has been uploaded.";
                
                $PPstatement = $pdo->prepare("UPDATE inscrit SET photo_i = :photo_i WHERE id_p = :id_p");
                $PPstatement->bindValue(':photo_i', $target_dir);
                $PPstatement->execute();
            }
            else 
            {
                echo "non";
            }
            
        }
        
    }
    
?>