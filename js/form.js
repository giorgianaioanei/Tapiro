function formLogin() {
  document.getElementById("aLogin").className = "active";
  document.getElementById("aSignup").className = "";
  document.getElementById("login").classList.remove("hide");
  document.getElementById("login").classList.add("show");
  document.getElementById("register").classList.remove("show");
  document.getElementById("register").classList.add("hide");
}
function formSignup() {
  document.getElementById("aSignup").className = "active";
  document.getElementById("aLogin").className = "";
  document.getElementById("register").classList.remove("hide");
  document.getElementById("register").classList.add("show");
  document.getElementById("login").classList.remove("show");
  document.getElementById("login").classList.add("hide");
}
function showPaswL() {
  if(document.getElementById("showPaswL").innerText == "Mostra"){
    document.getElementById("pasw").setAttribute("type", "text");
    document.getElementById("showPaswL").innerText = "Nascondi";
  }else{
    document.getElementById("pasw").setAttribute("type", "password");
    document.getElementById("showPaswL").innerText = "Mostra";
  }
}
function showPaswR() {
  if(document.getElementById("showPaswR").innerText == "Mostra"){
    document.getElementById("paswR").setAttribute("type", "text");
    document.getElementById("showPaswR").innerText = "Nascondi";
  }else{
    document.getElementById("paswR").setAttribute("type", "password");
    document.getElementById("showPaswR").innerText = "Mostra";
  }
}
function showConfR() {
  if(document.getElementById("showConfR").innerText == "Mostra"){
    document.getElementById("conf").setAttribute("type", "text");
    document.getElementById("showConfR").innerText = "Nascondi";
  }else{
    document.getElementById("conf").setAttribute("type", "password");
    document.getElementById("showConfR").innerText = "Mostra";
  }
}
let url = window.location.hash;
let lastPart = url.split('#')[1];
if(lastPart == "register") formSignup();
if(lastPart == "email") document.getElementById('popup').style.display = "block";

// Get the modal
var modal = document.getElementById('popup');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}