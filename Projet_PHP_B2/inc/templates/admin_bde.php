<body>
    <section class="site">
        <section class="section1">

            <div class="section1__topbar">
                <div id="click-profil">PROFIL</div>
                <div id="click-deco">DECONNEXION</div>
                <div class="burger" id="burger-icon">
                    <div></div>
                </div>
            </div>

            <div class="section1__title">
                <span>FORUM</span>
                <img src="./assets/IMG/Ynov.svg" alt="Ynov Sophia Campus">
                <div class="section1__regles">
                    <h2>GENERAL</h2>
                    <p>Plusieurs variations de Lorem Ipsum peuvent être trouvées ici ou là, mais la majeure partie
                        d'entre
                        elles a été altérée par l'addition d'humour ou de mots aléatoires qui ne ressemblent pas une
                        seconde
                        à du texte standard.
                    </p>
                </div>
            </div>

        </section>
        <section class="section2">
            <div class="section__block">
                <h2 class="titre">UTILISATEUR</h2>
                <div class="section2__container">
                        <?php foreach ($contacts as $contact): ?>
                        <div class="section2__utilisateur">
                            <div class="section2__utilisateur__img">
                                <img src="<?= $contact['photo_i'] ?>">
                            </div>
                            <div class="section2__utilisateur__nom">
                                <h4 <?php if ($contact['ban_i']): ?>
                                        style="color: red;"
                                    <?php endif; ?>>
                                    <?= $contact['nom_i'] ?>
                                </h4>
                            </div>
                            <div class="section2__utilisateur__mail">
                                <p<?php if ($contact['ban_i']): ?>
                                        style="color: red;"
                                    <?php endif; ?>>
                                    <?= $contact['mail_i'] ?>
                                </p>
                            </div>
                            <form method="POST">
                                <input type="hidden" name="idInscrit" value="<?= $contact['id_i'] ?>">
                                <div class="section2__utilisateur__cross">
                                    <button><img src="./assets/IMG/Vector.svg"></button>
                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </section>

        <section class="section4">
            <div class="section__block">
                <h2 class="titre">ARTICLE</h2>
                <div class="section4__container">

                <?php foreach ($articles as $article): ?>
                    <div class="section4__article">
                        <div class="section4__article__img">
                            <img src="<?= $article['image_a'] ?>">
                        </div>
                        <div class="section4__article__content">
                            <h4><?= $article['titre_a'] ?></h4>
                            <p><?= $article['contenu_a'] ?></p>
                            <br>
                            <span class="details-txt">
                                <span><?= $article['date_a'] ?></span>
                                <br>
                                <?php for ($i = 0; $i < count($contacts); $i++): ?>
                                    <?php if ($contacts[$i][0] === $article['user_a']): ?>
                                        <span><?= $contacts[$i][1] ?></span>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </span>
                            <br>
                            <button onclick="myFunction()">Details</button>
                        </div>
                        <form method="POST">
                            <input type="hidden" name="delete" value="<?= $article['id_a'] ?>">
                            <div class="section4__article__cross">
                                <button><img src="./assets/IMG/cross.svg"></button>
                            </div>
                        </form>
                        
                    <div class="section4__article__sumbit">
                        <form method="POST">
                            <div>
                                <textarea type="text" name="title" id="title" required placeholder="Ecrire le titre ici..."></textarea>
                                <br />
                                <textarea type="text" name="message" required placeholder="Ecrire le message ici..."></textarea>
                            </div>

                            <div>
                                <input type="file" id="file" name="file" accept="image/png, image/jpeg, image/svg">
                                <label for="file"><img src="./assets/IMG/add.svg" alt="add_file"></label>
                            </div>

                            <div>
                                <input type="submit" name="edit" value="" id="edit">
                                <label for="edit"><img src="./assets/IMG/submit.svg" alt="edit__tchat"></label>
                            </div>

                        </form>
                    </div>

                    </div>
                <?php endforeach; ?>

                    <div class="section4__article__sumbit">
                        <form method="POST" class="section4__article__form">
                            <div class="section4__article__sumbit__content">
                                <textarea class="section4__article__sumbit__content__title" type="text" name="title" id="title" required placeholder="Ecrire le titre ici..."></textarea>
                                <br />
                                <textarea class="section4__article__sumbit__content__message" type="text" name="message" required placeholder="Ecrire le message ici..."></textarea>
                            </div>

                            <div class="section4__article__sumbit__img__add">
                                <input type="file" id="file" name="file" accept="image/png, image/jpeg, image/svg">
                                <label for="file"><img src="./assets/IMG/add.svg" alt="add_file"></label>
                            </div>

                            <div class="section4__article__sumbit__img__send">
                                <input type="submit" name="send" value="" id="send">
                                <label for="send"><img src="./assets/IMG/submit.svg" alt="send__tchat"></label>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </section>

        <section class="section5">
            <div class="section__block">
                <h2 class="titre">FORUM</h2>
                <div class="section5__container">
                    <?php foreach ($forum as $article): ?>
                        <div class="section5__forum">
                            <div class="section5__forum__user">
                                <div class="section5__forum__user__img">
                                    <img src="./assets/IMG/M.png">
                                </div>
                                <div class="section5__forum__user__nom">
                                    <h4>Andreas Castello</h4>
                                </div>
                                <div class="section5__forum__user__role">
                                    <button class="active">B1</button>
                                </div>
                                <div class="section5__forum__user__mail">
                                    <p>andreas.castello06@gmail.com</p>
                                </div>
                            </div>

                            <div class="section5__forum__title">
                                <h4>Paris Gallery</h4>
                            </div>
                            <div class="section5__forum__date">
                                <h4><?= $article['date_f'] ?></h4>
                            </div>
                            <div class="section5__forum__heure">
                                <p><?= $article['heure_f'] ?></p>
                            </div>
                            <div class="section5__forum__content">
                                <p><?= $article['contenu_f'] ?></p>
                            </div>
                            <div class="section5__forum__img">
                                <img src="<?= $article['image_f'] ?>">
                            </div>
                            <form method="POST">
                                <input type="hidden" name="supp" value="<?= $article['id_f'] ?>">
                                <div class="section5__forum__cross">
                                    <button><img src="./assets/IMG/cross2.svg"></button>
                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        