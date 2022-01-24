<?php

if (isset($_COOKIE['id']))
{
    $domain = ($_SERVER['HTTP_HOST'] != 'projetphpb2') ? $_SERVER['HTTP_HOST'] : false;
    setcookie('id', "", time()-3600, '/', $domain);
    setcookie('cookie_email', "", time()-3600, '/', $domain);
}


?>