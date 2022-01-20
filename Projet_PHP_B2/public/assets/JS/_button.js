document.getElementById("burger-icon").addEventListener("click", function() {
  
    var element = document.getElementById("sidebar-id");
    element.classList.toggle("sidebar--active");

});

document.getElementById("burger-icon").addEventListener("click", function() {
    var element = document.getElementById("burger-icon");
    element.classList.toggle("burger__icon--active");
  
});

document.getElementById("sidebar__a").addEventListener("click", function() {
    var element = document.getElementById("sidebar-id");
    var element2 = document.getElementById("burger-icon");
    element.classList.remove("sidebar--active");
    element2.classList.remove("burger__icon--active");
  
});





