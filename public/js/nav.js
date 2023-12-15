var scrollpos = window.scrollY;
var header = document.getElementById("header");
var toToggle = document.querySelectorAll(".toggleColour");
var logo = document.getElementById("logo");

document.addEventListener("scroll", function () {

    scrollpos = window.scrollY;

    if (scrollpos > 10) {
        header.classList.add("gradient");

        for (var i = 0; i < toToggle.length; i++) {
            toToggle[i].classList.add("text-white");
            toToggle[i].classList.remove("text-sky-600");
        }
        header.classList.add("shadow");
    } else {
        header.classList.remove("gradient");

        for (var i = 0; i < toToggle.length; i++) {
            toToggle[i].classList.add("text-sky-600");
            toToggle[i].classList.remove("text-white");
        }

        header.classList.remove("shadow");
    }
});

var navMenuDiv = document.getElementById("nav-content");
var navMenu = document.getElementById("nav-toggle");

document.onclick = check;
function check(e) {
    var target = (e && e.target) || (event && event.srcElement);

    if (!checkParent(target, navMenuDiv)) {
                    
        if (checkParent(target, navMenu)) {
                        
            if (navMenuDiv.classList.contains("hidden")) {
                navMenuDiv.classList.remove("hidden");
            } else {
                navMenuDiv.classList.add("hidden");
            }
        } else {
                        
            navMenuDiv.classList.add("hidden");
        }
    }
}

function checkParent(t, elm) {
    while (t.parentNode) {
        if (t == elm) {
            return true;
        }
        t = t.parentNode;
    }
    return false;
}

document.addEventListener("DOMContentLoaded", function () {

    var logoImg = document.getElementById("logoImg");


    window.addEventListener("scroll", function () {

      var scrollPosition = window.scrollY;

      if (scrollPosition > 0) {
       
        logoImg.src = "/img/logo-white.png";
      } else {

        logoImg.src = "/img/logo.png";
      }
    });
  });
