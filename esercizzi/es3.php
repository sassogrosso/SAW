<html>
<link rel="stylesheet" href="CSS/main.css" type="text/css">
<body >
    <h1>Benvenuto alla parte di registrazione al sito Roman Project</h1>"
    <form action="es2.php" method="post">
        <fieldset>
            <legend>Credenziali da inserire</legend>
        <label for="Nome">Nome</label><br >
        <input type="text" placeholder="enter name" id="Nome" name="Nome"><br >
        <label for="Cognome">Cognome</label><br >
        <input type="text" placeholder="enter surname" id="Cognome" name="Cognome"><br>
        <label for="email">Email</label><br >
        <input type="email" placeholder="enter mail" id="email" name="Email"><br>
        <label for="password">password</label><br >
        <input type="password" placeholder="enter password" id="password" maxlength="8" minlength="6" name="password"><br>
        <label for="rp_password">password</label><br >
        <input type="password" placeholder="repeat password" id="rp_password" maxlength="8" minlength="6" name="Password"><br>
        <div>
            <p>Hai dimenticato la password? <a href="ripristina.html">Clicca resettarla</a>.</p>
            </div>
        </fieldset>
    <button  type="submit" class="registerbtn">SUBMIT</button>
<?php
    if (isset($_POST['password']) and isset($_POST['Email'])) {
    $date=date('H:i');
    $email=$_POST['Email'];
    $password = $_POST['password'];
    $fp = fopen('data.txt', 'w');
    fwrite($fp,$date." ".$email." ".$password."n");
    fclose($fp);
} else {
    echo "La chiave 'password' non è stata inviata tramite il modulo.";
}
?>
    </form>
</body>
</html>

