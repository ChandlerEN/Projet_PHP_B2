<?php
$pdo = new PDO($dsn, $user, $password);

function inscription($pdo) : void
{
    if (isset($_POST["pseudo"]) && isset($_POST["Iemail"]) && isset($_POST["Ipwd"]))
    {
        $pseudo = $_POST["pseudo"];
        $email  = $_POST["Iemail"];
        $mdp    = $_POST["Ipwd"];
        
        if ($email && $mdp && $mdp == $_POST["cpwd"])
        {
            $statement = $pdo->prepare ("INSERT INTO inscrit (nom_i, mail_i, mdp_i) VALUES (:nom_i, :mail_i, :mdp_i)");
            $statement->bindValue(':nom_i', $pseudo);
            $statement->bindValue(':mail_i', $email);
            $statement->bindValue(':mdp_i', password_hash($mdp, PASSWORD_BCRYPT));
            $statement->execute();
            
            $AllStatement = $pdo->prepare ("SELECT * FROM inscrit WHERE mail_i = :mail_i");
            $AllStatement->bindValue(':mail_i', $email);
            $AllStatement->execute();
            
            $result = $AllStatement->fetch();
            
            $domain = ($_SERVER['HTTP_HOST'] != 'projetphpb2') ? $_SERVER['HTTP_HOST'] : false;
            setcookie('id', $result[0], time()+3600, '/', $domain);
            setcookie('cookie_email', $result[1], time()+3600, '/', $domain);
            header("Refresh:0");
        }
        
    }
}

function connexion_utilisateur($pdo)
{
    if (isset($_POST['email']) && isset($_POST['pwd']))
    {
        $id_result = connexion ($pdo, $_POST['email'], $_POST['pwd']);
        if ($id_result)
        {
            $domain = ($_SERVER['HTTP_HOST'] != 'projetphpb2') ? $_SERVER['HTTP_HOST'] : false;
            setcookie('id', $id_result, time()+3600, '/', $domain);
            setcookie('cookie_email', $_POST['email'], time()+3600, '/', $domain);
            header("Refresh:0");
        }
    }
}



function select_pwd ($pdo, string $id): string
{
    $SLCTstatement = $pdo->prepare("SELECT mdp_i FROM inscrit WHERE id_i = :id_i");
    $SLCTstatement->bindValue(':id_i', $id);
    $SLCTstatement->execute();
    $result = $SLCTstatement->fetch();
    
    return $result[0];
}


function connexion ($pdo, string $email, string $pwd): string
{
    $StatementResult = null;
    if ($email)
    {
        $statement = $pdo->prepare("SELECT mdp_i FROM inscrit WHERE mail_i = :mail_i");
        $statement->bindValue(':mail_i', $email);
        $statement->execute();
        if ($pdo->errorCode() != 0)
        {
            print_r ($pdo->errorCode());
        }
        else
        {
            $mdp_hash = $statement->fetch();

            if (password_verify ($pwd, $mdp_hash[0]) === TRUE)
            {
                $statement = $pdo->prepare("SELECT * FROM inscrit WHERE mail_i = :mail_i");
                $statement->bindValue(':mail_i', $email);
                $statement->execute();

                $StatementResult = $statement->fetch();
            }
            else echo "non";

        }

    }
    
    if ($StatementResult[0])
        return $StatementResult[0];
    else
        return '';
}
            
        
?>