function validateForm() {

  let res   = document.getElementById('resP');
  let passw = document.forms["resetForm"]["pass"].value;
  let confi = document.forms["resetForm"]["confirm"].value;
  let filter;

  const validStr = (str) => str ? true : false
  passw = passw.trim();
  confi = confi.trim();

  /*+++ Verifica campi vuoti, nulli o indefiniti +++*/
  if (!validStr(passw) || passw.length<1 ||
      !validStr(confi) || confi.length<1) {
    res.setAttribute("class", "erro");
    res.innerText = "Password non valideJ!";
    setTimeout(function(){ document.getElementById('resP').removeAttribute("class") }, 5000);
    return false;
  }
  /*+++++++++++++++++++++++++++++++++++++++++++++++*/

  /*+++++++++++ VERIFICA Password ++++++++++++++++++++*/
  if (passw != confi) {
    res.setAttribute("class", "erro");
    res.innerText = "Password non ugualiJ!";
    setTimeout(function(){ document.getElementById('resP').removeAttribute("class") }, 5000);
    return false;
  }
  /*+++++++++++++++++++++++++++++++++++++++++++++++*/

  return true;
}