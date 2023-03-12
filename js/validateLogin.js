function validateLogin() {
  let res   = document.getElementById('res');
  let email = document.forms["loginForm"]["email"].value;
  let passw = document.forms["loginForm"]["pass"].value;

  const validStr = (str) => str ? true : false
  email = email.trim();
  passw = passw.trim();

  /*Verifica campi vuoti, nulli o indefiniti*/
  if (!validStr(email) || email.length<1 || !validStr(passw) || passw.length<1) {
    res.setAttribute("class", "erro");
    res.innerText = "Attenzione! Inserire i dati richiesti.";
    document.forms["loginForm"].reset();
    setTimeout(function(){ document.getElementById('res').removeAttribute("class") }, 5000);
    return false;
  }

  /*+++++++++++ VERIFICA EMAIL ++++++++++++++++++++*/
  let filter = /^(\s)*([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+(\s)*$/;
  if (!filter.test(email)) {
    res.setAttribute("class", "erro");
    res.innerText = "Email non valida!";
    setTimeout(function(){ document.getElementById('res').removeAttribute("class") }, 5000);
    return false;
  }
  /*+++++++++++++++++++++++++++++++++++++++++++++++*/

  return true;
}