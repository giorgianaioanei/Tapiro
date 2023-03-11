function setCookie(cname, cvalue) {
  const d = new Date();
  d.setTime(d.getTime() + (60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

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
  window.location.href = "login.php";
}
function toSignup(){
  window.location.href = "signup.php";
}
if(getCookie("splash") == ""){
  gsap.to("#alien", {top: '35vh', duration: '0.5', ease: 'cubic-bezier(0.215,0.610,0.355,1)'});
  gsap.to("#alien", {delay: '1.5', top: '0vh', duration: '1', ease: 'cubic-bezier(0.215,0.610,0.355,1)', width: '180px'});
  gsap.to("#logo",  {opacity: '1', delay: '2.6', duration: '1', ease: 'cubic-bezier(0.215,0.610,0.355,1)'});
  gsap.to("#text",  {top: '50vh', delay: '3.6', duration: '0.7', ease: 'cubic-bezier(0.215,0.610,0.355,1)'});
  gsap.to("#footer",{opacity: '1', delay: '4', duration: '0'});
  setTimeout(setCookie("splash", true), 4000);
}