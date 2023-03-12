function validateEmail() {
  let res   = document.getElementById('resE');
  let email = document.forms["richiestaEmail"]["email"].value;

  const validStr = (str) => str ? true : false
  email = email.trim();

  /*Verifica email vuota, nulla o indefinita*/
  if (!validStr(email) || email.length<1) {
    res.setAttribute("class", "erro");
    res.innerText = "Email non valida!";
    document.forms["richiestaEmail"].reset();
    setTimeout(function(){ document.getElementById('resE').removeAttribute("class") }, 5000);
    return false;
  }

  /*+++++++++++ VERIFICA EMAIL ++++++++++++++++++++*/
  let filter = /^(\s)*([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+(\s)*$/;
  if (!filter.test(email)) {
    res.setAttribute("class", "erro");
    res.innerText = "Email non valida!";
    document.forms["richiestaEmail"].reset();
    setTimeout(function(){ document.getElementById('resE').removeAttribute("class") }, 5000);
    return false;
  }
  /*+++++++++++++++++++++++++++++++++++++++++++++++*/

  return true;
}