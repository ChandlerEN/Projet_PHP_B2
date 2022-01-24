    <body>
        <header>
            
        </header>
        
        <?php require_once ("./../inc/utilisateur/connexion_utilisateur.php"); ?>
        
        <center>
            <main>
                <h3>Se connecter :</h3>
                <form id="connexion" action="<?php connexion_utilisateur($pdo) ?>" method="post">
                    <label>Adresse email :</label><input type="email" name="email"/><br>
                    <label>Mot de passe  :</label><input type="password" name="pwd"/><br>
                    <input type="submit" value="Se connecter">
                </form>
                
                <h3>S'inscrire :</h3>
                <form id="insciption" action="<?php inscription($pdo) ?>" method="post">
                    <label>Pseudo        : </label><input type="name" name="pseudo"/><br>
                    <label>Adresse email : </label><input type="email" name="Iemail"/><br>
                    <label>Mot de passe  : </label><input type="password" name="Ipwd"/><br>
                    <label>Confirmez mot de passe  : </label><input type="password" name="cpwd"/><br>
                    <input type="submit" value="S'inscrire">
                </form>
                
                
            </main>
        </center>
        
        <footer>
            
        </footer>
        <script type="text/javascript" src=""></script>
    </body>