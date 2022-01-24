<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/../inc/function_user.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../inc/function_user_ban.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/../inc/function_article.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../inc/function_article_send.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../inc/function_article_supp.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/../inc/function_forum.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../inc/function_forum_supp.php');

function verification ($pdo): int
{
    if (isset($_COOKIE['id']))
        if (select_email($pdo, $_COOKIE['id']) == $_COOKIE['cookie_email'])
            return 1;
    return 0;
}

function select_email ($pdo, string $id): string
{
    $SLCTstatement = $pdo->prepare("SELECT mail_i FROM inscrit WHERE id_i = :id_i");
    $SLCTstatement->bindValue(':id_i', $id);
    $SLCTstatement->execute();
    $result = $SLCTstatement->fetch();
    return $result[0];
}

if (isset($_COOKIE['profile_viewer_uid']))
{
    if ($_COOKIE['profile_viewer_uid'] == 1)
    {
        $domain = ($_SERVER['HTTP_HOST'] != 'projetphpb2') ? $_SERVER['HTTP_HOST'] : false;
        setcookie('profile_viewer_uid', "", time()-3600, '/', $domain);

        require_once($_SERVER['DOCUMENT_ROOT'] . '/../inc/utilisateur/profil.php');
    }
}
else
{
    if (verification($pdo) == 1)
        require_once($_SERVER['DOCUMENT_ROOT'] . '/../inc/templates/admin_bde.php');
    else
        require_once ($_SERVER['DOCUMENT_ROOT'] . '/../inc/utilisateur/page_connexion.php');
}
