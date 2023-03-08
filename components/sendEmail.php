<?php
// definisco mittente e destinatario della mail
$nome_mittente = "Tapiro";
$mail_mittente = "no-reply@tapiro.it";
$mail_destinatario = $_SESSION["Email"];

// definisco il subject
$mail_oggetto = "Reset Password!";

// definisco il messaggio formattato in HTML
$idCode = $_SESSION["ID"];
$mail_corpo = <<<HTML
<html>
<head>
  <title>Reset Password</title>
</head>
<body>

    <center>
        <h1>Reset Password</h1>
        <h5>
            É stato richiesto un cambio password per questa email, se non sei stato a richiederlo ignora l'email<br>
            Altrimenti clicca sul link:
        </h5>
        <a href="https://alealila.altervista.org/changePasw.php?email=$email&id=$idCode">RESET PASSWORD</a>
        <br><br><br><br><br><br>
    </center>  

</body>
</html>
HTML;

// aggiusto un po' le intestazioni della mail
// E' in questa sezione che deve essere definito il mittente (From)
// ed altri eventuali valori come Cc, Bcc e X-Mailer
$mail_headers = "From: " .  $nome_mittente . " <" .  $mail_mittente . ">\r\n";
$mail_headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

// Aggiungo alle intestazioni della mail la definizione di MIME-Version,
// Content-type e charset (necessarie per i contenuti in HTML)
$mail_headers .= "MIME-Version: 1.0\r\n";
$mail_headers .= "Content-type: text/html; charset=iso-8859-1";

if(mail($mail_destinatario, $mail_oggetto, $mail_corpo, $mail_headers)){
    session_start();
    $_SESSION = array();
    session_destroy();
    session_start();
    $_SESSION['erro'] = "Email inviata!";
    header("Location: login.php");
}else{
    $_SESSION['erro'] = "Errore nell'invio dell'Email!";
    header("Location: richiestaPasw.php");
}