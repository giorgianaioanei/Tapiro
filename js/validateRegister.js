function validateForm() {

  let res   = document.getElementById('res');
  let nome  = document.forms["signupForm"]["firstname"].value;
  let cogno = document.forms["signupForm"]["lastname"].value;
  let email = document.forms["signupForm"]["email"].value;
  let passw = document.forms["signupForm"]["pass"].value;
  let confi = document.forms["signupForm"]["confirm"].value;
  let filter;

  const validStr = (str) => str ? true : false
  nome  = nome.trim();
  cogno = cogno.trim();
  email = email.trim();
  passw = passw.trim();
  confi = confi.trim();

  /*+++ Verifica campi vuoti, nulli o indefiniti +++*/
  if (!validStr(nome)  || nome.length<1  ||
      !validStr(cogno) || cogno.length<1 ||
      !validStr(email) || email.length<1 ||
      !validStr(passw) || passw.length<1 ||
      !validStr(confi) || confi.length<1) {
    res.setAttribute("class", "erro");
    res.innerText = "Campi registrazione errati!";
    document.forms["signupForm"].reset();
    setTimeout(function(){ document.getElementById('res').removeAttribute("class") }, 5000);
    return false;
  }
  /*+++++++++++++++++++++++++++++++++++++++++++++++*/

  /*+++++++++++ VERIFICA Password ++++++++++++++++++++*/
  if (passw != confi) {
    res.setAttribute("class", "erro");
    res.innerText = "Password non uguali!";
    setTimeout(function(){ document.getElementById('res').removeAttribute("class") }, 5000);
    return false;
  }
  /*+++++++++++++++++++++++++++++++++++++++++++++++*/

  /*+++++++++ VERIFICA Nome&Cognome +++++++++++++++*/
  filter = /([a-zA-Z\à\è\ì\ò\ù\À\È\Ì\Ò\Ù\á\é\í\ó\ú\ý\Á\É\Í\Ó\Ú\Ý\â\ê\î\ô\û\Â\Ê\Î\Ô\Û\ã\ñ\õ\Ã\Ñ\Õ\ä\ë\ï\ö\ü\ÿ\Ä\Ë\Ï\Ö\Ü\Ÿ\ç\Ç\ß\Ø\ø\Å\å\Æ\æ\œ\'])+$/;
  if (!filter.test(nome) || !filter.test(cogno)) {
    res.setAttribute("class", "erro");
    res.innerText = "Nome/Cognome non validi!";
    setTimeout(function(){ document.getElementById('res').removeAttribute("class") }, 5000);
    return false;
  }
  /*+++++++++++++++++++++++++++++++++++++++++++++++*/

  /*+++++++++++ VERIFICA EMAIL ++++++++++++++++++++*/
  filter = /^(\s)*([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+(\s)*$/;
  if (!filter.test(email)) {
    res.setAttribute("class", "erro");
    res.innerText = "Email non valida!";
    setTimeout(function(){ document.getElementById('res').removeAttribute("class") }, 5000);
    return false;
  }
  /*+++++++++++++++++++++++++++++++++++++++++++++++*/

  return true;
}