//exercice 1

document.querySelector("main > section > aside > div").onmouseenter = function () 
{     this.style.borderRadius  = "0%"; }; 

document.querySelector("main > section > aside > div").onmouseleave = function()
{     this.style.borderRadius = "50%"; };

//exercice 2
let d1= document.querySelector("main section section article div");
let tet = document.querySelector("main section section article header").addEventListener("click", () => {
    if (d1.style.visibility  === "hidden") {
        d1.style.visibility = "visible";
        d1.style.height = "auto";
      } else {
        d1.style.visibility  = "hidden";
        d1.style.height = "0px";
      }
    }
  );

//exercice 3
