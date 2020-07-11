//dark mode

let body = document.body;
let navcolor = document.getElementById("nav");
let navcolor2 = document.getElementById("nav2");

let navlinlink = document.querySelectorAll(".nav-link");
let darkmodebtn = document.getElementById("moon");
let sunnymodebtn = document.getElementById("sunny");
let drop = document.querySelector(" .dropdown-content");
sunnymodebtn.style.display = "none";

darkmodebtn.addEventListener("click",()=>{
    console.log("page in dark mode");
    body.style.backgroundColor = "rgb(22, 22, 22)";
    body.style.color = "rgb(192, 192, 192)";
    navcolor.style.background = "rgb(22, 22, 22)";
    navcolor2.style.background = "rgb(22, 22, 22)";
    navlinlink.forEach(cur =>{
      cur.style.color = "rgb(192, 192, 192)";
    })


  drop.style.backgroundColor = "rgb(22, 22, 22)";
  
  darkmodebtn.style.backgroundColor = "#e26015";
    darkmodebtn.style.display = "none";
    sunnymodebtn.style.display = "";
});
sunnymodebtn.addEventListener("click",()=>{
  console.log("page in sunny mode");
  body.style.backgroundColor = "";
  body.style.color = "";
  navcolor.style.background = "";
  navcolor2.style.background = "";
  navlinlink.forEach(cur =>{
    cur.style.color = "";
  });


drop.style.backgroundColor = "";
// darkmodebtn.className = "icon ion-ios-moon";
darkmodebtn.style.backgroundColor = "black";
  sunnymodebtn.style.display = "none";
  darkmodebtn.style.display = "";

});

