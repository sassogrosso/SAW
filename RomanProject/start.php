
<?php
$filename="test.txt";
//isset() serve per vedere se una variebile è stata impostata o meno
if (isset($_POST['Email']) && isset($_POST['password'])) {
    //$_POST  viene utilizzata per raccogliere i dati del form dopo aver inviato un modulo HTML con method="post"
    $email = $_POST['Email'];
    $password = $_POST['password'];

    if (file_exists($filename)) {
        $fileContents = file_get_contents($filename);
        $credentials = $email . " " . $password;

        if (strpos($fileContents, $credentials) !== false) {
            header("Location: no.php"); 
            exit();
        }
    }

    $test = fopen($filename, 'a');

    if ($test) {
        $data = "$nome $email $password\n";
        fwrite($test, $data);
        fclose($test);
        header("Location: yes.php");
        exit();
    }
}
?>


<html><body >
    <h1>Benvenuto alla parte di registrazione al sito Roman Project</h1>
   <?php echo '<link href="style.css" rel="stylesheet" type="text/css" />'; ?> 
    <?php $link="ripristino.php" ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
        <legend>Credenziali da inserire</legend>
        <img src="https://th.bing.com/th/id/OIP.6y4WhsVR_igwqOnBOy-DJQHaK4?pid=ImgDet&rs=1" alt="">
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
            <p>Hai dimenticato la password? <a href="<?php echo $link; ?>">Clicca per maggiori informazioni</a>.</p>
            </div>
        </fieldset>
        <button type="submit" class="registerbtn">SUBMIT</button>
    </form>
</body>
</html>
