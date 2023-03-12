/* Function for set a coockie with Javascript */
function setCookie(cname, cvalue) {
  const d = new Date();
  d.setTime(d.getTime() + (60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

/* Function for get a coockie with Javascript */
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function toLogin(){
  window.location.href = "form.php#login";
}
function toSignup(){
  window.location.href = "form.php#register";
}
/* Start of splash screen with library GSAP for the animation */
if(getCookie("splash") == ""){  // Verification if splash's cookie isset
  let heightSplash = (screen.height-600); // calc for height of alien apparition 
  gsap.to("#alien", {display: 'block', top: ''+heightSplash, duration: '0.5', ease: 'cubic-bezier(0.215,0.610,0.355,1)'});
  if(screen.width <= 425){ // if screen is a phone
    gsap.to("#alien", {delay: '1.5', top: '0vh', duration: '1', ease: 'cubic-bezier(0.215,0.610,0.355,1)', width: '150px'});
    gsap.to("#logo",  {opacity: '1', delay: '2.6', duration: '1', ease: 'cubic-bezier(0.215,0.610,0.355,1)'});
    gsap.to("#text",  {display: 'block', top: '370px', delay: '3.6', duration: '0.7', ease: 'cubic-bezier(0.215,0.610,0.355,1)'});
  }else if(screen.width > 425 && screen.width <= 768){ // if screen is a tablet
    gsap.to("#alien", {delay: '1.5', top: '0vh', duration: '1', ease: 'cubic-bezier(0.215,0.610,0.355,1)', width: '170px'});
    gsap.to("#logo",  {opacity: '1', delay: '2.6', duration: '1', ease: 'cubic-bezier(0.215,0.610,0.355,1)'});
    gsap.to("#text",  {display: 'block', top: '370px', delay: '3.6', duration: '0.7', ease: 'cubic-bezier(0.215,0.610,0.355,1)'});
  }else{ // if a screen is a 
    gsap.to("#alien", {delay: '1.5', top: '0vh', duration: '1', ease: 'cubic-bezier(0.215,0.610,0.355,1)', width: '180px'});
    gsap.to("#logo",  {opacity: '1', delay: '2.6', duration: '1', ease: 'cubic-bezier(0.215,0.610,0.355,1)'});
    gsap.to("#text",  {display: 'block', top: '370px', delay: '3.6', duration: '0.7', ease: 'cubic-bezier(0.215,0.610,0.355,1)'});
  }
  gsap.to("#footer", {opacity: '1', delay: '4'});
  setTimeout(function(){ document.getElementById("alien").classList.add("Salien") }, 4000); // for the correct responsive of the images
  gsap.to(".splash", {overflow: 'auto', delay: '4'});
  setTimeout(setCookie("splash", true), 4000); // set the cookie for evitation the loop of splash screen
}