<body>
    <?php
        require_once("./../inc/utilisateur/connexion_utilisateur.php");
        require_once('./../inc/utilisateur/photo_de_profil.php');
        require_once('./../inc/utilisateur/user.php');
    ?>
    
    <section class="site">
        <section class="section1">

            <div class="section1__topbar">
                <div id="click-retour">RETOUR</div>
                <div id="click-deco">DECONNEXION</div>
                <div class="burger" id="burger-icon">
                    <div></div>
                </div>
            </div>

            <center>
                <div class="section1__title" id="info-principal">
                    <form class="image-upload" action="<?php upload($pdo); ?>" method="post" enctype="multipart/form-data">
                        <label for="file-input">
                            <img id="pp" src="<?php echo chargement_pp ($pdo, $_COOKIE['id']); ?>" width="100px" height="100px">
                        </label>
                        <input id="file-input" type="file" name="file-input"/><br>
                        <input type="submit" value="Modifier">
                    </form>

                    <div class="user">
                        <h2><?php echo trouver_pseudo ($pdo, $_COOKIE['id']); ?></h2>
                        <h3><?php echo trouver_email  ($pdo, $_COOKIE['id']); ?></h3>
                    </div>

                    <h3>Modifier pseudo :</h3>
                    <form id="modifier_mdp" action="<?php if (isset($_POST["ppwd"]) || isset($_POST["npsd"])) modifier_pseudo ($pdo, $_COOKIE['id'], $_POST["ppwd"], $_POST["npsd"]); ?>" method="post">
                        <label>Mot de passe  : </label><input type="password" name="ppwd"/><br>
                        <label>Nouveau pseudo  : </label><input type="name" name="npsd"/><br>
                        <input type="submit" value="Modifier">
                    </form>
                    
                    <h3>Modifier mot de passe :</h3>
                    <form id="modifier_mdp" action="<?php if (isset($_POST["pwd"])) modifier_mdp ($pdo, $_COOKIE['cookie_email'], $_POST["pwd"]); ?>" method="post">
                        <label>Mot de passe  : </label><input type="password" name="pwd"/><br>
                        <label>Nouveau mot de passe  : </label><input type="password" name="npwd"/><br>
                        <input type="submit" value="Modifier">
                    </form>
                </div>
                
                
            </center>
        </section>

        
    </section>
    
    <script src="./assets/JS/__button.js"></script>

</body>