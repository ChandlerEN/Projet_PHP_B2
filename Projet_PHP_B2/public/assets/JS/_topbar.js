window.addEventListener('scroll', () => { 
    const scrollable = window.scrollY;
    var element = document.getElementById("folow");
     if (scrollable > 100) {
         element.classList.add("topbar--active");
      }
      else {
       element.classList.remove("topbar--active");
      }
    });