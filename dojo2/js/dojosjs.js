//exercice 1

document.querySelector("main > section > aside > div").onmouseenter = function () 
{     this.style.borderRadius  = "0%"; }; 

document.querySelector("main > section > aside > div").onmouseleave = function()
{     this.style.borderRadius = "50%"; };

//exercice 2

let images= document.querySelectorAll("main section section article div")
let fleche = document.querySelectorAll("main section section article header")
fleche[0].addEventListener("click", () => {
    if (images[0].style.visibility  === "hidden") {
        images[0].style.visibility = "visible";
        images[0].style.height = "auto";
      } else {
        images[0].style.visibility  = "hidden";
        images[0].style.height = "0px";
      }
    }
  )

fleche[1].addEventListener("click", () => {
    if (images[1].style.visibility  === "hidden") {
        images[1].style.visibility = "visible";
        images[1].style.height = "auto";
      } else {
        images[1].style.visibility  = "hidden";
        images[1].style.height = "0px";
      }
    }
  )

  fleche[2].addEventListener("click", () => {
    if (images[2].style.visibility  === "hidden") {
        images[2].style.visibility = "visible";
        images[2].style.height = "auto";
      } else {
        images[2].style.visibility  = "hidden";
        images[2].style.height = "0px";
      }
    }
  )

  



//exercice 3

let menu;

