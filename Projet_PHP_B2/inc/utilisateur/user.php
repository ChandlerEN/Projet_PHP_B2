<?php

function modifier_mdp ($pdo, string $email, string $mdp)
{
    if ($email && $mdp)
    {
        $oldPWDstat = $pdo->prepare ("SELECT mdp_i FROM inscrit WHERE mail_i = :mail_i");
        $oldPWDstat->bindValue('mail_i', $email);
        $oldPWDstat->execute();
        
        $oldPWDresult = $oldPWDstat->fetch();
        
        if (password_verify ($mdp, $oldPWDresult[0]))
        {
            $newPWDstat = $pdo->prepare ("UPDATE inscrit SET mdp_i = :mdp_i WHERE mail_u = = :mail_i");
            $newPWDstat->bindValue('mdp_i', password_hash ($_POST["npwd"], PASSWORD_BCRYPT));
            $newPWDstat->bindValue('mail_i', $email);
            $newPWDstat->execute();
        }
        else
        {
            echo "non";
        }
        
    }

}

function modifier_pseudo ($pdo, string $id, string $mdp, string $pseudo)
{
    if ($pseudo && $mdp)
    {
        $PWDstat = $pdo->prepare ("SELECT mdp_i FROM inscrit WHERE id_i = :id_i");
        $PWDstat->bindValue(':id_i', $id);
        $PWDstat->execute();
        
        $PWDresult = $PWDstat->fetch();
        
        if (password_verify ($mdp, $PWDresult[0]))
        {
            $newPWDstat = $pdo->prepare ("UPDATE inscrit SET pseudo_i = :pseudo_i WHERE id_i = :id_i");
            $newPWDstat->bindValue(':pseudo_i', $pseudo);
            $newPWDstat->bindValue(':id_i', $id);
            $newPWDstat->execute();
        }
        else
        {
            echo "non";
        }
        
    }

}

function trouver_pseudo ($pdo, string $id): string
{
    $UserStatement = $pdo->prepare("SELECT nom_i FROM inscrit WHERE id_i = :id_i");
    $UserStatement->bindValue(':id_i', $id);
    $UserStatement->execute();
    $pseudo_result = $UserStatement->fetch();

    return $pseudo_result[0];
}

function trouver_email ($pdo, string $id): string
{
    $UserStatement = $pdo->prepare("SELECT mail_i FROM inscrit WHERE id_i = :id_i");
    $UserStatement->bindValue(':id_i', $id);
    $UserStatement->execute();
    $email_result = $UserStatement->fetch();

    return $email_result[0];
}

?>