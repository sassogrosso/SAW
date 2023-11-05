<?php
$user = "user.txt";
session_start();
if (isset($_POST["submit"])) {
    $_SESSION["email"]= $_POST["Email"];
    $_SESSION["password"]= $_POST["password"];
    $nome = htmlspecialchars($_POST['Nome']);
    $cognome = htmlspecialchars($_POST['Cognome']);
    $cod_fisc = $_POST['Codice_Fiscale'];
    $uni = $_POST['Unige_ID'];
    $email = $_POST['Email'];
    $password = $_POST['password'];
    $rp_password = $_POST['rp_password'];
    $cod_fisc_pattern = "/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i";
    $uni_pattern = "/^\d{7}$/i";

    if (empty($nome) || empty($cognome) || empty($email) || empty($password) || empty($rp_password) || empty($uni) || empty($cod_fisc)) {
        echo "Alcuni campi sono vuoti \n";
        return;
    }

    if (!(preg_match($cod_fisc_pattern, $cod_fisc) && preg_match($uni_pattern, $uni))) {
        echo '<script language="javascript">';
        echo 'if (confirm("ID Unige o codice fiscale non valido. Vuoi tornare indietro?")) {';
        echo 'window.history.back();';
        echo '}';
        echo '</script>';
        return;
    }

    if ($password != $rp_password) {
        echo '<script language="javascript">';
        echo 'if (confirm("Le password non coincidono. Vuoi tornare indietro?")) {';
        echo 'window.history.back();';
        echo '}';
        echo '</script>';
        return;
    }

    if (file_exists($user)) {
        $fileContents = file_get_contents($user);
        $lines = explode("\n", $fileContents);
        foreach ($lines as $line) {
            $parts = explode(" ", $line);
            $storedEmail = $parts[0];

            if ($email == $storedEmail) {
                echo "Email già registrata, eseguire il login o ricompiere la registrazione.";
                echo "<a href='login.html'>Login</a>";
                return;
            }
        }
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $test = fopen($user, 'a');
    if ($test) {
        $data = "$email $password $hash\n";
        fwrite($test, $data);
        fclose($test);
        echo "Registrazione completata, eseguire il <a href='login.html'>Login</a>";
        return;
    }
} else {
    echo "Dati non validi";
}

?>