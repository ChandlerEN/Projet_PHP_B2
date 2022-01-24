document.getElementById("burger-icon").addEventListener("click", function() {
  
    var element = document.getElementById("sidebar-id");
    element.classList.toggle("sidebar--active");

});

document.getElementById("burger-icon").addEventListener("click", function() {
    var element = document.getElementById("burger-icon");
    element.classList.toggle("burger__icon--active");
  
});

document.getElementById("click-deco").addEventListener("click", function(){
    document.cookie = "id = ''; expires=Thu, 01 Jan 1970 00:00:01 GMT";
    document.cookie = "cookie_email = ''; expires=Thu, 01 Jan 1970 00:00:01 GMT";
    document.location.href="/";

    /* En php :
    if (isset($_COOKIE['id']))
    {
        $domain = ($_SERVER['HTTP_HOST'] != 'projetphpb2') ? $_SERVER['HTTP_HOST'] : false;
        setcookie('id', "", time()-3600, '/', $domain);
        setcookie('cookie_email', "", time()-3600, '/', $domain);
    }
    */
});

document.getElementById("click-profil").addEventListener("click", function(){
    var expiration = new Date();
    var time = expiration.getTime() + 3600000;
    expiration.setTime(time);
    document.cookie="profile_viewer_uid=1; expires=" + expiration.toUTCString() + "path='/'";
    document.location.href="/";
});

document.getElementById("sidebar__a").addEventListener("click", function() {
    var element = document.getElementById("sidebar-id");
    var element2 = document.getElementById("burger-icon");
    element.classList.remove("sidebar--active");
    element2.classList.remove("burger__icon--active");
  
});



